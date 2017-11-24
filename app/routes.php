<?php

$app->get('/', App\Actions\HomeAction::class);
$app->get('/clubs', App\Actions\ClubsAction::class);
$app->get('/clubs/{region}', App\Actions\ClubsRegionAction::class);
$app->get('/ranking', App\Actions\RankingAction::class);
$app->get('/ranking/{region}', App\Actions\RankingRegionAction::class);
$app->get('/how-it-works', App\Actions\HowItWorksAction::class);

