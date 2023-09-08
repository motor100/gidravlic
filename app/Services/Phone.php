<?php

namespace App\Services;

class Phone
{
    protected $phone;

    public function __construct($phone)
    {
        $this->phone = $phone;
    }
    
    /**
    * Телефон в формате +7 (999) 999 99 99 в число 79999999999 unsignedBigInteger
    * @param
    * @return int
    */
    public function phone_to_int(): int
    {
        $symbols = ["+", " ", "(", ")", "-"];
        $phone = str_replace($symbols, '', $this->phone);

        return (int) $phone;
    }
}