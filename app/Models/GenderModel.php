<?php


namespace App\Models;


use CodeIgniter\Model;

class GenderModel extends Model
{
    protected $table = 'genders';
    protected $primaryKey = 'id';
    protected $returnType = '\App\Entities\Gender';

    protected $allowedFields = [
        'name',
        'active',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}