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
	public function audiometri()
	{
		$data = array(
			'page' => 'audiometri',
			'title' => 'Audiometri',
			'data' => $this->mdata->audiometri()
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
}
