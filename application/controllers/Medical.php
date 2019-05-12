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
		$no_pasien = $this->input->post('no_pasien');
		$rontgen = isset($mcup['rontgen']) ? '1' : '0';
		$spirometri = isset($mcup['spirometri']) ? '1' : '0';
		$audiometri = isset($mcup['audiometri']) ? '1' : '0';
		$ekg = isset($mcup['ekg']) ? '1' : '0';
		$this->form_validation->set_rules('no_pasien', 'Nama Pasien', 'trim|required');
		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'page' => 'medical_checkup',
				'title' => 'Medical Checkup'
			);
			$this->load->view('layout_dashboard', $data);
		} else {
			$id = $this->mdata->per_pasien($no_pasien)['id'];
			$input = array(
				'id_pasien' => $id,
				'rontgen' => $rontgen,
				'spirometri' => $spirometri,
				'audiometri' => $audiometri,
				'ekg' => $ekg,
				'status_rontgen' => 'Proses',
				'status_spirometri' => 'Proses',
				'status_audiometri' => 'Proses',
				'status_ekg' => 'Proses',
				'tanggal' => date('Y-m-d')
			);
			if ($this->mdata->count_checkup($no_pasien) === FALSE) {
				if ($this->mtambah->checkup($input) === true) {
					redirect(base_url('medical/checkup'));
				}
			} else {
				if ($this->mupdate->checkup($input, $id) === true) {
					redirect(base_url('medical/checkup'));
				}
			}
		}
	}
}
