<?php


namespace App\Models;


use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $returnType = '\App\Entities\Event';

    protected $allowedFields = [
        'user_id',
        'type_id',
        'category_id',
        'difficulty_id',
        'timezone_id',
        'videogame_id',
        'name',
        'date',
        'time',
        'country_id',
        'price',
        'currency_id',
        'min_participants',
        'max_participants',
        'active'
    ];


    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

}