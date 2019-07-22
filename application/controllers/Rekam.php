<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekam extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
		$this->load->model('mdata');
		$this->load->model('mtambah');
		$this->load->model('mupdate');
    $this->load->model('mhapus');
		if (!$this->session->has_userdata('medhicallya')) {
			redirect(base_url('masuk'));
		}
  }
	public function index()
	{
		redirect(base_url('rekam/medis'));
	}
	public function medis()
	{
		$data = array(
			'page' => 'rekam_medis',
			'title' => 'Data Rekam Medis',
			'data' => $this->mdata->rekam_medis()
		);
		$this->load->view('layout_dashboard', $data);
	}
	public function baru()
	{
		$this->form_validation->set_rules('namapasien', 'Pasien', 'trim|required');
		$this->form_validation->set_rules('keluhan', 'Keluhan', 'trim|required');
		$this->form_validation->set_rules('diagnosa', 'Diagnosa', 'trim|required');
		$this->form_validation->set_rules('tindakan', 'Tindakan', 'trim|required');
		$this->form_validation->set_rules('obat', 'Obat', 'trim|required');
		$this->form_validation->set_rules('dokter', 'Dokter', 'trim|required');
		$pasien = $this->mdata->per_nama_pasien($this->input->post('namapasien'));

		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'page' => 'tambah_rekam_medis',
				'title' => 'Tambah Data Rekam Medis',
				'data' => $this->mdata->rekam_medis(),
				'pasien' => $this->mdata->pasien(),
				'dokter' => $this->mdata->dokter(),
				'obat' => $this->mdata->obat()
			);
			$this->load->view('layout_dashboard', $data);
		} else {
			if ($this->mdata->rekam_medis_per_pasien($pasien['no_pasien'])) {
				echo "Data sudah ada";
				return false;
			}
			$data = array(
				'id_obat' => $this->input->post('obat'),
				'id_dokter' => $this->input->post('dokter'),
				'id_pasien' => $pasien['id'],
				'keluhan' => $this->input->post('keluhan'),
				'diagnosa' => $this->input->post('diagnosa'),
				'tindakan' => $this->input->post('tindakan'),
				'tanggal' => date('Y-m-d')
			);
			if ($this->mtambah->rekam_medis($data) === TRUE) {
				redirect(base_url('rekam/medis'));
			}
		}
	}
	public function pasien($no_pasien)
	{
		if ($this->mdata->rekam_medis_per_pasien($no_pasien) === FALSE) {
			redirect(base_url('rekam/medis'));
		}
		$this->form_validation->set_rules('keluhan', 'Keluhan', 'trim|required');
		$this->form_validation->set_rules('diagnosa', 'Diagnosa', 'trim|required');
		$this->form_validation->set_rules('tindakan', 'Tindakan', 'trim|required');
		$this->form_validation->set_rules('obat', 'Obat', 'trim|required');
		$this->form_validation->set_rules('dokter', 'Dokter', 'trim|required');
		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'page' => 'edit_rekam_medis',
				'title' => 'Edit Data Rekam Medis',
				'data' => $this->mdata->rekam_medis_per_pasien($no_pasien),
				'dokter' => $this->mdata->dokter(),
				'obat' => $this->mdata->obat()
			);
			$this->load->view('layout_dashboard', $data);
		} else {
			$id = $this->mdata->rekam_medis_per_pasien($no_pasien)['id'];
			$input = array(
				'id_obat' => $this->input->post('obat'),
				'id_dokter' => $this->input->post('dokter'),
				'keluhan' => $this->input->post('keluhan'),
				'diagnosa' => $this->input->post('diagnosa'),
				'tindakan' => $this->input->post('tindakan'),
				'tanggal' => date('Y-m-d')
			);
			if ($this->mupdate->rekam_medis($input, $id) === true) {
				redirect(base_url('rekam/medis'));
			}
		}
	}
	public function print_file($id)
	{
		$this->load->library('pdf');
		$data['rekam_medis'] = $this->mdata->rekam_medis_per_pasien($id);
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "report-data-rekam-medis.pdf";
    $this->pdf->load_view('print_rekammedis', $data);
	}
	public function hapus($id)
	{
		if ($this->mdata->rekam_medis_per_pasien($id) === FALSE) {
			redirect(base_url('rekam/medis'));
		}
		$id = $this->mdata->rekam_medis_per_pasien($id)['id'];
		if ($this->mhapus->rekam_medis($id) === true) {
			redirect(base_url('rekam/medis'));
		}
	}
}
