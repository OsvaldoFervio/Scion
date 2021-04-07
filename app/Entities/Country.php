<?php


namespace App\Entities;


use CodeIgniter\Entity;

class Country extends Entity
{
    protected $attributes = [
        'id' => null,
        'name' => null,
        'code' => null,
        'active' => null,
    ];
}