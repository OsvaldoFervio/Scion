<?php


namespace App\Models;


use CodeIgniter\Model;

class EventTypeModel extends Model
{
    protected $table = 'event_types';
    protected $primaryKey = 'id';
    protected $returnType = '\App\Entities\EventType';

    protected $allowedFields = [
        'name',
        'description',
        'active',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}