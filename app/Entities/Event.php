<?php


namespace App\Entities;


use CodeIgniter\Entity;

class Event extends Entity
{
    protected $attributes = [
        'id' => null,
        'user_id' => null,
        'type_id' => null,
        'category_id' => null,
        'difficulty_id' => null,
        'timezone_id' => null,
        'videogame_id' => null,
        'name' => null,
        'date' => null,
        'time' => null,
        'country_id' => null,
        'price' => null,
        'currency_id' => null,
        'min_participants' => null,
        'max_participants' => null,
        'active'
    ];
}