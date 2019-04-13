<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
		$data = array(
			'page' => 'dashboard',
			'title' => 'Dashboard',
			'pasien' => $this->mdata->count_data('pasien'),
			'obat' => $this->mdata->count_data('obat'),
			'dokter' => $this->mdata->count_dokter(),
			'pegawai' => $this->mdata->count_pegawai(),
		);
		$this->load->view('layout_dashboard', $data);
	}
	public function keluar()
	{
		$this->session->unset_userdata('medhicallya');
		redirect(base_url('masuk'));
	}
}
