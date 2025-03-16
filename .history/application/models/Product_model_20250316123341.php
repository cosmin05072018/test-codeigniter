<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Adăugarea unui produs
    public function add_product($name, $description, $price)
    {
        $data = array(
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('products', $data);
    }

    // Editarea unui produs
    public function edit_product($id, $name, $description, $price)
    {
        $data = array(
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    // Ștergerea unui produs
    public function delete_product($id)
    {
        return $this->db->delete('products', array('id' => $id));
    }

    // Obține toate produsele
    public function get_all_products()
    {
        $query = $this->db->get('products');
        return $query->result();
    }

    // Obține un produs după ID
    public function get_product($id)
    {
        $query = $this->db->get_where('products', array('id' => $id));
        return $query->row();
    }
}
