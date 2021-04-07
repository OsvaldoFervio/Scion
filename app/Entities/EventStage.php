<?php


namespace App\Entities;


use CodeIgniter\Entity;

class EventStage extends Entity
{
    protected $attributes = [
        'id' => null,
        'event_id' => null,
        'name' => null,
        'description' => null,
        'active' => null,
    ];
}