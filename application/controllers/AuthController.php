<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('UserModel');
	}

	public function index()
	{
    $this->load->view('v_login');
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$data['res'] = $this->UserModel->checkAuth($email);

		if (!$data['res']) {

      $this->session->set_flashdata('error', 'Email Anda Salah!');
			redirect(base_url() . 'login');

		}else{
			if (password_verify($password, $data['res'][0]['password'])) {
				$dataAdmin = $data['res'][0];
	
				$this->session->set_userdata('login_data_admin_hr', $dataAdmin);
				$this->session->set_userdata('isLoggedIn_admin_hr', true);
				redirect(base_url('dashboard'));
			} else {
				$this->session->set_flashdata('error', 'Password Anda Salah!');
				redirect(base_url() . 'login');
			}
		}
	}

	public function logout()
	{
			session_destroy();
			redirect(base_url() . 'login');
	}
}
