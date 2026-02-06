<?php defined('BASEPATH') OR exit('idproduk direct script access allowed');

/**
 * 
 */
class Produk extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Produk_model');
	}

	public function index()
	{
		$data["produk"] = $this->Produk_model->getAll();

		$this->load->view('produk/index', $data);
	}

	public function tambah()
	{
		$data["kategori"] = $this->Produk_model->getKategori();
		$data["status"] = $this->Produk_model->getStatus();

		$this->load->view('produk/tambah', $data);
	}

	public function simpan()
	{
		$in_data['id_produk'] = $this->input->post('id_produk');
		$in_data['nama_produk'] = $this->input->post('nama_produk');
		$in_data['harga'] = $this->input->post('harga');
		$in_data['kategori_id'] = $this->input->post('kategori_id');
		$in_data['status_id'] = $this->input->post('status_id');

		$this->Produk_model->input_data($in_data);
		redirect('', 'refresh');
	}

	public function editproduk($idproduk)
	{
		$data["produk"] = $this->Produk_model->getbyId($idproduk);
		$data["kategori"] = $this->Produk_model->getKategori();
		$data["status"] = $this->Produk_model->getStatus();

		$this->load->view('produk/edit', $data);
	}

	public function update($idproduk)
	{
		$id_data['id_produk'] = $idproduk;
		$in_data['nama_produk'] = $this->db->escape_str($this->input->post('nama_produk'));
		$in_data['harga'] = $this->db->escape_str($this->input->post('harga'));
		$in_data['kategori_id'] = $this->db->escape_str($this->input->post('kategori_id'));
		$in_data['status_id'] = $this->db->escape_str($this->input->post('status_id'));

		$this->Produk_model->update_data($id_data, $in_data);
		redirect('', 'refresh');
	}

	public function hapusproduk($idproduk)
	{
		$where = array ('id_produk' => $idproduk);
		$this->Produk_model->hapus_produk($where, 'produk');
		redirect('produk');
	}
}