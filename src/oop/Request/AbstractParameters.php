<?php

namespace OOP\Request;

abstract class AbstractParameters
{
    protected $parameters;

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @param array $only
     * @return array
     */
    public function all(array $only = [])
    {
        if (count($only)) {
            return array_intersect_key($this->parameters, array_flip($only));
        }

        return $this->parameters;
    }

    /**
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    public function get($key, $default = null)
    {
        return $this->has($key) ? $this->parameters[$key] : $default;
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return array_key_exists($key, $this->parameters);
    }

    abstract public function set($key, $value);
    abstract public function remove($key);
}