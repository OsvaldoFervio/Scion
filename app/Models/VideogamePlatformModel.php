<?php


namespace App\Models;


use CodeIgniter\Model;

class VideogamePlatformModel extends Model
{
    protected $table = 'videogame_platforms';
    protected $primaryKey = 'id';
    protected $returnType = '\App\Entities\VideogamePlatform';

    protected $allowedFields = [
        'videogame_id',
        'platform_id',
        'active',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}