<?php


namespace App\Entities;


use CodeIgniter\Entity;

class Videogame extends Entity
{
    protected $attributes = [
        'id' => null,
        'name' => null,
        'description' => null,
        'active' => null,
    ];
}