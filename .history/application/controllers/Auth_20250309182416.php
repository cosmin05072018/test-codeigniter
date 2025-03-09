<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Nu mai încerca să încarci dinamic biblioteci sau modele în constructor!
    }

    public function register() {
        $this->load->view('register');
    }

    public function store() {
        // Instanțiem biblioteca manual
        $this->load->library('form_validation');

        // Verifică dacă biblioteca a fost încărcată corect
        if (!isset($this->form_validation)) {
            show_error('Biblioteca de validare a formularelor nu a putut fi încărcată corect.');
        }

        $this->load->model('User_model');

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

            // Folosim modelul pentru a crea utilizatorul
            $this->User_model->create_user($data);
            $this->load->view('login');
        }
    }

    public function login() {
        // $this->load->view('login');
    }
}

