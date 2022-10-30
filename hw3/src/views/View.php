<?php

class View
{
    public function __construct($data) {
        require 'layouts/header.php';
        ?>
            <h1><a href="index.php">Monster Underwriters</a></h1>
            <a href="index.php?c=Type">Go to Types</a>
            <a href="index.php?c=Policy">Go to Policy</a>
        <?php
    }
}