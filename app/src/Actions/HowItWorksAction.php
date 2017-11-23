<?php
namespace App\Actions;

use Slim\Http\Request;
use Slim\Http\Response;

final class HowItWorksAction extends PageAction
{
    public function __invoke(Request $request, Response $response, $args)
    {
        $this->view->render($response, 'how-it-works.twig');

        return $response;
    }
}