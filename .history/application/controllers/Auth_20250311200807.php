<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('User_model');
		$this->load->library('session');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function store()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('register');
		}

		$email = $this->input->post('email');

		if ($this->User_model->get_user_by_email($email)) {
			$this->session->set_flashdata('error', 'This email is already registered.');
			redirect('register');
		}

		$data = [
			'name' => $this->input->post('name'),
			'email' => $email,
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		];

		if ($this->User_model->create_user($data)) {
			$this->session->set_flashdata('success', 'Account created successfully. You can now log in.');
			redirect('login');
		} else {
			$this->session->set_flashdata('error', 'Something went wrong. Please try again.');
			redirect('register');
		}
	}

	public function login()
	{
		$this->load->view('login');
	}
}
