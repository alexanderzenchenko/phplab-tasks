<?php


namespace OOP\Forms;


use OOP\Services\ValueFormater;

class PostForm extends AbstractForm
{
    const USE_SESSION = 'session';
    const USE_COOKIES = 'cookies';

    public function showForm()
    {
        require_once "./tmpl/postform.php";
    }

    public function handleRequest()
    {
        switch (ValueFormater::formatValue($this->request->get('useSessionOrCookies'))) {
            case self::USE_SESSION:
                $this->request->session()->set('name', ValueFormater::formatValue($this->request->post('name')));
                $this->request->session()->set('email', ValueFormater::formatValue($this->request->post('email')));
                $this->request->updateGlobals();
                break;
            case self::USE_COOKIES:
                $this->request->cookies()->set('name', ValueFormater::formatValue($this->request->post('name')));
                $this->request->cookies()->set('email', ValueFormater::formatValue($this->request->post('email')));
                $this->request->updateGlobals();
                break;
        }
    }
}