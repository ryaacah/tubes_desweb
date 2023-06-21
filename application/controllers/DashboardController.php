<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
	
  function __construct(){
		parent::__construct();		
		$this->session_status = $this->session->userdata('isLoggedIn_admin_hr');
		
		if (!$this->session_status) {
      $this->session->set_flashdata('error', 'Sesi anda telah habis!');
			return redirect(base_url() . 'login');
		}	
		
		$this->load->model('RoomModel');
		$this->load->model('OrderModel');
		$this->load->model('UserModel');
	}
	public function index(){
		$dataRoom = count($this->RoomModel->getRoom());
		$dataOrder = count($this->OrderModel->getOrder());
		$dataRoomTersedia = count($this->RoomModel->getRoomTersedia());
		$dataUser = count($this->UserModel->getUser());

		$data['dataRoom'] = $dataRoom;
		$data['dataOrder'] = $dataOrder;
		$data['dataRoomTersedia'] = $dataRoomTersedia;
		$data['dataUser'] = $dataUser;
    $data['title'] = "Dashboard";
    $data['menuLink'] = "dashboard";

		$this->load->view('includes/header', $data);
		$this->load->view('v_dashboard', $data);
		$this->load->view('includes/footer', $data);
	}

}