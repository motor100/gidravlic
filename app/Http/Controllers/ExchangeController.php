<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Facades\Auth;

class ExchangeController extends Controller
{
    /**
     * Parse XML to database
     * @param
     * @return bool
     */
    public function parse_xml_db()
    {
        return (new \App\Services\ParseXml())->parse();
    }

    /**
     * 1C_exchange
     * Документация https://its.1c.ru/db/metod8dev/content/3314/hdoc
     * Только загрузка товаров и предложений из 1С на сайт
     * Выгрузка заказов из сайта в 1С в файле app\http\controllers\ExchangeController_with_salemode.php
     * @param Illuminate\Http\Request
     * @return mixed
     */
    public function exchange(Request $request): mixed
    {
        return (new \App\Services\Exchange($request))->exchange_1c();
    }
}
