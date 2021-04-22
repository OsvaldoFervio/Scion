<?php


namespace App\Models;


use CodeIgniter\Model;

class TimeZoneModel extends Model
{
    protected $table = 'timezones';
    protected $primaryKey = 'id';
    protected $returnType = '\App\Entities\TimeZone';

    protected $allowedFields = [
        'name',
        'description',
        'offset',
        'active',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}