<?php

namespace App\Models;

use CodeIgniter\Model;

class CurrencyModel extends Model
{
	protected $table                = 'currencies';
	protected $primaryKey           = 'id';
	protected $returnType           = '\App\Entities\Currency';
	protected $allowedFields        = [
        'country_id',
        'name',
        'active',
    ];

	protected $useTimestamps        = false;
    protected $useSoftDeletes        = false;
}
