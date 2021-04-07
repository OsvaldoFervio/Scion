<?php


namespace App\Entities;


use CodeIgniter\Entity;

class EventImage extends Entity
{
    protected $attributes = [
        'id' => null,
        'event_id' => null,
        'image_url' => null,
        'active' => null
    ];
}