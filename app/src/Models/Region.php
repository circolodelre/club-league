<?php

namespace App\Models;

class Region extends Storable
{
    public $id = self::PRIMARY_KEY;
    public $name = "";
    public $slug = "";
}
