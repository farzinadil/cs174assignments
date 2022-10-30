<?php

class app
{
    protected $controller = 'Landing';
    protected $method = 'index';
    protected $args = [];

    public function __construct() {
        $url = $this->parseUrl();
        if (file_exists('src/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once 'src/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
                echo 'OK';
            }
        }

        $this->args = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->args);
    }

    public function parseUrl() {
        if(isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}