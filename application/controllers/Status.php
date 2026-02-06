<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Status extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Status_model');
	}

	public function index()
	{
		$data["status"] = $this->Status_model->getAll();
		$this->load->view('status/index', $data);
	}

	public function tambah()
	{
		$data["status"] = $this->Status_model->getAll();
		$this->load->view('status/tambah', $data);
	}

	public function simpan()
	{
		$in_data['id_status'] = $this->input->post('id_status');
		$in_data['nama_status'] = $this->input->post('nama_status');

		$this->Status_model->input_data($in_data);
		redirect('status/index', 'refresh');
	}

	public function editstatus($idstatus)
	{
		$data["status"] = $this->Status_model->getbyId($idstatus);

		$this->load->view('status/edit', $data);
	}

	public function update($idstatus)
	{
		$id_data['id_status'] = $idstatus;
		$in_data['nama_status'] = $this->db->escape_str($this->input->post('nama_status'));

		$this->Status_model->update_data($id_data, $in_data);
		redirect('status/index', 'refresh');
	}

	public function hapusstatus($idstatus)
	{
		$where = array ('id_status' => $idstatus);
		$this->Status_model->hapus_status($where, 'status');
		redirect('status');
	}
}