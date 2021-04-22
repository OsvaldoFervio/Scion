<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Event extends Migration
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

	    $categoryFields = [
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
        ];

	    $countryFields = [
	        'id' => [
	            'type' => 'INT',
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
            ],
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => true,
            ],
        ];

	    $currencyFields = [
	        'id' => [
	            'type' => 'INT',
                'auto_increment' => true
            ],
            'country_id' => [
                'type' => 'INT',
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '30'
            ],
        ];

	    $difficultyFields = [
	        'id' => [
	            'type' => 'INT',
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '30'
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true
            ],
        ];

        $timeZoneFields = [
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'offset' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
            ]
        ];

	    $eventTypeFields = [
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
            ],
        ];

	    $platformFields = [
	        'id' => [
	            'type' => 'INT',
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '30'
            ]
        ];

	    $videoGameFields = [
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
                'constraint' => '50',
                'null' => true
            ]
        ];

	    $videoGamePlatform = [
	        'id' => [
	            'type' => 'INT',
                'auto_increment' => true
            ],
            'videogame_id' => [
                'type' => 'INT',
            ],
            'platform_id' => [
                'type' => 'INT'
            ]
        ];

	    $eventFields = [
	        'id' => [
	            'type' => 'INT',
                'auto_increment' => true
            ],
            'user_id' => [
                'type' => 'INT'
            ],
            'type_id' => [
                'type' => 'INT'
            ],
            'category_id' => [
                'type' => 'INT'
            ],
            'difficulty_id' => [
                'type' => 'INT'
            ],
            'timezone_id' => [
                'type' => 'INT'
            ],
            'videogame_id' => [
                'type' => 'INT'
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'date' => [
                'type' => 'DATE'
            ],
            'time' => [
                'type' => 'TIME'
            ],
            'country_id' => [
                'type' => 'INT',
                'null' => true
            ],
            'price' => [
                'type' => 'DECIMAL',
                'null' => true
            ],
            'currency_id' => [
                'type' => 'INT',
                'null' => true
            ],
            'min_participants' => [
                'type' => 'INT'
            ],
            'max_participants' => [
                'type' => 'INT'
            ],
        ];

	    $eventDetailFields = [
	        'id' => [
	            'type' => 'INT',
                'auto_increment' => true
            ],
            'event_id' => [
                'type' => 'INT'
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'rules' => [
                'type' => 'TEXT',
                'null' => true
            ]
        ];

	    $eventAwardFields = [
	        'id' => [
	            'type' => 'INT',
                'auto_increment' => true
            ],
            'event_id' => [
                'type' => 'INT'
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'amount' => [
                'type' => 'DECIMAL',
                'null' => true
            ],
        ];

	    $eventPlatformFields = [
	        'id' => [
	            'type' => 'INT',
                'auto_increment' => true
            ],
            'event_id' => [
                'type' => 'INT'
            ],
            'platform_id' => [
                'type' => 'INT'
            ],
        ];

	    $eventStageFields = [
	        'id' => [
	            'type' => 'INT',
                'auto_increment' => true,
            ],
            'event_id' => [
                'type' => 'INT'
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '30'
            ],
            'description' => [
                'type' => 'TEXT'
            ],
        ];

	    $eventImageFields = [
	        'id' => [
	            'type' => 'INT',
                'auto_increment' => true
            ],
            'event_id' => [
                'type' => 'INT'
            ],
            'image_url' => [
                'type' => 'VARCHAR',
                'constraint' => '150'
            ]
        ];

	    // Category Table
		$this->forge->addField(array_merge($categoryFields, $baseFields));
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('categories');

		//Country Table
        $this->forge->addField(array_merge($countryFields, $baseFields));
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('countries');

        //Currency Table
        $this->forge->addField(array_merge($currencyFields, $baseFields));
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('country_id', 'countries', 'id');
        $this->forge->createTable('currencies');

        //Difficulty Table
        $this->forge->addField(array_merge($difficultyFields, $baseFields));
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('difficulties');

        //TimeZone Table
        $this->forge->addField(array_merge($timeZoneFields, $baseFields));
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('timezones');

        //EventType Table
        $this->forge->addField(array_merge($eventTypeFields, $baseFields));
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('event_types');

        //Platform Table
        $this->forge->addField(array_merge($platformFields, $baseFields));
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('platforms');

        //VideoGame Table
        $this->forge->addField(array_merge($videoGameFields, $baseFields));
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('videogames');

        //VideoGamePlatform Table
        $this->forge->addField(array_merge($videoGamePlatform, $baseFields));
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('platform_id', 'platforms', 'id');
        $this->forge->createTable('videogame_platforms');

        //Event Table
        $this->forge->addField(array_merge($eventFields, $baseFields));
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->addForeignKey('type_id', 'event_types', 'id');
        $this->forge->addForeignKey('category_id', 'categories', 'id');
        $this->forge->addForeignKey('difficulty_id', 'difficulties', 'id');
        $this->forge->addForeignKey('timezone_id', 'timezones', 'id');
        $this->forge->addForeignKey('videogame_id', 'videogames', 'id');
        $this->forge->addForeignKey('country_id', 'countries', 'id');
        $this->forge->addForeignKey('currency_id', 'currencies', 'id');
        $this->forge->createTable('events');

        //EventDetail Table
        $this->forge->addField(array_merge($eventDetailFields, $baseFields));
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('event_id', 'events', 'id');
        $this->forge->createTable('event_details');

        //EventAward Table
        $this->forge->addField(array_merge($eventAwardFields, $baseFields));
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('event_id', 'events', 'id');
        $this->forge->createTable('event_awards');

        //EventStage Table
        $this->forge->addField(array_merge($eventStageFields, $baseFields));
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('event_id', 'events', 'id');
        $this->forge->createTable('event_stages');

        //EventPlatform Table
        $this->forge->addField(array_merge($eventPlatformFields, $baseFields));
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('event_id', 'events', 'id');
        $this->forge->addForeignKey('platform_id', 'platforms', 'id');
        $this->forge->createTable('event_platforms');

        //EventImage Table
        $this->forge->addField(array_merge($eventImageFields, $baseFields));
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('event_id', 'events', 'id');
        $this->forge->createTable('event_images');
	}

	public function down()
	{
		$this->forge->dropTable('event_images', true);
        $this->forge->dropTable('event_platforms', true);
        $this->forge->dropTable('event_stages', true);
        $this->forge->dropTable('event_awards', true);
        $this->forge->dropTable('event_details', true);
        $this->forge->dropTable('events', true);
        $this->forge->dropTable('videogame_platforms', true);
        $this->forge->dropTable('videogames', true);
        $this->forge->dropTable('platforms', true);
        $this->forge->dropTable('event_types', true);
        $this->forge->dropTable('timezones', true);
        $this->forge->dropTable('difficulties', true);
        $this->forge->dropTable('currencies', true);
        $this->forge->dropTable('countries', true);
        $this->forge->dropTable('categories', true);
	}
}
