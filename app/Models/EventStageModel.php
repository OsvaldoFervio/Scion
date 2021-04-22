<?php


namespace App\Models;


use CodeIgniter\Model;

class EventStageModel extends Model
{
    protected $table = 'event_stages';
    protected $primaryKey = 'id';
    protected $returnType = '\App\Entities\EventStage';

    protected $allowedFields = [
        'event_id',
        'name',
        'description',
        'active',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}