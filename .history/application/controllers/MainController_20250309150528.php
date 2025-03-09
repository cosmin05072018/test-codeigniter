<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MainController extends CI_Controller
{

	public function index()
	{
		$this->load->helper('url');

		$data['title'] = 'Pagina principală';
		$data['message'] = 'Bine ai venit pe pagina principală!';


		$this->load->view('layout', $data);
	}
}
