<?php

class AuthMiddleware
{
    public function handle()
    {

        $CI = &get_instance();
        $user_data = $CI->session->userdata('logged_in');

        if (!$user_data) {
            redirect('login');
        }
    }
}
