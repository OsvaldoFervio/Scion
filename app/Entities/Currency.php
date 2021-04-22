<?php


namespace App\Entities;


use CodeIgniter\Entity;

class Currency extends Entity
{
    protected $attributes = [
        'id' => null,
        'country_id' => null,
        'name' => null,
        'active' => null,
    ];
}