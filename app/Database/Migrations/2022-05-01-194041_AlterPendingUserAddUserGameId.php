<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterPendingUserAddUserGameId extends Migration
{
	public function up()
	{
		$fields = [
			'game_user_id' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true,
				'default' => null,
				'after' => 'username'
			]
		];
		$this->forge->addColumn('pending_users', $fields);
	}

	public function down()
	{
		//
	}
}
