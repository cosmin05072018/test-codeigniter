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
		$query = $this->db->get('users');
		$data['users'] = $query->result();

		var_dump($data);
		$this->load->view('components/header');
		$this->load->view('components/navbar');
		$this->load->view('user', $data);
		$this->load->view('components/footer');
	}
}
