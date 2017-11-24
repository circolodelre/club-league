<?php
namespace App\Actions;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Club;
use App\Models\Region;

final class ClubsRegionAction extends PageAction
{
    public function __invoke(Request $request, Response $response, $args)
    {
        $clubs = Club::query([
            'region' => $args['region'],
        ]);

        $countries = [];
        foreach ($clubs as $club) {
            $countries[$club->country][] = $club;
        }

        $this->view->render($response, 'clubs-region.twig', [
            'region' => Region::load(['slug' => $args['region']]),
            'countries' => $countries,
        ]);

        return $response;
    }
}
