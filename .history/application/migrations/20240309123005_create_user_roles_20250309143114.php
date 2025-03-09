<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_user_roles extends CI_Migration {
    public function up() {
        // Crearea câmpurilor pentru tabelul user_roles
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

        // Adăugarea cheilor primare compuse
        $this->dbforge->add_key(['user_id', 'role_id'], TRUE);

        // Crearea tabelului user_roles
        $this->dbforge->create_table('user_roles');

        // Adăugarea cheii externe pentru user_id (legătura cu tabelul users)
        $this->db->query('ALTER TABLE `user_roles` ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE CASCADE');

        // Adăugarea cheii externe pentru role_id (legătura cu tabelul roles)
        $this->db->query('ALTER TABLE `user_roles` ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles`(`id`) ON DELETE CASCADE ON UPDATE CASCADE');
    }

    public function down() {
        // Ștergerea tabelului user_roles
        $this->dbforge->drop_table('user_roles');
    }
}
