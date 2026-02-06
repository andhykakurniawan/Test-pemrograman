<?php defined('BASEPATH') OR exit('idkategori direct script access allowed');

/**
 * 
 */
class Kategori extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Kategori_model');
	}

	public function index()
	{
		$data["kategori"] = $this->Kategori_model->getAll();
		$this->load->view('kategori/index', $data);
	}

	public function tambah()
	{
		$data["kategori"] = $this->Kategori_model->getAll();
		$this->load->view('kategori/tambah', $data);
	}

	public function simpan()
	{
		$in_data['id_kategori'] = $this->input->post('id_kategori');
		$in_data['nama_kategori'] = $this->input->post('nama_kategori');

		$this->Kategori_model->input_data($in_data);
		redirect('kategori/index', 'refresh');
	}

	public function editkategori($idkategori)
	{
		$data["kategori"] = $this->Kategori_model->getbyId($idkategori);

		$this->load->view('kategori/edit', $data);
	}

	public function update($idkategori)
	{
		$id_data['id_kategori'] = $idkategori;
		$in_data['nama_kategori'] = $this->db->escape_str($this->input->post('nama_kategori'));

		$this->Kategori_model->update_data($id_data, $in_data);
		redirect('kategori/index', 'refresh');
	}

	public function hapuskategori($idkategori)
	{
		$where = array ('id_kategori' => $idkategori);
		$this->Kategori_model->hapus_kategori($where, 'kategori');
		redirect('kategori');
	}
}