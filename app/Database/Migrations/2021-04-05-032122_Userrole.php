<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Userrole extends Migration
{
	public function up()
	{
		$this->forge->addField([
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
        ]);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('user_roles', true);

		$this->forge->addColumn('users', [
		    'role_id' => [
		        'type' => 'INT',
                'default' => 2,
                'after' => 'id'
            ]
        ]);
	}

	public function down()
	{
		//
	}
}
