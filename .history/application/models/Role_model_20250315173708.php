<?php
class Role_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_roles()
	{
		return $this->db->get('roles')->result();
	}

	public function create_role($data)
	{
		return $this->db->insert('roles', $data);
	}

	public function delete_role($id)
	{
		return $this->db->delete('roles', ['id' => $id]);
	}
}
