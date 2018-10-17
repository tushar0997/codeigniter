<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model extends CI_Model {

	public function __construct()
	{

	}

	//-----get user----
	public function getUser() {
		$query = $this->db->get('user_reg');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else {
			return false;
		}
	}

	//-----Insert user----
	public function submit($data)
	{
		$this->db->insert('user_reg', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else {
			return false;
		}
	}


	public function getUserById($id) 
	{
		$this->db->where('id', $id);
		$query = $this->db->get('user_reg');

		if ($query->num_rows() > 0) {
			return $query->row();
		}
		else {
			return false;
		}
	}

	public function updateUser($table, $data, $where) 
	{
		return $this->db->update($table, $data, $where);
	}

	public function deleteUser($id) 
	{
		$this->db->where('id', $id);
		$this->db->delete('user_reg');
		if ($this->db->affected_rows() >0) {
			return true;
		}
		else{
			return false;
		}
	}

}
