<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    




    public function add_to_favourites(Request $request): int
    {
        $id = $request->input('id');

        $favourites_count = 0;
        $favourites = [];
        
        if ($request->hasCookie('favourites')) { // Если есть в куки favourites, то добавляю в конец массива

            // Получение куки через фасад Cookie метод get
            $favourites = json_decode(\Illuminate\Support\Facades\Cookie::get('favourites'), true);

            // Если в массиве есть ключ с таким id, то прибавляю количество на 1
            if (array_key_exists($id, $favourites)) {
                $favourites[$id] = $favourites[$id] + 1;
            } else {
                $favourites[$id] = 1;
            }
            $favourites_count = count($favourites);

        } else {
            $favourites_count = 1;
            $favourites[$id] = 1;
        }

        $favourites_count = $favourites_count > 9 ? 9 : $favourites_count;

        $favourites_json = json_encode($favourites);

        // Установка куки через фасад Cookie метод queue
        \Illuminate\Support\Facades\Cookie::queue('favourites', $favourites_json, 525600);
        
        return $favourites_count;
    }

    public function we_use_cookie(): void
    {
        // Записываю в куки через фасад Cookie метод queue
        \Illuminate\Support\Facades\Cookie::queue('we-use-cookie', 'yes', 525600);
    }
}
