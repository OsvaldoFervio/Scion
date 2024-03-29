<?php

namespace App\Entities;

use CodeIgniter\Entity;

class User extends Entity
{
    protected $attributes = [
        'id' => null,
        'role_id' => 2,
        'gender_id' => null,
        'first_name' => null,
        'last_name' => null,
        'birthdate' => null,
        'email' => null,
        'username' => null,
        'password' => null
    ];
}