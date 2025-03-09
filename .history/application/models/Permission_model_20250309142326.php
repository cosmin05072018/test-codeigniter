<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permission_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}


	public function create_permission($data)
	{
		return $this->db->insert('permissions', $data);
	}


	public function get_permission_by_id($id)
	{
		$query = $this->db->get_where('permissions', ['id' => $id]);
		return $query->row_array();
	}


	public function get_all_permissions()
	{
		$query = $this->db->get('permissions');
		return $query->result_array();
	}

	public function get_users($permission_id)
	{
		$this->db->select('u.*');
		$this->db->from('user_permissions up');
		$this->db->join('users u', 'u.id = up.user_id');
		$this->db->where('up.permission_id', $permission_id);
		return $this->db->get()->result();
	}

	public function update_permission($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('permissions', $data);
	}


	public function delete_permission($id)
	{
		return $this->db->delete('permissions', ['id' => $id]);
	}
}
