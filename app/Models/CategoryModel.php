<?php


namespace App\Models;


use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $returnType = '\App\Entities\Category';

    protected $allowedFields = [
        'name',
        'description',
        'active',
    ];
}