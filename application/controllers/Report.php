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
			'pasien' => $this->mdata->checkup_per_pasien($ktp)
		);
		$this->load->view('report', $data);
	}
}
