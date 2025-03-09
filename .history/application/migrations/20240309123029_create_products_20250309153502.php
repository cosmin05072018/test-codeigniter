<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        // Crearea tabelului products
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'stock_quantity' => [
                'type' => 'INT',
                'constraint' => '11',
                'default' => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        // Cheia primară
        $this->forge->addPrimaryKey('id');

        // Crearea tabelului
        $this->forge->createTable('products');
    }

    public function down()
    {
        // Șterge tabelul products în cazul în care migrarea este anulată
        $this->forge->dropTable('products');
    }
}
