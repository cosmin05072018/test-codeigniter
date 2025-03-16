<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('session');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->load->view('components/header');
		$this->load->view('auth');
		$this->load->view('components/footer');
	}

	public function createAccount()
	{

		// rules
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect(base_url());
			return;
		}

		// Hash password
		$hashed_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

		$data = [
			'username' => $this->input->post('username'),
			'password' => $hashed_password,
			'role_id' => 2 // default role for employees
		];

		if ($this->User_model->create_user($data)) {
			$this->session->set_flashdata('success', 'Account created successfully. You can now log in.');
			redirect(base_url());
		} else {
			$this->session->set_flashdata('error', 'Failed to create account. Please try again.');
			redirect(base_url());
		}
	}
}
