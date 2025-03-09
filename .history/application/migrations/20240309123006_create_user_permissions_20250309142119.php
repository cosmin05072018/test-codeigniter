<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_user_permissions extends CI_Migration {
    public function up() {
        // Crearea câmpurilor pentru tabelul user_permissions
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
            ],
        ]);

        // Adăugarea cheilor primare compuse
        $this->dbforge->add_key(['user_id', 'permission_id'], TRUE);

        // Crearea tabelului
        $this->dbforge->create_table('user_permissions');

        // Adăugarea cheii externe pentru user_id (legătura cu tabelul users)
        $this->db->query('ALTER TABLE `user_permissions` ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE CASCADE');

        // Adăugarea cheii externe pentru permission_id (legătura cu tabelul permissions)
        $this->db->query('ALTER TABLE `user_permissions` ADD CONSTRAINT `fk_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `permissions`(`id`) ON DELETE CASCADE ON UPDATE CASCADE');
    }

    public function down() {
        // Ștergerea tabelului user_permissions
        $this->dbforge->drop_table('user_permissions');
    }
}
