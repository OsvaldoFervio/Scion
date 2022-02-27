<?php

namespace App\Entities;

use CodeIgniter\Entity;

class PendingUser extends Entity
{
    protected $attributes = [
        'id' => null,
        'team_id' => null,
        'username' => null,
        'active' => null,
    ];
}