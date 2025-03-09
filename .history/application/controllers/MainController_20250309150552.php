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


		$this->load->view('layout', $data);
	}
}
