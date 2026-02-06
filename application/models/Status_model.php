<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Status_model extends CI_Model
{
	private $_table = "status"; 

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function input_data($data)
	{ 	
		$this->db->insert($this->_table, $data);
	}

	public function getbyId($idstatus)
	{
		return $this->db->query("SELECT * from status
			where id_status = $idstatus")
		->row();
	}

	public function update_data($field_key, $data)
	{
		$this->db->update($this->_table, $data, $field_key);
	}

	public function hapus_status($where, $_table)
	{
		$this->db->where($where);
		$this->db->delete($_table);
	}
}