<?php

namespace OOP\Forms;

use OOP\Request\Request;

abstract class AbstractForm
{
    protected $request;
    private static $formTypes = ['get' => 'GetForm', 'post' => 'PostForm'];

    abstract public function showForm();
    abstract public function handleRequest();

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param String $type
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public static function formFactory($type, Request $request)
    {
        if (array_key_exists($type, self::$formTypes)) {
            $class = __NAMESPACE__."\\".self::$formTypes[$type];
            return new $class($request);
        } else {
            throw new \Exception('Form '.$type.' not implemented');
        }
    }
}