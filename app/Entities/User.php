<?php

namespace App\Entities;

use CodeIgniter\Entity;

class User extends Entity
{
    protected $attributes = [
        'id' => null,
        'role_id' => 2,
        'first_name' => null,
        'last_name' => null,
        'birthdate' => null,
        'email' => null,
        'genre' => null,
        'username' => null,
        'password' => null
    ];
}