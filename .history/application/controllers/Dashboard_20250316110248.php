<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('Permission_model');
		if (!$this->session->userdata('is_logged_in')) {
			redirect(base_url());
		}
	}
	public function index()
	{
		$this->load->view('components/header');
		$this->load->view('components/navbar');
		$this->load->view('dashboard');
		$this->load->view('components/footer');
	}

	public function viewUsers()
	{

		$logged_in_user_id = $this->session->userdata('user_id');

		$this->db->where('id', $logged_in_user_id);
		$query = $this->db->get('users');
		$logged_in_user = $query->row();
		$this->db->where('id !=', $logged_in_user_id);
		$query = $this->db->get('users');

		$data['users'] = $query->result();
		$data['logged_in_user'] = $logged_in_user;
		$data['permissions'] = $this->Permission_model->get_all_permissions();

		$this->load->view('components/header');
		$this->load->view('components/navbar');
		$this->load->view('users', $data);
		$this->load->view('components/footer');
	}

	public function assign_permission()
	{
		$user_id = $this->input->post('user_id'); // Preluăm user_id
		$permissions = $this->input->post('permissions'); // Preluăm permisiunile selectate

		$this->load->model('Permission_model');

		if (!empty($permissions)) {
			// Ștergem permisiunile anterioare ale utilizatorului pentru a evita duplicate
			$this->Permission_model->remove_user_permissions($user_id);

			// Adăugăm noile permisiuni
			foreach ($permissions as $permission_name) {
				// Căutăm id-ul permisiunii pe baza numelui
				$permission = $this->Permission_model->get_permission_by_name($permission_name);

				if ($permission) {
					$this->Permission_model->assign_permission_to_user($user_id, $permission->id);
				}
			}

			$this->session->set_flashdata('success', 'Permissions updated successfully.');
		} else {
			$this->session->set_flashdata('error', 'No permissions selected.');
		}

		redirect(base_url('index.php/dashboard-view-users')); // Redirecționează la pagina dashboard
	}


}
