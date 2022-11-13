<?php
namespace cs174assignments\hw4;
require_once 'autoloader.php';

//Add new 'use' line and switch case if new controllers created
use cs174assignments\hw4\src\controllers\LandingController;
use cs174assignments\hw4\src\controllers\QuizPageController;
use cs174assignments\hw4\src\controllers\StatsController;

if (isset($_GET['c'])) {
    switch($_GET['c']) {
        case "Stats":
            $run = new StatsController();
        case "QuizPage":
            $run = new QuizPageController();
    }
} else { //Base case landing page
    $run = new LandingController();
}

