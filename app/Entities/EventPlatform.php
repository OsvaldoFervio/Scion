<?php


namespace App\Entities;


use CodeIgniter\Entity;

class EventPlatform extends Entity
{
    protected $attributes = [
        'id' => null,
        'event_id' => null,
        'platform_id' => null,
        'active' => null,
    ];
}