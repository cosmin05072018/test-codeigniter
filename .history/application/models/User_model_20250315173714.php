<?php

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_user($id) {
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    public function create_user($data) {
        return $this->db->insert('users', $data);
    }

    public function update_user($id, $data) {
        return $this->db->where('id', $id)->update('users', $data);
    }

    public function delete_user($id) {
        return $this->db->delete('users', ['id' => $id]);
    }

    public function user_has_permission($user_id, $permission_name) {
        $this->db->select('permissions.name');
        $this->db->from('users');
        $this->db->join('roles', 'users.role_id = roles.id');
        $this->db->join('role_permissions', 'roles.id = role_permissions.role_id');
        $this->db->join('permissions', 'role_permissions.permission_id = permissions.id');
        $this->db->where('users.id', $user_id);
        $this->db->where('permissions.name', $permission_name);
        return $this->db->get()->num_rows() > 0;
    }
}
