<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Produk_model extends CI_Model
{
	private $_table = "produk"; 

	public function getAll()
	{
		return $this->db->query("SELECT a.no, a.id_produk, a.nama_produk, a.harga, b.nama_kategori, c.nama_status FROM produk a 
			JOIN Kategori b ON a.kategori_id = b.id_kategori 
			JOIN STATUS c ON a.status_id = c.id_status
			where c.nama_status = 'bisa dijual'")
		->result();
	}

	public function input_data($data)
	{
		$this->db->insert($this->_table, $data);
	}

	public function getKategori()
	{
		return $this->db->get('kategori')->result();
	}

	public function getStatus()
	{
		return $this->db->get('status')->result();
	}

	public function getbyId($idproduk)
	{
		return $this->db->query("SELECT a.no,  a.id_produk, a.nama_produk, a.harga, b.id_kategori, b.nama_kategori, c.id_status, c.nama_status FROM produk a 
			JOIN Kategori b ON a.kategori_id = b.id_kategori 
			JOIN STATUS c ON a.status_id = c.id_status
			where a.id_produk = $idproduk")
		->row();
	}

	public function update_data($field_key, $data)
	{
		$this->db->update($this->_table, $data, $field_key);
	}

	public function hapus_produk($where, $_table)
	{
		$this->db->where($where);
		$this->db->delete($_table);
	}
}