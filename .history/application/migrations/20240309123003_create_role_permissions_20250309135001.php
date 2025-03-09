<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_role_permissions extends CI_Migration {
    public function up() {
        // Adăugăm câmpurile pentru role_id și permission_id
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

        // Adăugăm cheia primară pe combinația dintre role_id și permission_id
        $this->dbforge->add_key(['role_id', 'permission_id'], TRUE);

        // Creăm tabelul role_permissions
        $this->dbforge->create_table('role_permissions');

        // Adăugăm relațiile externe
        $this->db->query('
            ALTER TABLE role_permissions
            ADD CONSTRAINT fk_role
            FOREIGN KEY (role_id) REFERENCES roles(id)
            ON DELETE CASCADE
        ');

        $this->db->query('
            ALTER TABLE role_permissions
            ADD CONSTRAINT fk_permission
            FOREIGN KEY (permission_id) REFERENCES permissions(id)
            ON DELETE CASCADE
        ');
    }

    public function down() {
        // Ștergem relațiile externe
        $this->db->query('ALTER TABLE role_permissions DROP FOREIGN KEY fk_role');
        $this->db->query('ALTER TABLE role_permissions DROP FOREIGN KEY fk_permission');

        // Ștergem tabelul role_permissions
        $this->dbforge->drop_table('role_permissions');
    }
}
