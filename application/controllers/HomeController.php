<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('HomeModel');
		$this->load->model('AuthModel');
	}
	public function index(){
		$dataRoom = $this->HomeModel->getRoom();
		$dataRoomTersedia = $this->HomeModel->getRoomTersedia();
		if ($this->session->userdata('isLoggedIn_admin_hr_user')) {
			$res = $this->AuthModel->checkAuth($this->session->userdata("login_data_admin_hr_user")['email']);
			$dataPesanan = $this->HomeModel->getOrdersById($res[0]['id']);
		} else {
			$dataPesanan = [];
		}

		$data['dataRoom'] = $dataRoom;
		$data['dataRoomTersedia'] = $dataRoomTersedia;
		$data['dataPesanan'] = $dataPesanan;

		$this->load->view('v_home', $data);
	}

	public function bookroom(){
		if (!$this->session->userdata('isLoggedIn_admin_hr_user')) {
			$this->session->set_flashdata('error', 'You must login to proceed!');
			redirect(base_url());
		}
    $res = $this->HomeModel->getRoomById($this->input->post('room'));
		$res_user = $this->AuthModel->checkAuth($this->session->userdata("login_data_admin_hr_user")['email']);
		$data = array(
			'id_pemesan' => $res_user[0]['id'],
			'nama_pemesan' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'no_hp' => $this->input->post('no_hp'),
			'nama_kamar' => $res[0]['nama'],
			'harga' => $res[0]['harga'],
			'img_dir' => $res[0]['img_dir'],
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date'),
			'status_bayar' => 0
		);
		
		$this->HomeModel->book($data);
		$this->session->set_flashdata('success', 'Book Room Berhasil!');
    redirect(base_url());
	}

	public function batalpesan($id){
    $this->HomeModel->deleteOrders($id);
    $this->session->set_flashdata('success', 'Order berhasil dihapus dari database!');
    redirect(base_url());
	}

}