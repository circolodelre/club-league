<?php

// DIC configuration
$container = $app->getContainer();

// Config
$container['config'] = function ($c) {
    $env = $c->get('env');
    $config = [
        'db' => [
            'host' => $env->get('APP_DB_HOST', 'localhost'),
            'port' => $env->get('APP_DB_PORT', '3306'),
            'name' => $env->get('APP_DB_NAME', 'database'),
            'user' => $env->get('APP_DB_USER', 'root'),
            'pass' => $env->get('APP_DB_USER', 'root'),
        ],
        'view' => [
            'path' => __DIR__ . '/../view',
            'twig' => [
                'cache' => __DIR__ . '/../storage/cache/twig',
                'debug' => true,
                'auto_reload' => true,
            ],
        ],
        'logger' => [
            'name' => 'app',
            'path' => $env->get('APP_LOG_FILE', __DIR__.'/../storage/log/app.log'),
        ],
    ];
    return $config;
};

// Database
Javanile\Moldable\Context::registerContainer($container);
$container['db'] = function ($c) {
    $config = $c->get('config');
    $db = new Javanile\Moldable\Database([
        'host'     => $config['db']['host'],
        'port'     => $config['db']['port'],
        'dbname'   => $config['db']['name'],
        'username' => $config['db']['user'],
        'password' => $config['db']['pass'],
        'prefix'   => 'prefix_',
        'debug'    => true
    ]);
    return $db;
};

// Environment
$container['env'] = function ($c) {
    $env = new Javanile\Dotenv\Environment(dirname(__DIR__));
    $env->safeLoad();
    return $env;
};

// Twig templates
$container['view'] = function ($c) {
    $config = $c->get('config');
    $view = new Slim\Views\Twig($config['view']['path'], $config['view']['twig']);
    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
    $view->addExtension(new Twig_Extension_Debug());
    return $view;
};

// Flash messages
$container['flash'] = function ($c) {
    return new Slim\Flash\Messages;
};

// Monolog
$container['logger'] = function ($c) {
    $config = $c->get('config');
    $logger = new Monolog\Logger($config['logger']['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($config['logger']['path'], Monolog\Logger::DEBUG));
    return $logger;
};
