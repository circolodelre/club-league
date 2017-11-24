<?php

require __DIR__ . '/vendor/autoload.php';

$file = __DIR__.'/storage/data/clubs.html';

function sanitize($string) {
    return strtoupper(preg_replace('/[ \n\r\t]+/', ' ', trim($string)));
}

function email($string) {
    preg_match("/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i", $string."", $matches);
    return strtolower($matches[0]);
}

$doc = new DOMDocument();
$doc->loadHTMLFile($file);

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
                    'name' => sanitize($nodes[2]->textContent),
                    'region' => sanitize($nodes[6]->textContent),
                    'country' => sanitize($nodes[4]->textContent),
                ];
                break;
            case 2:
                $nodes = $element->childNodes;
                $club['email'] = email($nodes[2]->textContent);
            case 4:
                App\Models\Club::submit($club['id'], $club);
                break;
        }
    }
}