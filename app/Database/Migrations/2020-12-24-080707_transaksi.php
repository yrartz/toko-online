<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
	public function up()
	{
			$this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
                ],
                
            'id_user' => [
                'type' =>'INT',
                'constraint' => 11,
                ],
                
            'id_produk' => [
                'type' => 'INT',
                'constraint' => 11
                ],
                
            'jumlah' => [
                'type' => 'INT',
                'constraint' => 11
                ],
                
            'total_harga' => [
                'type' => 'VARCHAR',
                'constraint' => 50
                ],
            
            'created_at' => [
                'type' => 'DATETIME',
                'null' => TRUE
                ],
                
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => TRUE
                ]
                
                ]);
                
                
                $this->forge->addKey('id', true);
                $this->forge->createTable('transaksi');
                $this->forge->addForeignKey('id_produk', 'produk', 'id');
                $this->forge->addForeignKey('id_user', 'user', 'id');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('transaksi');
	}
}
