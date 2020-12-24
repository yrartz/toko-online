<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
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
                
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                ],
                
            'stok' => [
                'type' => 'INT',
                'constraint' => 11
                ],
                
            'harga' => [
                'type' => 'INT',
                'constraint' => 11
                ],
                
            'deskripsi' => [
                'type' => 'TEXT'
                ],
                
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255
                ],
            
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255
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
                $this->forge->createTable('produk');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('produk');
	}
}
