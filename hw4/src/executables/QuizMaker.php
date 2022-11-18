<?php
namespace cs174assignments\hw4\src\executables;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

$logger = new Logger('my_logger');
$logger->pushHandler(new StreamHandler(__DIR__.'/quiz_maker.log', Level::Debug));
$logger->pushHandler(new FirePHPHandler());

$logger->info('All quiz processed');
