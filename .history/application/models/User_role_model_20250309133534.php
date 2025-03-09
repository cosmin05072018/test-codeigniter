<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_role_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Atribuie un rol unui utilizator
    public function assign_role_to_user($user_id, $role_id)
    {
        $data = [
            'user_id' => $user_id,
            'role_id' => $role_id
        ];

        return $this->db->insert('user_roles', $data);
    }

    // Obține rolurile pentru un utilizator
    public function get_roles_by_user($user_id)
    {
        $this->db->select('roles.*');
        $this->db->from('user_roles');
        $this->db->join('roles', 'roles.id = user_roles.role_id');
        $this->db->where('user_roles.user_id', $user_id);

        $query = $this->db->get();
        return $query->result_array(); // Returnează rolurile asociate utilizatorului
    }

    // Obține utilizatorii care au un rol specific
    public function get_users_by_role($role_id)
    {
        $this->db->select('users.*');
        $this->db->from('user_roles');
        $this->db->join('users', 'users.id = user_roles.user_id');
        $this->db->where('user_roles.role_id', $role_id);

        $query = $this->db->get();
        return $query->result_array(); // Returnează utilizatorii care au rolul respectiv
    }

    // Șterge un rol de la un utilizator
    public function remove_role_from_user($user_id, $role_id)
    {
        return $this->db->delete('user_roles', [
            'user_id' => $user_id,
            'role_id' => $role_id
        ]);
    }

    // Verifică dacă un utilizator are un rol specific
    public function has_role($user_id, $role_id)
    {
        $this->db->from('user_roles');
        $this->db->where('user_id', $user_id);
        $this->db->where('role_id', $role_id);

        return $this->db->count_all_results() > 0; // Returnează true dacă există rolul pentru utilizator
    }
}
