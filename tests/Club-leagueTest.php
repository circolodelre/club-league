<?php

namespace Circolodelre\Club-league\Tests;

use Javanile\Producer;
use PHPUnit\Framework\TestCase;
use Circolodelre\Club-league\Club-league;

Producer::addPsr4([
    'Circolodelre\Club-league\\' => __DIR__.'/../src',
    'Circolodelre\Club-league\\Tests\\' => __DIR__,
]);

final class Club-leagueTest extends TestCase
{
    public function testCliStaticMethod()
    {
        $object = new Club-league();
        $this->assertInstanceOf('Circolodelre\Club-league\\Club-league', $object);

        $output = "Hello World!";
        $this->assertRegexp('/World/i', $output);
    }
}
