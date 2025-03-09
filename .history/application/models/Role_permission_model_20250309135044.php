<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_permission_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Adaugă o permisiune pentru un rol
    public function assign_permission_to_role($role_id, $permission_id)
    {
        $data = [
            'role_id' => $role_id,
            'permission_id' => $permission_id
        ];

        return $this->db->insert('role_permissions', $data);
    }

    // Obține permisiunile pentru un rol
    public function get_permissions_by_role($role_id)
    {
        $this->db->select('permissions.*');
        $this->db->from('role_permissions');
        $this->db->join('permissions', 'permissions.id = role_permissions.permission_id');
        $this->db->where('role_permissions.role_id', $role_id);

        $query = $this->db->get();
        return $query->result_array(); // Returnează permisiunile asociate rolului
    }

    // Obține rolurile pentru o permisiune
    public function get_roles_by_permission($permission_id)
    {
        $this->db->select('roles.*');
        $this->db->from('role_permissions');
        $this->db->join('roles', 'roles.id = role_permissions.role_id');
        $this->db->where('role_permissions.permission_id', $permission_id);

        $query = $this->db->get();
        return $query->result_array(); // Returnează rolurile asociate permisiunii
    }

    // Șterge o permisiune pentru un rol
    public function remove_permission_from_role($role_id, $permission_id)
    {
        return $this->db->delete('role_permissions', [
            'role_id' => $role_id,
            'permission_id' => $permission_id
        ]);
    }

    // Verifică dacă un rol are o permisiune specifică
    public function has_permission($role_id, $permission_id)
    {
        $this->db->from('role_permissions');
        $this->db->where('role_id', $role_id);
        $this->db->where('permission_id', $permission_id);

        return $this->db->count_all_results() > 0; // Returnează true dacă există permisiunea
    }

	public function permissions() {
        $this->load->model('Permission_model');
        return $this->db->select('permissions.*')
                        ->from('role_permissions')
                        ->join('permissions', 'permissions.id = role_permissions.permission_id')
                        ->where('role_permissions.role_id', $this->id)
                        ->get()
                        ->result();
    }
}
