<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Team extends Entity
{
    protected $attributes = [
        'id' => null,
        'country_id' => null,
        'name' => null,
        'image_url' => null,
        'discord_url' => null,
        'whatsapp_number' => null,
        'email' => null,
        'active' => null
    ];
}