<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

    public $signup = [
        'first_name' => 'required',
        'last_name' => 'required',
        'birthdate' => 'required',
        'gender_id' => 'required',
        'email' => 'required|valid_email|is_unique[users.email]',
        'confirm_email' => 'required|matches[email]',
        'password' => 'required|min_length[8]',
        'confirm_password' => 'required|matches[password]',
        'username' => 'required|is_unique[users.username]'
    ];

    public $team = [
        'name' => 'required',
        'manager_id' => 'required',
        'whatsapp_number' => 'required',
        'email' => 'required|valid_email|is_unique[teams.email]',
        'country_id' => 'required',
        'user_id' => 'required'
    ];

    public $team_update = [
        'name' => 'required',
        'manager_id' => 'required',
        'whatsapp_number' => 'required',
        'email' => 'required|valid_email',
        'country_id' => 'required',
        'user_id' => 'required'
    ];

    public $signup_errors = [
        'first_name' => [
            'required' => 'Escribe un nombre',
        ],
        'last_name' => [
            'required' => 'Escribe una apellido'
        ],
        'birthdate' => [
            'required'=> 'Escribe una fecha de nacimiento'
        ],
        'gender_id' => [
            'required' => 'Elige un género'
        ],
        'email' => [
            'is_unique' => 'Ya existe una cuenta con este correo',
        ],
        'username' => [
            'is_unique' => 'Ya existe una cuenta con este nombre de usuario',
        ],
        'confirm_email' => [
            'matches' => 'Los correos no coinciden',
        ],
        'password' => [
            'min_length' => 'La contraseña debería tener mínimo 8 caracteres',
        ],
        'confirm_password' => [
            'matches' => 'Las constraseñas no coinciden',
        ]
    ];
    // Event Form Rules
    public $event = [
        'name' => 'required',
        'event_type' => 'required',
        'category' => 'required',
        'videogame' => 'required',
        'platform' => 'required',
        'date' => 'required',
        'time' => 'required',
        'timezone' => 'required',
        'max_participants' => 'required',
        'min_participants' => 'required',
        'price' => 'required',
        'currency' => 'required'
    ];

    public $event_errors = [
        'event_type' => [
            'required' => 'Elige un tipo de evento',
        ],
        'category' => [
            'required' => 'Elige una categoria',
        ],
        'videogame' => [
            'required' => 'Elige un videojuego de la lista',
        ],
        'platform' => [
            'required' => 'Elige por lo menos una plataforma',
        ],
        'timezone' => [
            'required' => 'Elige una zona horaria de la lista'
        ],
        'currency' => [
            'required' => 'Elige una moneda para el precio',
        ]
    ];

    public $team_errors = [
        'name' => [
            'required' => 'Escribe un nombre para tu equipo',
        ],
        'manager_id' => [
            'required' => 'Elige un manager para tu equipo'
        ],
        'whatsapp_number' => [
            'required' => 'Escribe un número'
        ],
        'email' => [
            'required' => 'Escribe un correo',
            'valid_email' => 'Escribe un correo valido',
            'is_unique' => 'Este correo ya existe',
        ],
        'country_id' => [
            'required' => 'Elige un país para tu equipo'
        ],
        'user_id' => [
            'required' => 'Agrega miembros a tu equipo'
        ]
    ];
}
