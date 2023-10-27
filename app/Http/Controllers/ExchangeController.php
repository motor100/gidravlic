<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    /**
     * Parse XML to database
     * @param
     * @return bool
     */
    public function parse_xml_db(): bool
    {
        return (new \App\Services\ParseXml())->parse();
    }

    /**
     * 1C_exchange
     * @param Illuminate\Http\Request
     * @return mixed
     */
    public function exchange(Request $request): mixed
    {
        return (new \App\Services\Exchange($request))->exchange_1c();
    }
}
