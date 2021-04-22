<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
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

        $userRoleFields = [
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ]
        ];

	    $this->forge->addField(array_merge($userRoleFields, $baseFields));
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('user_roles', true);

        $genderFields = [
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
        ];

        $this->forge->addField(array_merge($genderFields, $baseFields));
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('genders');

        $userFields = [
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'role_id' => [
                'type' => 'INT',
                'default' => 2,
            ],
            'gender_id' => [
                'type' => 'INT',
                'default' => 3,
            ],
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => 30
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => 30
            ],
            'birthdate' => [
                'type' => 'DATE',
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'unique' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'unique' => true
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
        ];

	    $this->forge->addField(array_merge($userFields, $baseFields));
		$this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('role_id', 'user_roles', 'id');
        $this->forge->addForeignKey('gender_id', 'genders', 'id');
        $this->forge->createTable('users', true);
	}

	public function down()
	{
        $this->forge->dropTable('users', true);
        $this->forge->dropTable('genders', true);
        $this->forge->dropTable('user_roles', true);
	}
}
