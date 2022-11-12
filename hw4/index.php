<?php
namespace cs174assignments\hw4;
use cs174assignments\hw4\src\controllers\LandingController;

$controller = (isset($_REQUEST['c']) && in_array($_REQUEST['c'],
        ["Landing", "Display"])) ? $_REQUEST['c'] : "Landing" . "Controller";
$run = new $controller();