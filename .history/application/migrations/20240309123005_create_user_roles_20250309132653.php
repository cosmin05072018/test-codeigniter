<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_user_roles extends CI_Migration {
    public function up() {
        $this->dbforge->add_field([
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ],
            'role_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ],
        ]);
        $this->dbforge->add_key(['user_id', 'role_id'], TRUE);
        $this->dbforge->create_table('user_roles');
    }

    public function down() {
        $this->dbforge->drop_table('user_roles');
    }
}
