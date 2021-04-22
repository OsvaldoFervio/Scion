<?php


namespace App\Models;


use CodeIgniter\Model;

class CountryModel extends Model
{
    protected $table = 'countries';
    protected $primaryKey = 'id';
    protected $returnType = '\App\Entities\Country';

    protected $allowedFields = [
        'name',
        'code',
        'active',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}