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
		// Obține ID-ul utilizatorului conectat
		$logged_in_user_id = $this->session->userdata('user_id');

		// Adaugă condiția pentru a exclude utilizatorul curent
		$this->db->where('id !=', $logged_in_user_id);

		// Interoghează tabelul 'users'
		$query = $this->db->get('users');

		// Stochează rezultatul interogării în $data['users']
		$data['users'] = $query->result();

		// Încarcă vizualizările
		$this->load->view('components/header');
		$this->load->view('components/navbar');
		$this->load->view('users', $data);
		$this->load->view('components/footer');
	}

}
