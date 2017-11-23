<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $file = __DIR__ . $_SERVER['REQUEST_URI'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

session_start();

$app = new \Slim\App();

require __DIR__ . '/../app/services.php';
require __DIR__ . '/../app/routes.php';

$app->run();
