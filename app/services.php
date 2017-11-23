<?php

// DIC configuration
$container = $app->getContainer();

// Config
$container['config'] = function ($c) {
    $env = $c->get('env');
    $config = [
        'db' => [
            'name' => $env->get('DB_NAME', 'localhost');
        ]
    ];
    return $config;
};

// Environment
$container['env'] = function ($c) {
    $env = new Javanile\Dotenv(dirname(__DIR__));
    $env->load();
    return $env;
};

// Twig templates
$container['view'] = function ($c) {
    $config = $c->get('config');
    $view = new Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);
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

// HomeAction
$container[App\Action\HomeAction::class] = function ($c) {
    return new App\Action\HomeAction($c->get('view'), $c->get('logger'));
};

