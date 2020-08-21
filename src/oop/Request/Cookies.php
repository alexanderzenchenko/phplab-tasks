<?php

namespace OOP\Request;

use http\Exception\InvalidArgumentException;

class Cookies extends AbstractParameters
{

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        setcookie($key, $value);
    }

    /**
     * @param $key
     */
    public function remove($key)
    {
        if (!$this->has($key)) {
            throw new InvalidArgumentException('No key found');
        }
        setcookie($key, '', time()-1);
        unset($this->parameters[$key]);
    }
}