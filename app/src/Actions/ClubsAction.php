<?php
namespace App\Actions;

use Slim\Http\Request;
use Slim\Http\Response;

final class ClubsAction extends PageAction
{
    public function __invoke(Request $request, Response $response, $args)
    {
        $this->view->render($response, 'clubs.twig');

        return $response;
    }
}
