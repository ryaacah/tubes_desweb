<?php 
 
class UserModel extends CI_Model{

	function checkAuth($email){
		$where = array(
			'email' => $email,
		);
    
		$this->db->select('*')
		->from('users')
		->where($where);

		$query = $this->db->get();   
		return $query->result_array();
	}
	
	function getUser(){
		$this->db->select('*')->order_by('created_at', 'asc')
		->from('users');
		$query = $this->db->get();   
		return $query->result_array();
	}
	
	function delete($id){
		$this->db->delete('users', array('id' => $id)); 
		$this->db->delete('orders', array('id_pemesan' => $id)); 
		return true;
	}

	function update($data, $id){
		$this->db->where('id', $id);
		$this->db->update('users', $data);
		return true;
	}

	function add($data){
		$this->db->set('id', 'UUID()', FALSE);
		return $this->db->insert('users', $data);
	}
	

	function getUserById($id){
		$where = array(
			'id' => $id,
		);
		$this->db->select('*')
		->from('users')
		->where($where);
		$query = $this->db->get();   
		return $query->result_array();
	}

}