<?php

    namespace OOP;

    require_once "./vendor/autoload.php";

    use OOP\Request\Request;
    use OOP\Request\Session;
    use OOP\Forms\AbstractForm;

    Session::startSession();

    $request = new Request($_POST, $_GET, $_COOKIE, $_SESSION, $_SERVER);

    try {
        $postForm = AbstractForm::formFactory("post", $request);
        $postForm->handleRequest();
    } catch (\Exception $e) {
        //TODO: Log exception
    }

    try {
        $getForm = AbstractForm::formFactory("get", $request);
        $getForm->handleRequest();
    } catch (\Exception $e) {
        //TODO: Log exception
    }

    require_once './tmpl/index.php';

