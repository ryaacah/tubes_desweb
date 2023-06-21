<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoomController extends CI_Controller {
	
  function __construct(){
		parent::__construct();		
		$this->session_status = $this->session->userdata('isLoggedIn_admin_hr');
		
		if (!$this->session_status) {
      $this->session->set_flashdata('error', 'Sesi anda telah habis!');
			return redirect(base_url() . 'login');
		}	
    
		$this->load->model('RoomModel');
	}
	public function index(){
		$dataRoom = $this->RoomModel->getRoom();
    
		$data['dataRoom'] = $dataRoom;
    $data['title'] = "Rooms Management";
    $data['menuLink'] = "rooms";

		$this->load->view('includes/header', $data);
		$this->load->view('v_room', $data);
		$this->load->view('includes/footer', $data);
	}

  public function add(){
    $filename = $_FILES['img-room']['tmp_name'];
		list($width, $height, $type, $attr) = getimagesize($_FILES['img-room']['tmp_name']);
		
		// Move uploaded file to a temp location
		$uploadDir = $_SERVER['DOCUMENT_ROOT'].'/hallynime-retreat/admin/assets/images/';
		$uploadFile = $uploadDir . basename($_FILES['img-room']['name']);
    if (move_uploaded_file($_FILES['img-room']['tmp_name'], $uploadFile)){
      $data = array(
        'nama' => $this->input->post('nama'),
        'harga' => $this->input->post('harga'),
        'img_dir' => basename($_FILES['img-room']['name']),
        'status_tersedia' => 1,
      );
      $this->RoomModel->add($data);
    }else{
			echo "Possible file upload attack!\n";
		}

		$this->session->set_flashdata('success', 'Room berhasil ditambahkan ke database!');
    redirect(base_url("rooms"));
  }

  public function delete($id){
    $res = $this->RoomModel->getRoomById($id);
		$uploadDir = $_SERVER['DOCUMENT_ROOT'].'/hallynime-retreat/admin/assets/images/';
		$uploadFile = $uploadDir . $res[0]['img_dir'];
		unlink($uploadFile);

    $this->RoomModel->delete($id);
    $this->session->set_flashdata('success', 'Room berhasil dihapus dari database!');
    redirect(base_url("rooms"));
  }

	public function edit($id){
    $res = $this->RoomModel->getRoomById($id);
    $filename = $_FILES['img-room']['tmp_name'];
    if ($filename) {
      list($width, $height, $type, $attr) = getimagesize($_FILES['img-room']['tmp_name']);
      // Move uploaded file to a temp location
      $uploadDir = $_SERVER['DOCUMENT_ROOT'].'/hallynime-retreat/admin/assets/images/';
      $uploadFile = $uploadDir . basename($_FILES['img-room']['name']);
      $uploadFileBefore = $uploadDir . $res[0]['img_dir'];
      unlink($uploadFileBefore);
      
      if (move_uploaded_file($_FILES['img-room']['tmp_name'], $uploadFile)){
        $data = array(
          'nama' => $this->input->post('nama'),
          'harga' => $this->input->post('harga'),
          'img_dir' => basename($_FILES['img-room']['name']),
          'status_tersedia' => $this->input->post('status_tersedia'),
        );
      }else{
        echo "Possible file upload attack!\n";
      }
    }else{
      $data = array(
        'nama' => $this->input->post('nama'),
        'harga' => $this->input->post('harga'),
        'img_dir' => $res[0]['img_dir'],
        'status_tersedia' => $this->input->post('status_tersedia'),
      );
    }

		$this->RoomModel->update($data, $id);
		$this->session->set_flashdata('success', 'Room berhasil diupdate!');
    redirect(base_url("rooms"));

	}

}