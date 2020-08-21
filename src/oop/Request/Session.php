<?php

namespace OOP\Request;

class Session extends AbstractParameters
{
    public static function startSession()
    {
        session_start();
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->parameters[$key] = $value;
    }

    /**
     * @param $key
     */
    public function remove($key)
    {
        if (!$this->has($key)) {
            throw new InvalidArgumentException('No key found');
        }
        unset($this->parameters[$key]);
    }

    public function clear()
    {
        session_unset();
        $this->parameters = [];
    }
}