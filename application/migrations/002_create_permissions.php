<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Permissions extends CI_Migration {

    public function up() {
        // Crearea tabelei de permisiuni
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ]
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('permissions');
    }

    public function down() {
        // Ștergerea tabelei de permisiuni
        $this->dbforge->drop_table('permissions');
    }
}
