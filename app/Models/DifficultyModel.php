<?php


namespace App\Models;


use CodeIgniter\Model;

class DifficultyModel extends Model
{
    protected $table = 'difficulties';
    protected $primaryKey = 'id';
    protected $returnType = '\App\Entities\Difficulty';

    protected $allowedFields = [
        'name',
        'description',
        'active',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}