<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		if (!$this->session->userdata('is_logged_in')) {
			redirect(base_url());
		}
	}
	public function index()
	{
		$this->load->view('components/header');
		$this->load->view('components/navbar');
		$this->load->view('dashboard');
		$this->load->view('components/footer');
	}

	public function viewUsers()
	{
		// Preia utilizatorii din tabelul 'users'
		$query = $this->db->select('id, username, role_id')
			->get('users');
		$data['users'] = $query->result();

		// Preia ID-ul utilizatorului autentificat din sesiune
		$data['logged_in_user_id'] = $this->session->userdata('user_id'); // presupunând că ai setat user_id în sesiune

		// Încarcă vizualizările
		$this->load->view('components/header');
		$this->load->view('components/navbar');
		$this->load->view('users', $data);
		$this->load->view('components/footer');
	}
}
