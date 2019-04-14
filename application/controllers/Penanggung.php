<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penanggung extends CI_Controller {
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
		redirect(base_url('penanggung/pasien'));
	}
	public function pasien($no_pasien)
	{
		if ($this->mdata->check_pasien($no_pasien) === FALSE) {
			redirect(base_url('data/pasien'));
		}
		$data = array(
			'page' => 'data_penanggung_pasien',
			'title' => 'Data Penanggung Pasien',
			'data' => $this->mdata->penanggung($no_pasien),
			'pasien' => $this->mdata->per_pasien($no_pasien)
		);
		$this->load->view('layout_dashboard', $data);
	}
}
