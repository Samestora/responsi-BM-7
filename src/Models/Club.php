<?php

namespace App\Models;
use App\Db\Database;
use PDO;

class Club
{
    // Properties
    public $id;
    public $name;
    public $origin;

    // Constructor
    public function __construct($id, $name, $origin)
    {
        $this->id = $id;
        $this->name = $name;
        $this->origin = $origin;
    }
}
?>