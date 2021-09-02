<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberTypeModel extends Model
{
	protected $table                = 'member_types';
	protected $primaryKey           = 'id';
	protected $returnType           = 'App\Entities\MemberType';
	protected $allowedFields        = [
		'name',
		'description',
		'active',
		'created_at',
		'updated_at'
	];

	protected $useSoftDelete        = true;
	protected $useTimestamps        = true;
}
