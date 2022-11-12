<?php
namespace cs174assignments\hw4;
spl_autoload_register(function ($class_name) {
    $prefix = __NAMESPACE__;
    try {
        if (strpos($class_name, $prefix) !== false )
            $class_name = substr($class_name, strlen($prefix), strlen($class_name));
        $class_name = str_replace('\\', '/', $class_name);
        require __DIR__.$class_name . ".php";
    } catch (\Exception $exception){
        echo "AutoLoader Error:" . $exception->getMessage();
    }
});