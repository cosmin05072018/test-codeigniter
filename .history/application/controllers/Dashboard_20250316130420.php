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
		$this->load->model('Product_model');

		$this->load->library('form_validation');

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
		$user_id = $this->input->post('user_id');
		$permissions = $this->input->post('permissions');

		$this->load->model('Permission_model');
		$this->Permission_model->remove_user_permissions($user_id);

		if (!empty($permissions)) {
			foreach ($permissions as $perm) {
				if ($permissions) {
					$this->Permission_model->assign_permission_to_user($user_id, $perm);
				}
			}
			$this->session->set_flashdata('success', 'Permissions updated successfully.');
		} else {
			$this->session->set_flashdata('remove', 'Permissions removed.');
		}

		redirect(base_url('index.php/dashboard-view-users')); // Redirecționează la pagina dashboard
	}

	public function viewProducts()
	{

		$this->load->view('components/header');
		$this->load->view('components/navbar');
		$this->load->view('products');
		$this->load->view('components/footer');
	}

	public function addProduct()
	{
		$this->form_validation->set_rules('name', 'Product Name', 'required', array(
			'required' => 'The %s field is required.'
		));
		$this->form_validation->set_rules('description', 'Product Description', 'required', array(
			'required' => 'The %s field is required.'
		));
		$this->form_validation->set_rules('price', 'Product Price', 'required|numeric', array(
			'required' => 'The %s field is required.',
			'numeric'  => 'The %s must be a valid number.'
		));


		if ($this->form_validation->run() == FALSE) {
			redirect(base_url('index.php/dashboard-view-products'));
		} else {
			$name = $this->input->post('name');
			$description = $this->input->post('description');
			$price = $this->input->post('price');


			$result = $this->Product_model->add_product($name, $description, $price);

			if ($result) {
				$this->session->set_flashdata('success', 'The product was successfully added!');
				redirect(base_url('index.php/dashboard-view-products'));
			} else {
				$this->session->set_flashdata('error', 'An error occurred while adding the product.');
				redirect(base_url('index.php/dashboard-view-products'));
			}
		}
	}
}
