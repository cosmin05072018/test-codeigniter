<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthHook
{

	public function __construct()
	{
		$this->CI = &get_instance();
		$this->CI->load->library('session');
		$this->CI->load->library('router');
	}

	public function check_logged_in()
	{
		$protected_routes = array('dashboard');

		$current_route = $this->CI->router->fetch_class() . '/' . $this->CI->router->fetch_method();

		if (in_array($current_route, $protected_routes)) {
			if (!$this->CI->session->userdata('is_logged_in')) {
				redirect(base_url());
			}
		}
	}
}
