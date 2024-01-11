<?php

namespace App\Services;

// use Illuminate\Http\Request;

class Order
{
    protected $request;
    protected $validated;

    public function __construct($request, $validated)
    {
        $this->request = $request;
        $this->validated = $validated;
    }

    /**
     * Создание заказа
     */
    public function create(): int
    {
        // Получаю аутентифицированного пользователя
        $user = $this->request->user();

        // Расчет суммы всех товаров
        $summ = (new \App\Services\Cart())->total_summ();

        // Транспортная компания
        $delivery_company = array_key_exists('delivery_company', $this->validated) ? $this->validated['delivery_company'] : 'Самовывоз';

        // Создаю новую модель Order и получаю id новой записи
        $order_id = \App\Models\Order::insertGetId([
            'user_id' => $user ? $user->id : NULL,
            'status' => 'В обработке',
            'comment' => NULL,
            'delivery_method' => $this->validated['delivery_method'],
            'payment_method' => $this->validated['payment_method'],
            'delivery_company' => $delivery_company,
            'payment_status' => 0,
            'summ' => $summ,
            'message' => $this->validated['message'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // Телефон из строки в цисло
        $phone = (new \App\Services\Phone())->phone_to_int($this->validated['phone']);

        // ИНН юридического лица
        $inn = array_key_exists('inn', $this->validated) ? $this->validated['inn'] : NULL;

        // Контактное лицо (менеджер)
        $manager = array_key_exists('manager', $this->validated) ? $this->validated['manager'] : NULL;

        // Создаю новую модель OrderCustomer
        \App\Models\OrderCustomer::create([
            'order_id' => $order_id,
            'customer_type' => $this->validated['customer_type'],
            'name' => $this->validated['name'],
            'email' => $this->validated['email'],
            'phone' => $phone,
            'inn' => $inn,
            'manager' => $manager,
        ]);

        /*
        * Идентификация товаров по полю id (primary key) в таблице products
        * Вариант если в таблице orders_products поле product_id это поле id в таблице products
        *
        * Если в 1С порядок товаров изменится, то в заказе будут другие товары
        * 
        * Поле product_id в таблице orders_products тип данных unsigned big integer
        * В модели App\Models\Order в методе products (отношение многие ко многим) убрать параметр product_id
        */
        /*
        // Получение куки через фасад Cookie метод get
        $cart = json_decode(\Illuminate\Support\Facades\Cookie::get('cart'), true);
        
        $insert_array = [];

        foreach($cart as $key => $value) {
            $row['order_id'] = $order_id;
            $row['product_id'] = $key;
            $row['quantity'] = $value;
            $row['created_at'] = now();
            $row['updated_at'] = now();
            $insert_array[] = $row;
        }
        */

        /*
        * Идентификация товаров по полю product_id в таблице products
        * Вариант если в таблице orders_products поле product_id это поле product_id в таблице products
        *
        * В 1С product_id уникальный и всегда соответствует одному товару
        * Пример 5e928f14-3064-11ee-9312-d8bbc193bc1b
        *
        * Поле product_id в таблице orders_products тип данных string
        * В модели App\Models\Order в методе products (отношение многие ко многим) добавить параметр product_id
        */

        $products = (new \App\Services\Cart())->get();

        $insert_array = [];

        foreach($products as $value) {
            $row['order_id'] = $order_id;
            $row['product_id'] = $value->product_id;
            $row['quantity'] = $value->quantity;
            $row['created_at'] = now();
            $row['updated_at'] = now();
            $insert_array[] = $row;
        }

        // Создание моделей OrderProduct
        \App\Models\OrderProduct::insert($insert_array);

        return $order_id;
    }
}