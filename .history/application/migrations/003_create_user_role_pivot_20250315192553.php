<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_User_Role_Pivot extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'role_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
        ]);

        // Definirea cheilor primare (composite key)
        $this->dbforge->add_key(['user_id', 'role_id'], TRUE);

        // Crearea tabelului pivot
        $this->dbforge->create_table('user_roles');
    }

    public function down() {
        $this->dbforge->drop_table('user_roles');
    }
}
