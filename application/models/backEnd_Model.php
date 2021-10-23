<?php

class backEnd_Model extends CI_Model
{
	public function getProvinsi($nama = false, $id = false)
	{
		if ($id) {
			return $this->db->get_where('provinsi', ['id' => $id])->row_array();
		}
		if ($nama == false) {
			return $this->db->get('provinsi')->result_array();
		}
		return $this->db->get_where('provinsi', ["LOWER(REPLACE(nama, ' ', '')) =" => strtolower(str_replace(' ', '', $nama))])->row_array();
	}


	public function getKabupaten($nama = false, $id = false, $id_provinsi = false)
	{
		if ($id) {
			$this->db->select('kabupaten.id, kabupaten.nama, kabupaten.jumlah_penduduk, kabupaten.id_provinsi, provinsi.nama as nama_provinsi');
			$this->db->join('provinsi', 'provinsi.id = kabupaten.id_provinsi');
			return $this->db->get_where('kabupaten', ['kabupaten.id' => $id])->row_array();
		}
		if ($nama == false) {
			$this->db->select('kabupaten.id, kabupaten.nama, kabupaten.jumlah_penduduk, kabupaten.id_provinsi, provinsi.nama as nama_provinsi');
			$this->db->join('provinsi', 'provinsi.id = kabupaten.id_provinsi');
			return $this->db->get('kabupaten')->result_array();
		}
		return $this->db->get_where('kabupaten', ["LOWER(REPLACE(nama, ' ', '')) =" => strtolower(str_replace(' ', '', $nama)), "id_provinsi" => $id_provinsi])->row_array();
	}

	public function getAjaxByProvinsi($id)
	{
		$this->db->select('kabupaten.id, kabupaten.nama, provinsi.nama as nama_provinsi, jumlah_penduduk');
		$this->db->join('provinsi', 'provinsi.id = kabupaten.id_provinsi');
		return $this->db->get_where('kabupaten', ['id_provinsi' => $id])->result_array();
	}

	public function getCountPendudukByProvinsi($id = false)
	{
		if ($id) {
			$this->db->select('provinsi.nama');
			$this->db->select_sum('jumlah_penduduk');
			$this->db->join('kabupaten', 'provinsi.id = kabupaten.id_provinsi');
			$this->db->group_by('provinsi.id');
			return $this->db->get_where('provinsi', ['provinsi.id' => $id])->result_array();
		}
		$this->db->select('provinsi.nama');
		$this->db->select_sum('jumlah_penduduk');
		$this->db->join('kabupaten', 'provinsi.id = kabupaten.id_provinsi');
		$this->db->group_by('provinsi.id');
		return $this->db->get('provinsi')->result_array();
	}
	public function getCountPendudukByKabupaten($id_provinsi, $id = false)
	{
		if ($id) {
			$this->db->select('kabupaten.nama, provinsi.nama as nama_provinsi, jumlah_penduduk');
			$this->db->join('provinsi', 'provinsi.id = kabupaten.id_provinsi');
			return $this->db->get_where('kabupaten', ['kabupaten.id' => $id])->result_array();
		}
		$this->db->select('kabupaten.nama, provinsi.nama as nama_provinsi, jumlah_penduduk');
		$this->db->join('provinsi', 'provinsi.id = kabupaten.id_provinsi');
		return $this->db->get_where('kabupaten', ['kabupaten.id_provinsi' => $id_provinsi])->result_array();
	}

	public function updateProvinsi($data, $id)
	{
		$this->db->set('nama', $data);
		$this->db->where('id', $id);
		$this->db->update('provinsi');
	}

	public function updateKabupaten($data, $id)
	{
		$this->db->set('nama', $data['nama']);
		$this->db->set('jumlah_penduduk', $data['jumlah_penduduk']);
		$this->db->set('id_provinsi', $data['id_provinsi']);
		$this->db->where('id', $id);
		$this->db->update('kabupaten');
	}

	public function deleteProvinsi($id)
	{
		$this->db->delete('provinsi', array('id' => $id));
	}

	public function deleteKabupaten($id)
	{
		$this->db->delete('kabupaten', array('id' => $id));
	}

	public function insertProvinsi($data)
	{
		$this->db->insert('provinsi', $data);
	}

	public function insertKabupaten($data)
	{
		$this->db->insert('kabupaten', $data);
	}

	public function getCountProvinsi()
	{
		$this->db->from('provinsi');
		return $this->db->count_all_results();
	}
	public function getCountKabupaten()
	{
		$this->db->from('kabupaten');
		return $this->db->count_all_results();
	}
}
