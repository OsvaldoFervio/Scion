<?php


namespace App\Entities;


use CodeIgniter\Entity;

class EventAward extends Entity
{
    protected $attributes = [
        'id' => null,
        'event_id' => null,
        'name' => null,
        'amount' => null,
        'active' => null,
    ];
}