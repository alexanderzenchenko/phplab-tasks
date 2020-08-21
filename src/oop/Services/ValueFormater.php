<?php


namespace OOP\Services;


class ValueFormater
{
    public static function formatValue($val)
    {
        $val = trim($val);
        $val = stripcslashes($val);
        $val = strip_tags($val);

        return $val;
    }
}