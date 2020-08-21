<?php

namespace OOP\Request;

class Request
{
    private $post;
    private $query;
    private $session;
    private $cookies;
    private $server;

    /**
     * Request constructor.
     * @param array $post
     * @param array $get
     * @param array $cookies
     * @param array $session
     * @param array $server
     */
    public function __construct(array $post, array $get, array $cookies, array $session, array $server)
    {
        $this->post = $post;
        $this->query = $get;
        $this->cookies = new Cookies($cookies);
        $this->session = new Session($session);
        $this->server = $server;
    }

    /**
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    public function query($key, $default = null)
    {
        return array_key_exists($key, $this->query) ? $this->query[$key] : $default;
    }

    /**
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    public function post($key, $default = null)
    {
        return array_key_exists($key, $this->post) ? $this->post[$key] : $default;
    }

    /**
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    public function get($key, $default = null)
    {
        if (array_key_exists($key, $this->post)) {
            return $this->post[$key];
        } elseif (array_key_exists($key, $this->query)) {
            return $this->query[$key];
        } else {
            return $default;
        }
    }

    /**
     * @param array $only
     * @return array
     */
    public function all(array $only = [])
    {
        $result = array_merge($this->query, $this->post);

        if (count($only)) {
            return array_intersect_key($result, array_flip($only));
        }

        return $result;
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return array_key_exists($key, $this->all());
    }

    /**
     * @return mixed|string
     */
    public function ip()
    {
        return array_key_exists('REMOTE_ADDR', $this->server) ? $this->server['REMOTE_ADDR'] : '';
    }

    /**
     * @return mixed|string
     */
    public function userAgent()
    {
        return array_key_exists('HTTP_USER_AGENT', $this->server) ? $this->server['HTTP_USER_AGENT'] : '';
    }

    /**
     * @return Cookies
     */
    public function cookies()
    {
        return $this->cookies;
    }

    /**
     * @return Session
     */
    public function session()
    {
        return $this->session;
    }

    public function updateGlobals()
    {
        $_GET = $this->query;
        $_POST = $this->post;
        $_SESSION = $this->session()->all();
        $_COOKIE = $this->cookies()->all();
    }
}