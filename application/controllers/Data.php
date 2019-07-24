<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
    $this->load->model('mdata');
		if (!$this->session->has_userdata('medhicallya')) {
			redirect(base_url('masuk'));
		}
		$this->load->helper('umur');
  }
	public function index()
	{
		redirect(base_url('dashboard'));
	}
	public function pegawai()
	{
		$data = array(
			'page' => 'data_pegawai',
			'title' => 'Data Pegawai',
			'data' => $this->mdata->pegawai()
		);
		$this->load->view('layout_dashboard', $data);
	}
	public function dokter()
	{
		$data = array(
			'page' => 'data_dokter',
			'title' => 'Data Dokter',
			'data' => $this->mdata->dokter()
		);
		$this->load->view('layout_dashboard', $data);
	}
	public function obat()
	{
		$data = array(
			'page' => 'data_obat',
			'title' => 'Data Obat',
			'data' => $this->mdata->obat()
		);
		$this->load->view('layout_dashboard', $data);
	}
	public function pasien()
	{
		$data = array(
			'page' => 'data_pasien',
			'title' => 'Data Pasien',
			'data' => $this->mdata->pasien()
		);
		$this->load->view('layout_dashboard', $data);
	}
	public function rontgen()
	{
		$data = array(
			'page' => 'rontgen',
			'title' => 'Rontgen',
			'data' => $this->mdata->rontgen()
		);
		$this->load->view('layout_dashboard', $data);
	}
	public function spirometri()
	{
		$data = array(
			'page' => 'spirometri',
			'title' => 'Spirometri',
			'data' => $this->mdata->spirometri()
		);
		$this->load->view('layout_dashboard', $data);
	}
	public function usg()
	{
		$data = array(
			'page' => 'usg',
			'title' => 'USG',
			'data' => $this->mdata->usg()
		);
		$this->load->view('layout_dashboard', $data);
	}
	public function ekg()
	{
		$data = array(
			'page' => 'ekg',
			'title' => 'EKG',
			'data' => $this->mdata->ekg()
		);
		$this->load->view('layout_dashboard', $data);
	}
	public function nama_pasien()
	{
		$nama = $this->input->get('nama');
		$data = $this->mdata->cari_pasien($nama);
		echo json_encode($data);
	}
	public function print_rontgen($pasien, $id)
	{
		$this->load->library('pdf');
		$data['rontgen'] = $this->mdata->per_rontgen($pasien, $id);
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "report-data-rekam-medis.pdf";
    $this->pdf->load_view('print_rontgen', $data);
	}
	public function print_spirometri($pasien, $id)
	{
		$this->load->library('pdf');
		$data['spirometri'] = $this->mdata->per_spirometri($pasien, $id);
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "report-data-rekam-medis.pdf";
    $this->pdf->load_view('print_spirometri', $data);
	}
	public function print_usg($pasien, $id)
	{
		$this->load->library('pdf');
		$data['usg'] = $this->mdata->per_usg($pasien, $id);
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "report-data-rekam-medis.pdf";
    $this->pdf->load_view('print_usg', $data);
	}
	public function print_ekg($pasien, $id)
	{
		$this->load->library('pdf');
		$data['ekg'] = $this->mdata->per_ekg($pasien, $id);
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "report-data-rekam-medis.pdf";
    $this->pdf->load_view('print_ekg', $data);
	}
}
