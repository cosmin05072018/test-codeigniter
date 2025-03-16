<?php

class Permission_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_permissions() {
        return $this->db->get('permissions')->result();
    }

    public function create_permission($data) {
        return $this->db->insert('permissions', $data);
    }

    public function delete_permission($id) {
        return $this->db->delete('permissions', ['id' => $id]);
    }
}
