<?php

namespace App\Models;

class Player
{
    // Properties
    public $id;
    public $position;
    public $name;
    public $jersey;
    public $value;
    public $team_id;
    public $is_foreign;

    // Constructor
    public function __construct($id, $position, $name, $jersey, $value, $team_id, $is_foreign)
    {
        $this->id = $id;
        $this->position = $position;
        $this->name = $name;
        $this->jersey = $jersey;
        $this->value = $value;
        $this->team_id = $team_id;
        $this->is_foreign = $is_foreign;
    }

    // Method to display the value with Euro formatting
    public function getFormattedValue()
    {
        return "€" . number_format($this->value, 0, '.', ',');
    }
}
