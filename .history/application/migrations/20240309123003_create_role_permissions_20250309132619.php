<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_role_permissions extends CI_Migration {
    public function up() {
        $this->dbforge->add_field([
            'role_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ],
            'permission_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ],
        ]);
        $this->dbforge->add_key(['role_id', 'permission_id'], TRUE);
        $this->dbforge->create_table('role_permissions');
    }

    public function down() {
        $this->dbforge->drop_table('role_permissions');
    }
}
