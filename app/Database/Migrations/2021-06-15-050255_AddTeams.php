<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTeams extends Migration
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
			'user_id' => [
				'type' => 'INT'
			],
			'country_id' => [
				'type' => 'INT'
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => '50'
			],
			'image_url' => [
				'type' => 'VARCHAR',
				'constraint' => '150'
			],
			'discord_url' => [
				'type' => 'VARCHAR',
				'constraint' => '150',
				'null' => true
			],
			'whatsapp_number' => [
				'type' => 'CHAR',
				'constraint' => '15',
				'null' => true
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => true
			],
		];

		$memberTypesFields = [
			'id' => [
				'type' => 'INT',
				'auto_increment' => true
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => '30'
			],
			'description' => [
				'type' => 'VARCHAR',
				'constraint' => '50'
			]
		];

		$teamMemberFields = [
			'id' => [
				'type' => 'INT',
				'auto_increment' => true
			],
			'team_id' => [
				'type' => 'INT'
			],
			'user_id' => [
				'type' => 'INT'
			],
			'member_type_id' => [
				'type' => 'INT'
			]
		];

		// Teams Table
		$this->forge->addField(array_merge($fields, $baseFields));
		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('user_id', 'users', 'id');
		$this->forge->addForeignKey('country_id', 'countries', 'id');
		$this->forge->createTable('teams', true);

		// MemberTypes Table
		$this->forge->addField(array_merge($memberTypesFields, $baseFields));
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('member_types');

		// TeamMembers Table
		$this->forge->addField(array_merge($teamMemberFields, $baseFields));
		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('team_id', 'teams', 'id');
		$this->forge->addForeignKey('user_id', 'users', 'id');
		$this->forge->addForeignKey('member_type_id', 'member_types', 'id');
		$this->forge->createTable('team_members');
	}

	public function down()
	{
		$this->forge->dropTable('teams_members');
		$this->forge->dropTable('teams');
	}
}
