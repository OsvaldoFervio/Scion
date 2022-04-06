<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPendingUser extends Migration
{
	public function up()
	{
		$baseFields = [
			'active' => [
				'type' => 'TINYINT',
                'default' => 1,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ];

		$fields = [
			'id' => [
				'type' => 'INT',
				'auto_increment' => true,
			],
			'team_id' => [
				'type' => 'INT'
			],
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => '30',
				'unique' => true,
			],
		];

		$this->forge->addField(array_merge($fields, $baseFields));
		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('team_id', 'teams', 'id');
		$this->forge->createTable('pending_users', true);
	}

	public function down()
	{
		$this->forge->dropTable('pending_users');
	}
}
