<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function create_user($data)
	{
		return $this->db->insert('users', $data);
	}


	public function get_user_by_id($id)
	{
		$query = $this->db->get_where('users', ['id' => $id]);
		return $query->row_array();
	}


	public function get_all_users()
	{
		$query = $this->db->get('users');
		return $query->result_array();
	}

	public function update_user($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('users', $data);
	}

	public function delete_user($id)
	{
		return $this->db->delete('users', ['id' => $id]);
	}

	public function get_permissions($user_id)
	{
		$this->db->select('p.*');
		$this->db->from('user_permissions up');
		$this->db->join('permissions p', 'p.id = up.permission_id');
		$this->db->where('up.user_id', $user_id);
		return $this->db->get()->result();
	}

	public function get_roles($user_id) {
        $this->db->select('r.*');
        $this->db->from('user_roles ur');
        $this->db->join('roles r', 'r.id = ur.role_id');
        $this->db->where('ur.user_id', $user_id);
        return $this->db->get()->result();
    }
}
