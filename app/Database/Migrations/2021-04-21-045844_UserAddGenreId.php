<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserAddGenreId extends Migration
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

	    /*$genderIdField = [
            'genre' => [
                'name' => 'gender_id',
                'type' => 'INT',
                'default' => 3,
            ],
        ];*/


	    $this->forge->addField(array_merge($genderFields, $baseFields));
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('genders');

        $this->forge->addColumn('users', [
            'gender_id' => [
                'type' => 'INT',
                'default' => 3,
                'after' => 'role_id'
            ]
        ]);

	    //$this->forge->modifyColumn('users', $genderIdField);
	}

	public function down()
	{
		//
	}
}
