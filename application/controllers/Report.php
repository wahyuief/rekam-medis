<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
    $this->load->model('mdata');
  }
	public function index()
	{
		$ktp = $this->input->post('ktp');
		$data = array(
			'pasien' => $this->mdata->perktp_pasien($ktp),
			'rontgen' => $this->mdata->rontgen_perktp($ktp),
			'spirometri' => $this->mdata->spirometri_perktp($ktp),
			'audiometri' => $this->mdata->audiometri_perktp($ktp),
			'ekg' => $this->mdata->ekg_perktp($ktp)
		);
		$this->load->view('report', $data);
	}
	public function rontgen($ktp)
	{
		$ktp = $this->input->post('ktp');
		$data = array(
			'pasien' => $this->mdata->perktp_pasien($ktp),
			'rontgen' => $this->mdata->rontgen_perktp($ktp)
		);
		$this->load->view('report', $data);
	}
	public function spirometri()
	{
		$ktp = $this->input->post('ktp');
		$data = array(
			'pasien' => $this->mdata->perktp_pasien($ktp),
			'spirometri' => $this->mdata->spirometri_perktp($ktp)
		);
		$this->load->view('report_checkup', $data);
	}
	public function audiometri()
	{
		$ktp = $this->input->post('ktp');
		$data = array(
			'pasien' => $this->mdata->perktp_pasien($ktp),
			'audiometri' => $this->mdata->audiometri_perktp($ktp)
		);
		$this->load->view('report', $data);
	}
	public function ekg()
	{
		$ktp = $this->input->post('ktp');
		$data = array(
			'pasien' => $this->mdata->perktp_pasien($ktp),
			'ekg' => $this->mdata->ekg_perktp($ktp)
		);
		$this->load->view('report', $data);
	}
	public function print_file($table, $no_pasien, $id)
	{
		$this->load->library('pdf');
		$data['rekam_medis'] = $this->mdata->rekam_medis_per_pasien($id);
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "report-data-rekam-medis.pdf";
    $this->pdf->load_view('print_rekammedis', $data);
	}
}
