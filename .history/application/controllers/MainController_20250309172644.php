<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MainController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// Încarcă helperul url
		$this->load->helper('url');
	}
	public function index()
	{

		$data['title'] = 'Pagina principală';
		$data['message'] = 'Bine ai venit pe pagina principală!';
		$data['content_view']= 'login';

		$this->load->view('layout', $data);
	}

	public function register(){
		$data['content_view']= 'register';

		$this->load->view('layout', $data);
	}
}
