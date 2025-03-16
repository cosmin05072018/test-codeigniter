<?php

class Permission_model extends CI_Model
{
    protected $table = 'permissions';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_permissions()
    {
        return $this->db->get($this->table)->result();
    }

    public function get_permission($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

	public function assign_permission_to_user($user_id, $permission_id)
	{
		// Verificăm dacă permisiunea este deja setată pentru user
		$exists = $this->db->get_where('user_permissions', [
			'user_id' => $user_id,
			'permission_id' => $permission_id
		])->num_rows();

		if ($exists == 0) {
			// Adăugăm permisiunea doar dacă nu există deja
			return $this->db->insert('user_permissions', [
				'user_id' => $user_id,
				'permission_id' => $permission_id
			]);
		}
		return false; // Dacă există deja, nu inserăm din nou
	}


    public function update_permission($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete_permission($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    public function get_users_with_permission($permission_id)
    {
        $this->db->select('users.*');
        $this->db->from('users');
        $this->db->join('user_permissions', 'users.id = user_permissions.user_id');
        $this->db->where('user_permissions.permission_id', $permission_id);
        return $this->db->get()->result();
    }
}
