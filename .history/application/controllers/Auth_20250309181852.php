<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Încărcarea modelului
        $this->load->model('User_model');
        // Assignarea modelului la proprietatea controller-ului
        $this->User_model = $this->User_model;
    }

    public function register() {
        $this->load->view('register');
    }

    public function store() {
        $this->load->library('form_validation');

        // Setăm regulile de validare
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $this->User_model->create_user($data);
            $this->load->view('login');
        }
    }

    public function login() {
        // $this->load->view('login');
    }
}
