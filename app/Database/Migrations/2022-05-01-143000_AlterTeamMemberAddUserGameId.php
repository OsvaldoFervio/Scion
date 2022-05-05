<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTeamMemberAddUserGameId extends Migration
{
	public function up()
	{
		$fields = [
			'game_user_id' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true,
				'default' => null,
				'after' => 'member_type_id'
			]
		];
		$this->forge->addColumn('team_members', $fields);
	}

	public function down()
	{
		//
	}
}
