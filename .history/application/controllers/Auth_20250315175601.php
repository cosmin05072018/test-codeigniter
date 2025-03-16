<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('session');
		$this->load->library('input');
	}
	public function index()
	{
		$this->load->view('components/header');
		$this->load->view('auth');
		$this->load->view('components/footer');
	}

	public function createAccount()
	{
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);

		$existing_user = $this->db->get_where('users', ['username' => $username])->row();
		if ($existing_user) {
			$this->session->set_flashdata('error', 'Username already exists.');
			redirect(base_url('index.php/register'));
			return;
		}

		// Hash password
		$hashed_password = password_hash($password, PASSWORD_BCRYPT);

		$data = [
			'username' => $username,
			'password' => $hashed_password,
			'role_id' => 2 // Setează un rol implicit (ex: utilizator normal)
		];

		if ($this->User_model->create_user($data)) {
			$this->session->set_flashdata('success', 'Account created successfully. You can now log in.');
			redirect(base_url('index.php/login'));
		} else {
			$this->session->set_flashdata('error', 'Failed to create account. Please try again.');
			redirect(base_url('index.php/register'));
		}
	}
}
