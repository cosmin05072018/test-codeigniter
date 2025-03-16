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

        // Adăugarea constrângerilor de foreign key
        $this->db->query('
            ALTER TABLE user_permissions
            ADD CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
        ');
        $this->db->query('
            ALTER TABLE user_permissions
            ADD CONSTRAINT fk_permission_id FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE ON UPDATE CASCADE
        ');

        $this->dbforge->create_table('user_permissions');
    }

    public function down() {
        // Ștergerea tabelei pivot
        $this->db->query('
            ALTER TABLE user_permissions
            DROP FOREIGN KEY fk_user_id
        ');
        $this->db->query('
            ALTER TABLE user_permissions
            DROP FOREIGN KEY fk_permission_id
        ');

        $this->dbforge->drop_table('user_permissions');
    }
}
