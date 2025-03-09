<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MainController extends CI_Controller
{
    private $db;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->db = $this->load->database(); // Asigură-te că variabila este inițializată corect
    }

    public function index()
    {
        $data['title'] = 'Pagina principală';
        $data['message'] = 'Bine ai venit pe pagina principală!';
        $data['content_view'] = 'login';

        $this->load->view('layout', $data);
    }

    public function register()
    {
        $data['content_view'] = 'register';
        $this->load->view('layout', $data);
    }
}
