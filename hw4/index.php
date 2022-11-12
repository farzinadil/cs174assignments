<?php
namespace cs174assignments\hw4;
require_once 'autoloader.php';

//Add new 'use' line and switch case if new controllers created
use cs174assignments\hw4\src\controllers\LandingController;

if (isset($_GET['c'])) {
    switch($_GET['c']) {

    }
} else { //Base case landing page
    $run = new LandingController();
}