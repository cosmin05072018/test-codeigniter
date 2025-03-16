<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthHook {

    public function __construct()
    {
        // Încarcă sesiunea
        $this->CI =& get_instance();
        $this->CI->load->library('session');
    }

    public function check_logged_in()
    {
        // Verifică dacă sesiunea 'is_logged_in' este setată și dacă este true
        if (!$this->CI->session->userdata('is_logged_in')) {
            // Dacă nu este setată, redirecționează utilizatorul către pagina de login
            redirect('login');
        }
    }
}
