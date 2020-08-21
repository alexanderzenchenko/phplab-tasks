<?php


namespace OOP\Forms;


use OOP\Services\ValueFormater;

class GetForm extends AbstractForm
{

    public function showForm()
    {
        require_once "./tmpl/getform.php";
    }

    public function handleRequest()
    {
        $sessionKey = ValueFormater::formatValue($this->request->query('sessionKey'));
        if ($sessionKey != '' && $this->request->session()->has($sessionKey)) {
            $this->request->session()->remove($sessionKey);
            $this->request->updateGlobals();
        }

        $cookiesKey = ValueFormater::formatValue($this->request->query('cookiesKey'));
        if ($cookiesKey != '' && $this->request->cookies()->has($cookiesKey)) {
            $this->request->cookies()->remove($cookiesKey);
            $this->request->updateGlobals();
        }
    }
}