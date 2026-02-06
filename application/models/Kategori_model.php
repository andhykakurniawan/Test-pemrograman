<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Kategori_model extends CI_Model
{
	private $_table = "kategori"; 

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function input_data($data)
	{ 	
		$this->db->insert($this->_table, $data);
	}

	public function getbyId($idkategori)
	{
		return $this->db->query("SELECT * from kategori
			where id_kategori = $idkategori")
		->row();
	}

	public function update_data($field_key, $data)
	{
		$this->db->update($this->_table, $data, $field_key);
	}

	public function hapus_kategori($where, $_table)
	{
		$this->db->where($where);
		$this->db->delete($_table);
	}

}