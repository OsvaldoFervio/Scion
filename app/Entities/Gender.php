<?php


namespace App\Entities;


use CodeIgniter\Entity;

class Gender extends Entity
{
    protected $attributes = [
        'id' => null,
        'name' => null,
        'active' => null
    ];
}