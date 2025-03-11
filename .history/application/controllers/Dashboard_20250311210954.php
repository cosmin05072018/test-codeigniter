<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

        $this->load->helper('url');
		$this->load->library('session');
    }

    public function index()
    {
        $data['content_view'] = 'home';

        $this->load->view('layout', $data);
    }
}
