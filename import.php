<?php

date_default_timezone_set('GMT');

require __DIR__ . '/vendor/autoload.php';

$app = new Slim\App();

require __DIR__ . '/app/services.php';

$file = __DIR__.'/storage/data/clubs.html';

function name($string) {
    return ucwords(strtolower($string));
}

function slug($string) {
    return strtolower(preg_replace('/[^a-z0-1]/i', '-', $string));
}

function sanitize($string) {
    return strtoupper(preg_replace('/[ \n\r\t]+/', ' ', trim($string)));
}

function email($string) {
    preg_match("/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i", $string."", $matches);
    return strtolower($matches[0]);
}

$doc = new DOMDocument();
$doc->loadHTMLFile($file);

App\Models\Club::drop('confirm');
App\Models\Region::drop('confirm');

$clubs = [];
$elements = $doc->getElementsByTagName('tr');

if (!is_null($elements)) {
    foreach ($elements as $row => $element) {
        switch ($row % 5) {
            case 0:
                $club = [];
                break;
            case 1:
                $nodes = $element->childNodes;
                $club = [
                    'id' => sanitize($nodes[0]->textContent),
                    'name' => name(sanitize($nodes[2]->textContent)),
                    'region' => sanitize($nodes[6]->textContent),
                    'country' => sanitize($nodes[4]->textContent),
                ];
                break;
            case 2:
                $nodes = $element->childNodes;
                $club['email'] = email($nodes[2]->textContent);
            case 4:
                if (!in_array($club['id'], $clubs)) {
                    App\Models\Region::submit([
                        'name' => name($club['region']),
                        'slug' => slug($club['region']),
                    ]);
                    $club['region'] = slug($club['region']);
                    App\Models\Club::insert($club);
                    $clubs[] = $club['id'];
                }
                break;
        }
    }
}