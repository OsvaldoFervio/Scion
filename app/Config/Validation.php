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
}
