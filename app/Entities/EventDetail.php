<?php


namespace App\Entities;


use CodeIgniter\Entity;

class EventDetail extends Entity
{
    protected $attributes = [
        'id' => null,
        'event_id' => null,
        'description' => null,
        'rules' => null,
        'active' => null,
    ];
}