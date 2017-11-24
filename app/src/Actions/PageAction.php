<?php
namespace App\Actions;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class PageAction
{
    protected $view;
    protected $logger;

    public function __construct($container)
    {
        $this->view = $container->get('view');
        $this->logger = $container->get('logger');
    }
}
