<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('AuthModel');
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$data['res'] = $this->AuthModel->checkAuth($email);

		if (!$data['res']) {

      $this->session->set_flashdata('error', 'Email Anda Salah!');
			redirect(base_url() . 'login');

		}else{
			if (password_verify($password, $data['res'][0]['password'])) {
				$data = $data['res'][0];
	
				$this->session->set_userdata('login_data_admin_hr_user', $data);
				$this->session->set_userdata('isLoggedIn_admin_hr_user', true);
				$this->session->set_flashdata('success', 'Login Berhasil!');
				redirect(base_url());
			} else {
				$this->session->set_flashdata('error', 'Password Anda Salah!');
				redirect(base_url());
			}
		}
	}

	public function signup(){
		$data = array(
			'nama' => $this->input->post('nama'),
			'role' => 'pengguna',
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		);

		$this->AuthModel->add($data);
		$this->session->set_userdata('login_data_admin_hr_user', $data);
		$this->session->set_userdata('isLoggedIn_admin_hr_user', true);
		$this->session->set_flashdata('success', 'Signup Berhasil!');
    redirect(base_url());
	}

	public function logout()
	{
			session_destroy();
			redirect(base_url());
	}
}
