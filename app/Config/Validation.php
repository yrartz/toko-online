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
	    'username' => 'min_length[5]|is_unique[user.username]',
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
	    
	public $tambah = [
	    'nama' => 'min_length[3]',
	    'deskripsi' => 'min_length[50]',
	    'gambar' => 'max_size[gambar,1048]|mime_in[gambar,image/png, image/jpg,image/jpeg]|is_image[gambar]'
	    ];
	    
	public $tambah_errors = [
	    'nama' => [
	        'min_length' => '{field} harus terdiri dari minimal 3 karakter'
	        ],
	    'deskripsi' => [
	        'min_length' => '{field} harus terdiri dari minimal 50 karakter'
	        ],
	    'gambar' => [
	        'max_size' => 'Ukuran gambar harus dibawah 1MB',
	        'mime_in' => 'Ekstensi file harus JPG, JPEG, atau PNG',
	        'is_image' => 'Yang anda upload bukan gambar'
	        ]
	    ];
	    
	    public $edit = [
	    'nama' => 'min_length[3]',
	    'deskripsi' => 'min_length[50]',
	    'gambar' => 'max_size[gambar,1048]|mime_in[gambar,image/png, image/jpg,image/jpeg]|is_image[gambar]'
	    ];
	    
	public $edit_errors = [
	    'nama' => [
	        'min_length' => '{field} harus terdiri dari minimal 3 karakter'
	        ],
	    'deskripsi' => [
	        'min_length' => '{field} harus terdiri dari minimal 50 karakter'
	        ],
	    'gambar' => [
	        'max_size' => 'Ukuran gambar harus dibawah 1MB',
	        'mime_in' => 'Ekstensi file harus JPG, JPEG, atau PNG',
	        'is_image' => 'Yang anda upload bukan gambar'
	        ]
	    ];
	    
	    
	//--------------------------------------------------------------------
}
