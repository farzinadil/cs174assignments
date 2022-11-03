<?php

class Controller
{
    public function find_method() {
        return $method = (isset($_REQUEST['m']) && in_array($_REQUEST['m'],
                ["display", "create"])) ? $_REQUEST['m'] : "display";
    }

    public function model($model) {
        require_once 'src/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = []) {
        require_once 'src/views/View.php';
        $v = new $view($data);
    }
}