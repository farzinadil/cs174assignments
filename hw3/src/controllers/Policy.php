<?php

class Policy extends Controller
{
    public function __construct() {
        echo 'On Policy Controller';
        $this->view("View");
    }

    public function create() {
        echo 'created';
    }

    public function display() {
        echo 'displayed';
    }
}