<?php 
 
class AuthModel extends CI_Model{

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

	function add($data){
		$this->db->set('id', 'UUID()', FALSE);
		return $this->db->insert('users', $data);
	}

}