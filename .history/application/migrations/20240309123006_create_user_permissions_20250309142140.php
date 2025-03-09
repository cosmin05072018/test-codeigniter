<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_user_permissions extends CI_Migration
{
	public function up()
	{

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


		$this->dbforge->add_key(['user_id', 'permission_id'], TRUE);

		$this->dbforge->create_table('user_permissions');

		$this->db->query('ALTER TABLE `user_permissions` ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE CASCADE');

		$this->db->query('ALTER TABLE `user_permissions` ADD CONSTRAINT `fk_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `permissions`(`id`) ON DELETE CASCADE ON UPDATE CASCADE');
	}

	public function down()
	{
		$this->dbforge->drop_table('user_permissions');
	}
}
