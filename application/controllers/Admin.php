<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('backEnd_Model');
	}
	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'jumlah_provinsi' => $this->backEnd_Model->getCountProvinsi(),
			'jumlah_kabupaten' => $this->backEnd_Model->getCountKabupaten(),
			'provinsis' => $this->backEnd_Model->getProvinsi(),
			'jumlah_penduduk_alls' => $this->backEnd_Model->getCountPendudukByProvinsi(),
		];
		$this->load->view('templete', $data);
		$this->load->view('dashboard', $data);
	}

	public function ajaxChart()
	{
		$data = $this->backEnd_Model->getCountPendudukByKabupaten($this->input->post('id', true));
		echo json_encode($data);
	}

	public function showProvinsi()
	{
		$data = array(
			'title' => 'Manage Provinsi',
			'provinsis' => $this->backEnd_Model->getProvinsi(),
		);
		$this->load->view('templete', $data);
		$this->load->view('provinsi/showProvinsi', $data);
	}

	public function deleteProvinsi()
	{
		$this->backEnd_Model->deleteProvinsi($this->input->post('id'));
		$this->session->set_flashdata('flash', 'Provinsi Deleted!');
		redirect('Admin/showProvinsi');
	}

	public function addProvinsi()
	{
		$data = array(
			'title' => 'Add Provinsi',
		);
		$this->load->view('templete', $data);
		$this->load->view('provinsi/addProvinsi', $data);
	}

	public function insertProvinsi()
	{
		if ($this->backEnd_Model->getProvinsi($this->input->post('nama', true))) {
			$this->session->set_flashdata('flash', 'Provinsi Already Exists!');
			redirect('Admin/showProvinsi');
		}
		$data = [
			"nama" => $this->input->post('nama', true),
		];
		$this->backEnd_Model->insertProvinsi($data);
		$this->session->set_flashdata('flash', 'Provinsi Added!');
		redirect('Admin/showProvinsi');
	}

	public function editProvinsi()
	{
		$data = [
			'title' => 'Edit Provinsi',
			'provinsi' => $this->backEnd_Model->getProvinsi(false, $this->input->post('id', true)),
		];
		$this->load->view('templete', $data);
		$this->load->view('provinsi/editProvinsi', $data);
	}

	public function updateProvinsi()
	{
		$this->backEnd_Model->updateProvinsi($this->input->post('nama', true), $this->input->post('id', true));
		$this->session->set_flashdata('flash', 'Provinsi Updated!');
		redirect('Admin/showProvinsi');
	}

	public function showKabupaten($id_provinsi = false)
	{
		$data = array(
			'title' => 'Manage Kabupaten',
			'kabupatens' => $this->backEnd_Model->getKabupaten(),
			'provinsis' => $this->backEnd_Model->getProvinsi(),
		);
		if ($id_provinsi) {
			$data['kabupatens'] = $this->backEnd_Model->getAjaxByProvinsi($id_provinsi);
		}
		$this->load->view('templete', $data);
		$this->load->view('kabupaten/showKabupaten', $data);
	}

	public function deleteKabupaten()
	{
		$this->backEnd_Model->deleteKabupaten($this->input->post('id'));
		$this->session->set_flashdata('flash', 'Kabupaten Deleted!');
		redirect('Admin/showKabupaten');
	}

	public function addKabupaten()
	{
		$data = array(
			'title' => 'Add Kabupaten',
			'provinsis' => $this->backEnd_Model->getProvinsi(),
		);
		$this->load->view('templete', $data);
		$this->load->view('Kabupaten/addKabupaten', $data);
	}

	public function insertKabupaten()
	{
		if ($this->backEnd_Model->getKabupaten($this->input->post('nama', true), false, $this->input->post('id_provinsi', true))) {
			$this->session->set_flashdata('flash', 'Kabupaten Already Exists!');
			redirect('Admin/showKabupaten');
		}
		$data = [
			"nama" => $this->input->post('nama', true),
			"jumlah_penduduk" => $this->input->post('jumlah_penduduk', true),
			"id_provinsi" => $this->input->post('id_provinsi', true)
		];
		$this->backEnd_Model->insertKabupaten($data);
		$this->session->set_flashdata('flash', 'Kabupaten Added!');
		redirect('Admin/showKabupaten');
	}

	public function editKabupaten()
	{
		$data = [
			'title' => 'Edit Kabupaten',
			'kabupaten' => $this->backEnd_Model->getKabupaten(false, $this->input->post('id', true)),
			'provinsis' => $this->backEnd_Model->getProvinsi(),
		];
		$this->load->view('templete', $data);
		$this->load->view('Kabupaten/editKabupaten', $data);
	}

	public function updateKabupaten()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"jumlah_penduduk" => $this->input->post('jumlah_penduduk', true),
			"id_provinsi" => $this->input->post('id_provinsi', true)
		];
		$this->backEnd_Model->updateKabupaten($data, $this->input->post('id', true));
		$this->session->set_flashdata('flash', 'Kabupaten Updated!');
		redirect('Admin/showKabupaten');
	}

	public function ajaxByProvinsi()
	{
		$data = $this->backEnd_Model->getAjaxByProvinsi($this->input->post('id', true));
		echo json_encode($data);
	}

	public function exportProvinsi()
	{
		$this->load->library('pdfgenerator');
		$this->data['title'] = 'Data Jumlah Penduduk Berdasarkan Provinsi';
		if ($this->input->post('id', true) == 0) {
			$this->data['provinsis'] = $this->backEnd_Model->getCountPendudukByProvinsi();
		} else {
			$this->data['provinsis'] = $this->backEnd_Model->getCountPendudukByProvinsi($this->input->post('id', true));
		}
		$file_pdf = 'Data Jumlah Penduduk Berdasarkan Provinsi';
		$paper = 'A4';
		$orientation = "portrait";
		$html = $this->load->view('export/provinsi', $this->data, true);
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}

	public function exportKabupaten()
	{
		$this->load->library('pdfgenerator');
		$this->data['title'] = 'Data Jumlah Penduduk Berdasarkan Kabupaten';
		if ($this->input->post('id', true) == 0) {
			$this->data['kabupatens'] = $this->backEnd_Model->getCountPendudukByKabupaten($this->input->post('id_provinsi', true));
		} else {
			$this->data['kabupatens'] = $this->backEnd_Model->getCountPendudukByKabupaten(false, $this->input->post('id', true));
		}
		$file_pdf = 'Data Jumlah Penduduk Berdasarkan Kabupaten';
		$paper = 'A4';
		$orientation = "portrait";
		$html = $this->load->view('export/kabupaten', $this->data, true);
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}
}
