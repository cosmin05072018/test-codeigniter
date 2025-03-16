<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if (!$this->session->userdata('is_logged_in')) {
            redirect(base_url('index.php/dashboard'));
        }
	}
	public function index()
	{
		die('dashboard');
	}
}
