<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        // Setăm datele ce vor fi transmise către view
        $data['title'] = 'Pagina principală';
        $data['message'] = 'Bine ai venit pe pagina principală!';
        $data['view'] = 'home'; // Aici definim view-ul ce va fi încărcat în layout

        // Încărcăm layout-ul și îi transmitem datele
        $this->load->view('layout', $data);
    }
}
