<?php 
 
class OrderModel extends CI_Model{
	
	function getOrder(){
		$this->db->select('*')->order_by('status_bayar', 'asc')
		->from('orders');
		$query = $this->db->get();   
		return $query->result_array();
	}
	
	function delete($id){
		$this->db->delete('orders', array('id' => $id));  
		return true;
	}

	function update($data, $id){
		$this->db->where('id', $id);
		$this->db->update('orders', $data);
		return true;
	}

	function getOrderById($id){
		$where = array(
			'id' => $id,
		);
		$this->db->select('*')
		->from('orders')
		->where($where);
		$query = $this->db->get();   
		return $query->result_array();
	}

}