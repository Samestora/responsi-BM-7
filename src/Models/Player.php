<?php

namespace App\Models;

class Player
{
    public $name;
    public $transferYear;

    public function __construct($name, $transferYear)
    {
        $this->name = $name;
        $this->transferYear = $transferYear;
    }
}