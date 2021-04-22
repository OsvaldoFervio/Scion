<?php


namespace App\Entities;


use CodeIgniter\Entity;

class Difficulty extends Entity
{
    protected $attributes = [
        'id' => null,
        'name' => null,
        'description' => null,
        'active' => null,
    ];
}