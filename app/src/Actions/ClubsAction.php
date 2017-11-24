<?php
namespace App\Actions;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Club;
use App\Models\Region;

final class ClubsAction extends PageAction
{
    public function __invoke(Request $request, Response $response, $args)
    {
        $this->view->render($response, 'clubs.twig', [
            'regions' => Region::all(['order' => 'name']),
        ]);

        return $response;
    }
}
