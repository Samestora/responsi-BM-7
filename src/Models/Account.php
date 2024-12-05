<?php

namespace App\Models;

class Account
{
    // Properties
    public $id;
    public $role_id;
    public $name;
    public $email;
    public $password;

    // Constructor
    public function __construct($id, $role_id, $name, $email, $password)
    {
        $this->id = $id;
        $this->role_id = $role_id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
}
