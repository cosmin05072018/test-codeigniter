<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Crează o permisiune
    public function create_permission($data)
    {
        return $this->db->insert('permissions', $data);
    }

    // Obține o permisiune după ID
    public function get_permission_by_id($id)
    {
        $query = $this->db->get_where('permissions', ['id' => $id]);
        return $query->row_array(); // Returnează rezultatul ca un array
    }

    // Obține toate permisiunile
    public function get_all_permissions()
    {
        $query = $this->db->get('permissions');
        return $query->result_array(); // Returnează toate permisiunile ca un array
    }

    // Actualizează o permisiune
    public function update_permission($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('permissions', $data);
    }

    // Șterge o permisiune
    public function delete_permission($id)
    {
        return $this->db->delete('permissions', ['id' => $id]);
    }
}
