<?php 
 
class RoomModel extends CI_Model{
	
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
	
	function delete($id){
		$this->db->delete('rooms', array('id' => $id));  
		return true;
	}

	function update($data, $id){
		$this->db->where('id', $id);
		$this->db->update('rooms', $data);
		return true;
	}

	function add($data){
		$this->db->set('id', 'UUID()', FALSE);
		return $this->db->insert('rooms', $data);
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

}