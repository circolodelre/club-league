<?php
namespace App\Actions;

use Slim\Http\Request;
use Slim\Http\Response;

final class RankingAction extends PageAction
{
    public function __invoke(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");

        $this->view->render($response, 'ranking.twig');

        return $response;
    }
}