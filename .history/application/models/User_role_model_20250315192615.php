<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_role_model extends CI_Model {

    private $table = 'user_roles';

    public function __construct() {
        parent::__construct();
    }

    // Adăugăm un rol pentru un utilizator
    public function add_role_to_user($user_id, $role_id) {
        $data = [
            'user_id' => $user_id,
            'role_id' => $role_id
        ];
        return $this->db->insert($this->table, $data);
    }

    // Ștergem un rol pentru un utilizator
    public function remove_role_from_user($user_id, $role_id) {
        return $this->db->delete($this->table, ['user_id' => $user_id, 'role_id' => $role_id]);
    }

    // Obținem rolurile unui utilizator
    public function get_roles_for_user($user_id) {
        $this->db->select('r.*');
        $this->db->from('user_roles ur');
        $this->db->join('roles r', 'r.id = ur.role_id');
        $this->db->where('ur.user_id', $user_id);
        return $this->db->get()->result();
    }

    // Obținem utilizatorii care au un anumit rol
    public function get_users_for_role($role_id) {
        $this->db->select('u.*');
        $this->db->from('user_roles ur');
        $this->db->join('users u', 'u.id = ur.user_id');
        $this->db->where('ur.role_id', $role_id);
        return $this->db->get()->result();
    }
}
