<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

		if ($this->session->userdata('logged_in')) {
			// Dacă utilizatorul este autentificat și încearcă să acceseze login sau register, îl redirecționăm la home
			if ($this->uri->segment(1) === '' || $this->uri->segment(1) === 'register') {
				redirect('index.php/home'); // Sau orice altă pagină dorită
			}
		} else {
			// Dacă nu este autentificat, îl redirecționăm la login
			if ($this->uri->segment(1) !== 'login' && $this->uri->segment(1) !== 'register') {
				redirect('login');
			}
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
