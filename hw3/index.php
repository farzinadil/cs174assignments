<?php
require_once 'src/controllers/Controller.php';
require_once 'src/controllers/Landing.php';
require_once 'src/controllers/Type.php';
require_once 'src/controllers/Policy.php';

$controller = (isset($_REQUEST['c']) && in_array($_REQUEST['c'],
        ["Landing", "Type", "Policy"])) ? $_REQUEST['c'] : "Landing";
$controller = new $controller();

