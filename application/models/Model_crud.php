<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_crud extends CI_Model {

	public function getUser($table_name)
	{	
		$get_user = $this->db->get($table_name);
		return $get_user->result_array();
		
	}
	public function tambah($table_name, $data){
		$tambah = $this->db->insert($table_name, $data);
		return $tambah;
	}
	public function hapus($table_name,$id){
		$this->db->where('NIM',$id);
		$del = $this->db->delete($table_name);
		return $del;
	}
	public function editdata($table_name,$data,$id){
		$this->db->where('NIM',$id);
		$edits = $this->db->update($table_name,$data);
		return $edits;
	}

	public function edit($table_name,$id)
	{	
		$this->db->where('NIM',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
		
	}
}