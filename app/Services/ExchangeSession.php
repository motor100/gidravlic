<?php

namespace App\Services;

class ExchangeSession
{
    protected $request;

    /**
     * @param Illuminate\Http\Request
     */
    public function __construct($request)
    {
        $this->request = $request;
    }
    
    /**
     * Проверка запроса на наличие header('cookie') и сравнение с App\Models\ExchangeSession
     * @param
     * @return bool
     */
    public function check(): bool
    {
        if ($this->request->headers->has('cookie')) {

            // Получаю header('cookie')
            // Строка вида 'gidravliccom_session=IyUmT1S6odcjgosz0HbtMgBI2LGASyAYF0bCdLbu'
            $cookie = $this->request->header('cookie');
            
            // Получаю модель App\Models\ExchangeSession
            $exchange_session = \App\Models\ExchangeSession::find(1);

            // Формирую строку
            $session = $exchange_session->cookie_name . '=' . $exchange_session->session_id;

            if ($cookie == $session) {
                return true;
            }

            return false;
        }

        return false;
    }
}