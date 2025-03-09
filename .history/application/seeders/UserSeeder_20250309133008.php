<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserSeeder {

    protected $CI;

    public function __construct()
    {
        // Obținem instanța principală a CodeIgniter
        $this->CI =& get_instance();
        $this->CI->load->database(); // Încarcă baza de date
    }

    public function run()
    {
        // Adaugă un utilizator
        $data = array(
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'Test1!',
            'created_at' => date('Y-m-d H:i:s')
        );

        // Inserarea în tabelul "users"
        $this->CI->db->insert('users', $data);
        echo 'User added successfully!';
    }
}
