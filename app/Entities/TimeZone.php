<?php


namespace App\Entities;


use CodeIgniter\Entity;

class TimeZone extends Entity
{
    protected $attributes = [
        'id' => null,
        'name' => null,
        'active' => null,
    ];
}