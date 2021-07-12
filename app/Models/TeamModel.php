<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
    protected $table = 'teams';
    protected $primaryKey = 'id';
    protected $returnType = '\App\Entities\Team';

    protected $allowedFields = [
        'user_id',
        'country_id',
        'name',
        'image_url',
        'discord_url',
        'whatsapp_number',
        'email',
        'active'
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}