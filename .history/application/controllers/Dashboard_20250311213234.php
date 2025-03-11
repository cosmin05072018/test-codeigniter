<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('logged_in')) {
			redirect('index.php/login');
		}

		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index()
	{
		$data['content_view'] = 'home';

		$this->load->view('layout', $data);
	}

	public function viewUsers()
	{
		$data['users'] = $this->db->get('users')->result();
		$data['content_view'] = 'view-users';

		$this->load->view('layout', $data);
	}

	public function viewProducts()
	{

		$data['content_view'] = 'view-products';

		$this->load->view('layout', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();

		redirect('index.php/login');
	}
}
