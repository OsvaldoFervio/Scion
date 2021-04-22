<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Timezonedescriptionoffset extends Migration
{
	public function up()
	{
	    $fields = [
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'default' => '',
                'after' => 'name',
            ],
            'offset' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
                'default' => '',
                'after' => 'description',
            ],
        ];

		$this->forge->addColumn('timezones', $fields);
	}

	public function down()
	{
		//
	}
}
