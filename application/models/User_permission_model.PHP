<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_permission_model extends CI_Model {

    // Define table name
    protected $table = 'user_permissions';

    public function __construct() {
        parent::__construct();
    }

    /**
     * Get all permissions for a specific user
     *
     * @param int $user_id
     * @return array
     */
    public function get_permissions_by_user($user_id) {
        $this->db->select('permissions.id, permissions.name');
        $this->db->from($this->table);
        $this->db->join('permissions', 'permissions.id = user_permissions.permission_id');
        $this->db->where('user_permissions.user_id', $user_id);
        $query = $this->db->get();

        return $query->result_array();
    }

    /**
     * Get all users with a specific permission
     *
     * @param int $permission_id
     * @return array
     */
    public function get_users_by_permission($permission_id) {
        $this->db->select('users.id, users.username');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = user_permissions.user_id');
        $this->db->where('user_permissions.permission_id', $permission_id);
        $query = $this->db->get();

        return $query->result_array();
    }

    /**
     * Assign a permission to a user
     *
     * @param int $user_id
     * @param int $permission_id
     * @return bool
     */
    public function assign_permission($user_id, $permission_id) {
        $data = [
            'user_id' => $user_id,
            'permission_id' => $permission_id
        ];
        return $this->db->insert($this->table, $data);
    }

    /**
     * Remove a permission from a user
     *
     * @param int $user_id
     * @param int $permission_id
     * @return bool
     */
    public function remove_permission($user_id, $permission_id) {
        $this->db->where('user_id', $user_id);
        $this->db->where('permission_id', $permission_id);
        return $this->db->delete($this->table);
    }

    /**
     * Check if a user has a specific permission
     *
     * @param int $user_id
     * @param int $permission_id
     * @return bool
     */
    public function has_permission($user_id, $permission_id) {
        $this->db->from($this->table);
        $this->db->where('user_id', $user_id);
        $this->db->where('permission_id', $permission_id);
        return $this->db->count_all_results() > 0;
    }
}
