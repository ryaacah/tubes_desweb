<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {
	
  function __construct(){
		parent::__construct();		
		$this->session_status = $this->session->userdata('isLoggedIn_admin_hr');
		
		if (!$this->session_status) {
      $this->session->set_flashdata('error', 'Sesi anda telah habis!');
			return redirect(base_url() . 'login');
		}	
    
		$this->load->model('UserModel');
	}
	public function index(){
		$dataUser = $this->UserModel->getUser();

    
		$data['dataUser'] = $dataUser;
    $data['title'] = "Users Management";
    $data['menuLink'] = "users";

		$this->load->view('includes/header', $data);
		$this->load->view('v_user', $data);
		$this->load->view('includes/footer', $data);
	}

  public function add(){
		$data = array(
			'nama' => $this->input->post('nama'),
			'role' => $this->input->post('role'),
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		);

		$this->UserModel->add($data);
		$this->session->set_flashdata('success', 'User berhasil ditambahkan ke database!');
    redirect(base_url("users"));
  }

  public function delete($id){
    $this->UserModel->delete($id);
    $this->session->set_flashdata('success', 'User berhasil dihapus dari database!');
    redirect(base_url("users"));
  }

  
	public function edit($id){
		$newPassword = '';

		$res = $this->UserModel->getUserById($id);
		if ($password == null) {
			$newPassword = $res[0]['password'];
		} else {
			$newPassword = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		}

		$data = array(
			'nama' => $this->input->post('nama'),
			'role' => $this->input->post('role'),
			'email' => $this->input->post('email'),
			'password' => $newPassword,
		);

		$this->UserModel->update($data, $id);
		$this->session->set_flashdata('success', 'User berhasil diupdate!');
    redirect(base_url("users"));

	}

}