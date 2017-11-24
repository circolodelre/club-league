<?php
namespace App\Actions;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Club;

final class RankingAction extends PageAction
{
    public function __invoke(Request $request, Response $response, $args)
    {
        $clubs = Club::all();

        $this->view->render($response, 'ranking.twig', [
            'clubs' => $clubs,
        ]);

        return $response;
    }
}