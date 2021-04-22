<?php

namespace App\Models;

use CodeIgniter\Model;

class PlatformModel extends Model
{
	protected $table                = 'platforms';
	protected $primaryKey           = 'id';
	protected $returnType           = '\App\Entities\Platform';

	protected $allowedFields = [
        'name',
        'active',
    ];

    protected $useSoftDeletes        = true;
	protected $useTimestamps        = true;
}
