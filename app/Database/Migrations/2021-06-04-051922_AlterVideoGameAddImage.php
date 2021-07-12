<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterVideoGameAddImage extends Migration
{
	public function up()
	{
		$fields = [
			'image_url' => [
				'type' => 'VARCHAR',
				'constraint' => '150',
				'after' => 'description',
				'default' => null,
			]
		];
		$this->forge->addColumn('videogames', $fields);
	}

	public function down()
	{
		//
	}
}
