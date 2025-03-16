<?php
class RolePermission_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function assign_permission($role_id, $permission_id)
	{
		return $this->db->insert('role_permissions', [
			'role_id' => $role_id,
			'permission_id' => $permission_id
		]);
	}

	public function remove_permission($role_id, $permission_id)
	{
		return $this->db->delete('role_permissions', [
			'role_id' => $role_id,
			'permission_id' => $permission_id
		]);
	}

	public function get_permissions_for_role($role_id)
	{
		$this->db->select('permissions.name');
		$this->db->from('role_permissions');
		$this->db->join('permissions', 'role_permissions.permission_id = permissions.id');
		$this->db->where('role_permissions.role_id', $role_id);
		return $this->db->get()->result();
	}
}
