<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medical extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
		$this->load->model('mdata');
		$this->load->model('mtambah');
    $this->load->model('mupdate');
		if (!$this->session->has_userdata('medhicallya')) {
			redirect(base_url('masuk'));
		}
  }
	public function index()
	{
		redirect(base_url('dashboard'));
	}
	public function checkup()
	{
		$checkup = $this->input->post('checkup');
		if (isset($checkup)) {
			foreach ($checkup as $row) {
				$mcup[$row] = array(
					$row => '1'
				);
			}
		}
		$namapasien = $this->input->post('namapasien');
		$rontgen = isset($mcup['rontgen']) ? '1' : '0';
		$spirometri = isset($mcup['spirometri']) ? '1' : '0';
		$audiometri = isset($mcup['audiometri']) ? '1' : '0';
		$ekg = isset($mcup['ekg']) ? '1' : '0';
		$this->form_validation->set_rules('namapasien', 'Nama Pasien', 'trim|required');
		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'page' => 'medical_checkup',
				'title' => 'Medical Checkup',
				'pasien' => $this->mdata->pasien()
			);
			$this->load->view('layout_dashboard', $data);
		} else {
			$id = $this->mdata->per_nama_pasien($namapasien)['id'];
			$input = array(
				'id_pasien' => $id,
				'id_dokter' => 1,
				'status' => 'Pending',
				'tanggal' => date('Y-m-d H:i:s')
			);
			if($rontgen > 0 ? $this->mtambah->checkup('rontgen', $input) : false);
			if($audiometri > 0 ? $this->mtambah->checkup('audiometri', $input) : false);
			if($spirometri > 0 ? $this->mtambah->checkup('spirometri', $input) : false);
			if($ekg > 0 ? $this->mtambah->checkup('ekg', $input) : false);
			redirect(base_url('medical/checkup'));
		}
	}
}
