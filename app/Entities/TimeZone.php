<?php


namespace App\Entities;


use CodeIgniter\Entity;

class TimeZone extends Entity
{
    protected $attributes = [
        'id' => null,
        'name' => null,
        'description' => null,
        'offset' => null,
        'active' => null,
    ];
}