<?php 
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\User';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'first_name',
        'last_name',
        'birthdate',
        'genre',
        'email',
        'username',
        'password'
    ];

    protected $useTimestamps = true;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}