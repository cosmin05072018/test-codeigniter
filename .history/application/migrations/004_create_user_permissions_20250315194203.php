<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_User_Permissions extends CI_Migration {

    public function up() {
        // Crearea tabelei pivot user_permissions
        $this->dbforge->add_field([
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ],
            'permission_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ]
        ]);
        $this->dbforge->add_key(['user_id', 'permission_id']);
        $this->dbforge->create_table('user_permissions');
    }

    public function down() {
        // Ștergerea tabelei pivot
        $this->dbforge->drop_table('user_permissions');
    }
}
