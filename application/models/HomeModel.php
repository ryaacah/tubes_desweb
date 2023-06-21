<?php 
 
class HomeModel extends CI_Model{

	function getRoom(){
		$this->db->select('*')->order_by('status_tersedia', 'asc')
		->from('rooms');
		$query = $this->db->get();   
		return $query->result_array();
	}

	function getRoomTersedia(){
		$where = array(
			'status_tersedia' => 1,
		);
		$this->db->select('*')->order_by('status_tersedia', 'asc')
		->from('rooms')
		->where($where);
		$query = $this->db->get();   
		return $query->result_array();
	}

	function getRoomById($id){
		$where = array(
			'id' => $id,
		);
		$this->db->select('*')
		->from('rooms')
		->where($where);
		$query = $this->db->get();   
		return $query->result_array();
	}

	function book($data){
		$this->db->set('id', 'UUID()', FALSE);
		return $this->db->insert('orders', $data);
	}
  

	function getOrdersById($id){
		$where = array(
			'id_pemesan' => $id,
		);
		$this->db->select('*')
		->from('orders')
		->where($where);
		$query = $this->db->get();   
		return $query->result_array();
	}

	function deleteOrders($id){
		$this->db->delete('orders', array('id' => $id)); 
		return true;
	}

}