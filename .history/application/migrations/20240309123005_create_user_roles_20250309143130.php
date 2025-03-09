<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_user_roles extends CI_Migration
{
	public function up()
	{
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

		$this->db->query('ALTER TABLE `user_roles` ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE CASCADE');

		$this->db->query('ALTER TABLE `user_roles` ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles`(`id`) ON DELETE CASCADE ON UPDATE CASCADE');
	}

	public function down()
	{
		$this->dbforge->drop_table('user_roles');
	}
}
