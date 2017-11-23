<?php

$app->get('/', App\Actions\PageAction::class);
$app->get('/ranking', App\Actions\RankingAction::class);
$app->get('/how-it-works', App\Actions\HowItWorksAction::class);

