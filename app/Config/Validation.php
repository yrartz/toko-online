<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// rules
	public $register = [
	    'username' => 'min_length[5]|is_unique[user.nama]',
	    'password' => 'min_length[8]'
	    ];
	    
	public $register_errors = [
	    'username' => [
	        'min_length' => '{field} harus terdiri dari minimal 5 huruf',
	        'is_unique' => '{field} ini sudah dipakai'
	        ],
	    'password' => [
	        'min_length' => '{field} harus terdiri dari minimal 8 karakter'
	        ]
	    ];
	    
	    
	//--------------------------------------------------------------------
}
