<?php


namespace App\Models;


use CodeIgniter\Model;

class EventPlatformModel extends Model
{
    protected $table = 'event_platforms';
    protected $primaryKey = 'id';
    protected $returnType = '\App\Entities\EventPlatform';

    protected $allowedFields = [
        'event_id',
        'platform_id',
        'active',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}