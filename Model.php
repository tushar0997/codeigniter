<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Model extends CI_Model
{
	function __construct()
	{

	}
	function insert($table,$data)
	{
		return $this->db->insert($table,$data);
	}
	function select_all(string $table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$r = $this->db->get();
		return $r->result();
	}
	function delete_data(string $table,array $where)
	{
		return $this->db->delete($table,$where);
	}
	function select_where(string $table,array $where)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);
		$r = $this->db->get();
		return $r->result();
	}
	public function join_table($table1,$table2,$con)
	{
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2,$con);
		$r = $this->db->get();
		return $r->result();
	}
	
	function count_all()
	{
		return $this->db->count_all_results('reg');
	}
	public function getdata($limit,$offset)
     {
        $result = $this->db->get('reg',$limit,$offset);
        return $result->result_array();
     }
	function update_data(string $table,array $data,array $where)
	{
		return $this->db->update($table,$data,$where);
	}
	function searchdata($table,$data)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->like('fname',$data);
		$this->db->or_like('email',$data);
                 //$this->db->or_like('lname',$data);
                 //$this->db->or_like('email',$data);
		$r = $this->db->get();
		return $r->result();
	}
}

?>
