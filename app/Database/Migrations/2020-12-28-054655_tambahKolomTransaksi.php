<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahKolomTransaksi extends Migration
{
	public function up()
	{
		$fields = [
		    'alamat' => [
		        'type' => 'TEXT'
		        ],
		    'ongkir' => [
		        'type' => 'INT',
		        'constraint' => 11
		        ],
		    'status' => [
		        'type' => 'VARCHAR',
		        'constraint' => 255
		        ]
		    ];
		    
		    $this->forge->addColumn('transaksi', $fields);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('transaksi', ['alamat', 'ongkir', 'status']);
	}
}
