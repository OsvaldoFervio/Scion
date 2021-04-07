<?php


namespace App\Entities;


use CodeIgniter\Entity;

class VideogamePlatform extends Entity
{
    protected $attributes = [
        'id' => null,
        'videogame_id' => null,
        'platform_id' => null,
        'active' => null,
    ];
}