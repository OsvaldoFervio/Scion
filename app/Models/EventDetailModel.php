<?php


namespace App\Models;


use CodeIgniter\Model;

class EventDetailModel extends Model
{
    protected $table = 'event_details';
    protected $primaryKey = 'id';
    protected $returnType = '\App\Entities\EventDetail';

    protected $allowedFields = [
        'event_id',
        'description',
        'rules',
        'active',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}