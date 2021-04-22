<?php


namespace App\Entities;


use CodeIgniter\Entity;

class Platform extends Entity
{
    protected $attributes = [
        'id' => null,
        'name' => null,
        'active' => null,
    ];
}