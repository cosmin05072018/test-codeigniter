<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Crează un rol
    public function create_role($data)
    {
        return $this->db->insert('roles', $data);
    }

    // Obține un rol după ID
    public function get_role_by_id($id)
    {
        $query = $this->db->get_where('roles', ['id' => $id]);
        return $query->row_array(); // Returnează rezultatul ca un array
    }

    // Obține toate rolurile
    public function get_all_roles()
    {
        $query = $this->db->get('roles');
        return $query->result_array(); // Returnează toate rolurile ca un array
    }

    // Actualizează un rol
    public function update_role($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('roles', $data);
    }

	public function get_users($role_id) {
        $this->db->select('u.*');
        $this->db->from('user_roles ur');
        $this->db->join('users u', 'u.id = ur.user_id');
        $this->db->where('ur.role_id', $role_id);
        return $this->db->get()->result();
    }

    // Șterge un rol
    public function delete_role($id)
    {
        return $this->db->delete('roles', ['id' => $id]);
    }
}
