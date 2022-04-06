<?php


namespace App\Models;


use CodeIgniter\Model;

class VideogameModel extends Model
{
    protected $table = 'videogames';
    protected $primaryKey = 'id';
    protected $returnType = '\App\Entities\Videogame';

    protected $allowedFields = [
        'name',
        'description',
        'image_url',
        'active',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}