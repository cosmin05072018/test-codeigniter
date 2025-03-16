<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Users extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'role_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ]
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');

        // Adăugăm constrângerea de foreign key
        $this->db->query('
            ALTER TABLE users
            ADD CONSTRAINT fk_role_id
            FOREIGN KEY (role_id) REFERENCES roles(id)
            ON DELETE CASCADE
            ON UPDATE CASCADE
        ');
    }

    public function down() {
        // Eliminăm constrângerea de foreign key
        $this->db->query('
            ALTER TABLE users
            DROP FOREIGN KEY fk_role_id
        ');

        // Ștergem tabela users
        $this->dbforge->drop_table('users');
    }
}
