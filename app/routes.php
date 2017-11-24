<?php

$app->get('/', App\Actions\HomeAction::class);
$app->get('/clubs', App\Actions\ClubsAction::class);
$app->get('/ranking', App\Actions\RankingAction::class);
$app->get('/how-it-works', App\Actions\HowItWorksAction::class);

