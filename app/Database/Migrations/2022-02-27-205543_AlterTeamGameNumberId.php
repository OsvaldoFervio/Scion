<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTeamGameNumberId extends Migration
{
	public function up()
	{
		$fields = [
			'game_number_id' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true,
				'default' => null,
				'after' => 'email'
			]
		];
		$this->forge->addColumn('teams', $fields);
	}

	public function down()
	{
		//
	}
}
