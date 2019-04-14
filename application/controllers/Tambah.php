<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
		$this->load->model('mdata');
    $this->load->model('mtambah');
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
		$this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'trim|required|is_unique[users.nip]|integer', array('required' => 'Nomor Induk Pegawai Wajib Diisi', 'is_unique' => 'Nomor Induk Pegawai Sudah Terdaftar'));
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required', array('required' => 'Nama Lengkap Wajib Diisi'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', array('required' => 'Alamat Lengkap Wajib Diisi'));
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required', array('required' => 'Jabatan Wajib Diisi'));
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required', array('required' => 'Jenis Kelamin Wajib Diisi'));
		$this->form_validation->set_rules('phone', 'Nomor Telpon', 'trim|required', array('required' => 'Nomor Telpon Wajib Diisi'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]|valid_email', array('required' => 'Email Wajib Diisi', 'is_unique' => 'Alamat Email Sudah Terdaftar', 'valid_email' => 'Mohon Mengisi Alamat Email Dengan Benar'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]', array('required' => 'Password Wajib Diisi'));
		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'page' => 'tambah_pegawai',
				'title' => 'Tambah Pegawai'
			);
			$this->load->view('layout_dashboard', $data);
		} else {
			$input = array(
				'nip' => $this->input->post('nip'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'jabatan' => $this->input->post('jabatan'),
				'gender' => $this->input->post('gender'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'password' => sha1($this->input->post('password'))
			);
			if ($this->mtambah->pegawai($input) === true) {
				redirect(base_url('data/pegawai'));
			}
		}
	}
	public function dokter()
	{
		$this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'trim|required|is_unique[users.nip]|integer', array('required' => 'Nomor Induk Pegawai Wajib Diisi', 'is_unique' => 'Nomor Induk Pegawai Sudah Terdaftar'));
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required', array('required' => 'Nama Lengkap Wajib Diisi'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', array('required' => 'Alamat Lengkap Wajib Diisi'));
		$this->form_validation->set_rules('spesialis', 'Spesialis', 'trim|required', array('required' => 'Spesialis Wajib Diisi'));
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required', array('required' => 'Jenis Kelamin Wajib Diisi'));
		$this->form_validation->set_rules('phone', 'Nomor Telpon', 'trim|required', array('required' => 'Nomor Telpon Wajib Diisi'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]|valid_email', array('required' => 'Email Wajib Diisi', 'is_unique' => 'Alamat Email Sudah Terdaftar', 'valid_email' => 'Mohon Mengisi Alamat Email Dengan Benar'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]', array('required' => 'Password Wajib Diisi'));
		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'page' => 'tambah_dokter',
				'title' => 'Tambah Dokter',
			);
			$this->load->view('layout_dashboard', $data);
		} else {
			$input = array(
				'nip' => $this->input->post('nip'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'spesialis' => $this->input->post('spesialis'),
				'jabatan' => 'Dokter',
				'gender' => $this->input->post('gender'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'password' => sha1($this->input->post('password'))
			);
			if ($this->mtambah->dokter($input) === true) {
				redirect(base_url('data/dokter'));
			}
		}
	}
	public function obat()
	{
		$this->form_validation->set_rules('nama', 'Nama Obat', 'trim|required', array('required' => 'Nama Obat Wajib Diisi'));
		$this->form_validation->set_rules('jenis', 'Jenis Obat', 'trim|required', array('required' => 'Jenis Obat Wajib Diisi'));
		$this->form_validation->set_rules('stok', 'Stok Obat', 'trim|required', array('required' => 'Stok Obat Wajib Diisi'));
		$this->form_validation->set_rules('satuan', 'Satuan Obat', 'trim|required', array('required' => 'Satuan Obat Wajib Diisi'));
		$this->form_validation->set_rules('keterangan', 'Keterangan Obat', 'trim|required', array('required' => 'Keterangan Obat Wajib Diisi'));
		$this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'trim|required', array('required' => 'Tanggal Masuk Wajib Diisi'));
		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'page' => 'tambah_obat',
				'title' => 'Tambah Obat',
			);
			$this->load->view('layout_dashboard', $data);
		} else {
			$input = array(
				'nama' => $this->input->post('nama'),
				'jenis' => $this->input->post('jenis'),
				'stok' => $this->input->post('stok'),
				'satuan' => $this->input->post('satuan'),
				'keterangan' => $this->input->post('keterangan'),
				'tgl_masuk' => $this->input->post('tgl_masuk')
			);
			if ($this->mtambah->obat($input) === true) {
				redirect(base_url('data/obat'));
			}
		}
	}
	public function pasien()
	{
		$no_pasien = substr($this->mdata->no_pasien(), -1);
		$no_pasien = $no_pasien + 1;
		$no_pasien = 'MA'.str_pad($no_pasien, 4, '0', STR_PAD_LEFT);
		$this->form_validation->set_rules('no_pasien', 'Nomor Pasien', 'trim|required|is_unique[pasien.no_pasien]', array('required' => 'Nomor Pasien Wajib Diisi', 'is_unique' => 'Nomor Induk Pegawai Sudah Terdaftar'));
		$this->form_validation->set_rules('ktp', 'Nomor KTP', 'trim|required|is_unique[pasien.ktp]', array('required' => 'Nomor KTP Wajib Diisi', 'is_unique' => 'Nomor KTP Sudah Terdaftar'));
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required', array('required' => 'Nama Lengkap Wajib Diisi'));
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required', array('required' => 'Tempat Lahir Wajib Diisi'));
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required', array('required' => 'Tanggal Lahir Wajib Diisi'));
		$this->form_validation->set_rules('phone', 'Nomor Telpon', 'trim|required', array('required' => 'Nomor Telpon Wajib Diisi'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', array('required' => 'Alamat Lengkap Wajib Diisi'));
		$this->form_validation->set_rules('goldarah', 'Golongan Darah', 'trim|required', array('required' => 'Golongan Darah Wajib Diisi'));
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required', array('required' => 'Jenis Kelamin Wajib Diisi'));
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required', array('required' => 'Pekerjaan Wajib Diisi'));
		$this->form_validation->set_rules('tgl_daftar', 'Tanggal Daftar', 'trim|required', array('required' => 'Tanggal Daftar Wajib Diisi'));
		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'page' => 'tambah_pasien',
				'title' => 'Tambah Pasien',
				'no_pasien' => $no_pasien
			);
			$this->load->view('layout_dashboard', $data);
		} else {
			$input = array(
				'no_pasien' => $this->input->post('no_pasien'),
				'ktp' => $this->input->post('ktp'),
				'nama' => $this->input->post('nama'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'phone' => $this->input->post('phone'),
				'alamat' => $this->input->post('alamat'),
				'goldarah' => $this->input->post('goldarah'),
				'gender' => $this->input->post('gender'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'tgl_daftar' => $this->input->post('tgl_daftar')
			);
			if ($this->mtambah->pasien($input) === true) {
				redirect(base_url('data/pasien'));
			}
		}
	}
	public function penanggung($no_pasien)
	{
		if (empty($no_pasien)) {
			redirect(base_url('data/pasien'));
		}
		$pasien = $this->mdata->per_pasien($no_pasien);
		$this->form_validation->set_rules('ktp', 'Nomor KTP', 'trim|required|is_unique[penanggung.ktp]', array('required' => 'Nomor KTP Wajib Diisi', 'is_unique' => 'Nomor KTP Sudah Terdaftar'));
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required', array('required' => 'Nama Lengkap Wajib Diisi'));
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required', array('required' => 'Jenis Kelamin Wajib Diisi'));
		$this->form_validation->set_rules('phone', 'Nomor Telpon', 'trim|required', array('required' => 'Nomor Telpon Wajib Diisi'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', array('required' => 'Alamat Lengkap Wajib Diisi'));
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required', array('required' => 'Pekerjaan Wajib Diisi'));
		$this->form_validation->set_rules('perusahaan', 'Perusahaan', 'trim|required', array('required' => 'Perusahaan Wajib Diisi'));
		$this->form_validation->set_rules('hubungan', 'Hubungan', 'trim|required', array('required' => 'Hubungan Wajib Diisi'));
		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'page' => 'tambah_penanggung_pasien',
				'title' => 'Tambah Penanggung Pasien',
				'data' => $this->mdata->penanggung($no_pasien),
				'pasien' => $pasien
			);
			$this->load->view('layout_dashboard', $data);
		} else {
			$input = array(
				'id_pasien' => $pasien['id'],
				'ktp' => $this->input->post('ktp'),
				'nama' => $this->input->post('nama'),
				'gender' => $this->input->post('gender'),
				'phone' => $this->input->post('phone'),
				'alamat' => $this->input->post('alamat'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'perusahaan' => $this->input->post('perusahaan'),
				'hubungan' => $this->input->post('hubungan')
			);
			if ($this->mtambah->penanggung($input) === true) {
				redirect(base_url('penanggung/pasien/'.$pasien['no_pasien']));
			}
		}
	}
}
