<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamMemberModel extends Model
{
    protected $table = 'team_members';
    protected $primaryKey = 'id';
    protected $returnType = 'App\Entity\TeamMember';
    protected $allowedFields = [
        'team_id',
        'user_id',
        'member_type_id'
    ];

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
}