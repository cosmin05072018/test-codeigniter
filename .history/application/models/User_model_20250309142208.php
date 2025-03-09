<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Adaugă un utilizator
    public function create_user($data)
    {
        return $this->db->insert('users', $data);
    }

    // Obține un utilizator după ID
    public function get_user_by_id($id)
    {
        $query = $this->db->get_where('users', ['id' => $id]);
        return $query->row_array(); // Întoarce rezultatul ca un array
    }

    // Obține toți utilizatorii
    public function get_all_users()
    {
        $query = $this->db->get('users');
        return $query->result_array(); // Întoarce toți utilizatorii ca un array
    }

    // Actualizează un utilizator
    public function update_user($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    // Șterge un utilizator
    public function delete_user($id)
    {
        return $this->db->delete('users', ['id' => $id]);
    }

	public function get_permissions($user_id) {
        $this->db->select('p.*');
        $this->db->from('user_permissions up');
        $this->db->join('permissions p', 'p.id = up.permission_id');
        $this->db->where('up.user_id', $user_id);
        return $this->db->get()->result();
    }
}
