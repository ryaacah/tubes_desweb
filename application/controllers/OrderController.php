<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderController extends CI_Controller {
	
  function __construct(){
		parent::__construct();		
		$this->session_status = $this->session->userdata('isLoggedIn_admin_hr');
		
		if (!$this->session_status) {
      $this->session->set_flashdata('error', 'Sesi anda telah habis!');
			return redirect(base_url() . 'login');
		}	
    
		$this->load->model('OrderModel');
    $this->load->model('RoomModel');
	}
	public function index(){
		$dataOrder = $this->OrderModel->getOrder();
		$dataRoomTersedia = $this->RoomModel->getRoomTersedia();
    
		$data['dataOrder'] = $dataOrder;
		$data['dataRoomTersedia'] = $dataRoomTersedia;
    $data['title'] = "Orders Management";
    $data['menuLink'] = "orders";

		$this->load->view('includes/header', $data);
		$this->load->view('v_order', $data);
		$this->load->view('includes/footer', $data);
	}

  public function delete($id){
    $this->OrderModel->delete($id);
    $this->session->set_flashdata('success', 'Order berhasil dihapus dari database!');
    redirect(base_url("orders"));
  }

	public function edit($id){
    $res = $this->OrderModel->getOrderById($id);
    // Ubah Kamar
    if ($this->input->post('kamar')) {
      $res_room = $this->RoomModel->getRoomById($this->input->post('kamar'));
      $data = array(
        'nama_pemesan' => $this->input->post('nama_pemesan'),
        'email' => $this->input->post('email'),
        'no_hp' => $this->input->post('no_hp'),
        'nama_kamar' => $res_room[0]['nama'],
        'harga' => $res_room[0]['harga'],
        'img_dir' => $res_room[0]['img_dir'],
        'start_date' => $this->input->post('start_date'),
        'end_date' => $this->input->post('end_date'),
        'status_bayar' => $this->input->post('status_bayar'),
      );
    }else{
      $data = array(
        'nama_pemesan' => $this->input->post('nama_pemesan'),
        'email' => $this->input->post('email'),
        'no_hp' => $this->input->post('no_hp'),
        'nama_kamar' => $res[0]['nama_kamar'],
        'harga' => $res[0]['harga'],
        'img_dir' => $res[0]['img_dir'],
        'start_date' => $this->input->post('start_date'),
        'end_date' => $this->input->post('end_date'),
        'status_bayar' => $this->input->post('status_bayar'),
      );
    }


		$this->OrderModel->update($data, $id);
		$this->session->set_flashdata('success', 'Order berhasil diupdate!');
    redirect(base_url("orders"));

	}

}