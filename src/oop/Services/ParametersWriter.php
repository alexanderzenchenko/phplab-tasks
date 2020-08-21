<?php

namespace OOP\Services;

class ParametersWriter
{
    public static function writeAll(array $params)
    {
        $result = '';

        foreach ($params as $key => $val) {
            $result .= '<tr><td>'.$key.'</td><td>'.ValueFormater::formatValue($val).'</td></tr>';
        }

        return $result;
    }

    public static function writeParam($key, $val)
    {
        return '<tr><td>'.$key.'</td><td>'.ValueFormater::formatValue($val).'</td></tr>';
    }
}