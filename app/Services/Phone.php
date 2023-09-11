<?php

namespace App\Services;

class Phone
{
    /**
    * Телефон в формате +7 (999) 999 99 99 в число 79999999999
    * @param string
    * @return int
    */
    public function phone_to_int($phone): int
    {
        $symbols = ["+", " ", "(", ")", "-"];
        $phone = str_replace($symbols, '', $phone);

        return (int) $phone;
    }

    /**
     * Число 79999999999 в телефон в формате +7 (999) 999 99 99
     * @param number
     * @return string
     */
    public function int_to_phone($number)
    {
        $phone = strval($number);
        $phone = '+'.substr($phone, 0, 1).' '.'('.substr($phone, 1, 3).')'.' '.substr($phone, 4, 3).' '.substr($phone, 7, 2).' '.substr($phone, 9, 2);

        return $phone;
    }
}