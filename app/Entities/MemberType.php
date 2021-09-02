<?php

namespace App\Entities;

use CodeIgniter\Entity;

class MemberType extends Entity
{
	protected $attributes = [
		'id',
		'name',
		'description',
		'active'
	];
}
