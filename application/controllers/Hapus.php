<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hapus extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
		$this->load->model('mdata');
    $this->load->model('mhapus');
		if (!$this->session->has_userdata('medhicallya')) {
			redirect(base_url('masuk'));
		}
  }
	public function index()
	{
		redirect(base_url('dashboard'));
	}
	public function pegawai($id)
	{
		if ($this->mdata->check_pegawai($id) === FALSE) {
			redirect(base_url('data/pegawai'));
		}

		if ($this->mhapus->pegawai($id) === true) {
			redirect(base_url('data/pegawai'));
		}
	}
	public function dokter($id)
	{
		if ($this->mdata->check_dokter($id) === FALSE) {
			redirect(base_url('data/dokter'));
		}

		if ($this->mhapus->dokter($id) === true) {
			redirect(base_url('data/dokter'));
		}
	}
	public function obat($id)
	{
		if ($this->mdata->check_obat($id) === FALSE) {
			redirect(base_url('data/obat'));
		}

		if ($this->mhapus->obat($id) === true) {
			redirect(base_url('data/obat'));
		}
	}
	public function pasien($id)
	{
		if ($this->mdata->check_pasien($id) === FALSE) {
			redirect(base_url('data/pasien'));
		}

		if ($this->mhapus->pasien($id) === true) {
			redirect(base_url('data/pasien'));
		}
	}
	public function penanggung()
	{
		$no_pasien = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		if ($this->mdata->check_penanggung($no_pasien, $id) === FALSE) {
			redirect(base_url('penanggung/pasien/').$no_pasien.'/'.$id);
		}

		if ($this->mhapus->penanggung($id) === true) {
			redirect(base_url('penanggung/pasien/').$no_pasien.'/'.$id);
		}
	}
}
