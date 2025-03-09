<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_permission_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Atribuie o permisiune unui utilizator
    public function assign_permission_to_user($user_id, $permission_id)
    {
        $data = [
            'user_id' => $user_id,
            'permission_id' => $permission_id
        ];

        return $this->db->insert('user_permissions', $data);
    }

    // Obține permisiunile pentru un utilizator
    public function get_permissions_by_user($user_id)
    {
        $this->db->select('permissions.*');
        $this->db->from('user_permissions');
        $this->db->join('permissions', 'permissions.id = user_permissions.permission_id');
        $this->db->where('user_permissions.user_id', $user_id);

        $query = $this->db->get();
        return $query->result_array(); // Returnează permisiunile asociate utilizatorului
    }

    // Obține utilizatorii care au o permisiune specifică
    public function get_users_by_permission($permission_id)
    {
        $this->db->select('users.*');
        $this->db->from('user_permissions');
        $this->db->join('users', 'users.id = user_permissions.user_id');
        $this->db->where('user_permissions.permission_id', $permission_id);

        $query = $this->db->get();
        return $query->result_array(); // Returnează utilizatorii care au permisiunea respectivă
    }

    // Șterge o permisiune de la un utilizator
    public function remove_permission_from_user($user_id, $permission_id)
    {
        return $this->db->delete('user_permissions', [
            'user_id' => $user_id,
            'permission_id' => $permission_id
        ]);
    }

    // Verifică dacă un utilizator are o permisiune specifică
    public function has_permission($user_id, $permission_id)
    {
        $this->db->from('user_permissions');
        $this->db->where('user_id', $user_id);
        $this->db->where('permission_id', $permission_id);

        return $this->db->count_all_results() > 0; // Returnează true dacă există permisiunea pentru utilizator
    }
}
