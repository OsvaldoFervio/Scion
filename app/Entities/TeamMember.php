<?php

namespace App\Entities;

use CodeIgniter\Entity;

class TeamMember extends Entity
{
    protected $attributes = [
        'id',
        'team_id',
        'user_id',
        'member_type_id',
        'active'
    ];
}