<?php

class Type extends Controller
{

    public function __construct() {
        echo 'On Type Controller';
        $this->view("View");
    }

    public function create() {
        echo 'created';
    }

    public function display() {
        echo 'displayed';
    }
}