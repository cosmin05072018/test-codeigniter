<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthHook {

    public function __construct()
    {
        // Încarcă sesiunea și router-ul
        $this->CI =& get_instance();
        $this->CI->load->library('session');
        $this->CI->load->library('router');
    }

    public function check_logged_in()
    {
        // Lista de rute protejate
        $protected_routes = array('dashboard', 'profile', 'settings');

        // Verifică dacă ruta curentă este protejată
        $current_route = $this->CI->router->fetch_class() . '/' . $this->CI->router->fetch_method();

        if (in_array($current_route, $protected_routes)) {
            // Dacă sesiunea 'is_logged_in' nu este setată, redirecționează utilizatorul la login
            if (!$this->CI->session->userdata('is_logged_in')) {
                redirect('login');
            }
        }
    }
}
