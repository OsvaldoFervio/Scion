<?php


namespace App\Models;


use CodeIgniter\Model;

class EventAwardModel extends Model
{
    protected $table = 'event_awards';
    protected $primaryKey = 'id';
    protected $returnType = '\App\Entities\EventAward';

    protected $allowedFields = [
        'event_id',
        'name',
        'amount',
        'active',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}