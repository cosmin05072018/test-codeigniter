<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_products_table extends CI_Migration {

    public function up()
    {
        // Definirea structurii tabelului `products`
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => TRUE,
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
                'null' => TRUE,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ]
        ]);

        // Adaugă cheia primară
        $this->dbforge->add_key('id', TRUE);

        // Creează tabelul
        $this->dbforge->create_table('products');
    }

    public function down()
    {
        // Șterge tabelul `products` în caz de rollback
        $this->dbforge->drop_table('products');
    }
}
