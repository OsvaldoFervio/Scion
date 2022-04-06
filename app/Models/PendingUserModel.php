<?php

namespace App\Models;

use CodeIgniter\Model;

class PendingUserModel extends Model
{
    protected $table = 'pending_users';
    protected $primaryKey = 'id';
    protected $returnType = '\App\Entities\PendingUser';

    protected $allowedFields = [
        'team_id',
        'username',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}