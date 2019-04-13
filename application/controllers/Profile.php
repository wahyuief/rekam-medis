<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
		$this->load->model('mdata');
    $this->load->model('mupdate');
		if (!$this->session->has_userdata('medhicallya')) {
			redirect(base_url('masuk'));
		}
  }
	public function index()
	{
		$this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'trim|required|integer', array('required' => 'Nomor Induk Pegawai Wajib Diisi'));
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required', array('required' => 'Nama Lengkap Wajib Diisi'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', array('required' => 'Alamat Lengkap Wajib Diisi'));
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required', array('required' => 'Jabatan Wajib Diisi'));
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required', array('required' => 'Jenis Kelamin Wajib Diisi'));
		$this->form_validation->set_rules('phone', 'Nomor Telpon', 'trim|required', array('required' => 'Nomor Telpon Wajib Diisi'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array('required' => 'Email Wajib Diisi', 'valid_email' => 'Mohon Mengisi Alamat Email Dengan Benar'));
		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'page' => 'profile',
				'title' => 'Profile',
				'data' => $this->mdata->profile($this->session->userdata('medhicallya')['userid'])
			);
			$this->load->view('layout_dashboard', $data);
		} else {
			$where['id'] = $this->session->userdata('medhicallya')['userid'];
			$input = array(
				'nip' => $this->input->post('nip'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'jabatan' => $this->input->post('jabatan'),
				'gender' => $this->input->post('gender'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'updated_at' => date('Y-m-d H:i:s')
			);
			if ($this->mupdate->profile($input, $where) === true) {
				echo '<script>alert("Update Profile Berhasil");window.location.href = window.location.href;</script>';
			} else {
				echo '<script>alert("Gagal Update Profile");window.location.href = window.location.href;</script>';
			}
		}
	}
	public function password()
	{
		$this->form_validation->set_rules('passold', 'Current Password', 'trim|required', array('required' => 'Password Lama Wajib Diisi'));
		$this->form_validation->set_rules('passnew', 'New Password', 'trim|required|min_length[5]', array('required' => 'Password Baru Wajib Diisi'));
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[passnew]', array('required' => 'Konfirmasi Password Wajib Diisi'));
		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'page' => 'password',
				'title' => 'Password',
				'data' => $this->mdata->profile($this->session->userdata('medhicallya')['userid'])
			);
			$this->load->view('layout_dashboard', $data);
		} else {
			$passold = sha1($this->input->post('passold'));
			$where['id'] = $this->session->userdata('medhicallya')['userid'];
			$input = array(
				'password' => sha1($this->input->post('passnew')),
				'updated_at' => date('Y-m-d H:i:s')
			);
			if ($this->mdata->check_current($passold)) {
				if ($this->mupdate->profile($input, $where) === true) {
					echo '<script>alert("Update Password Berhasil");window.location.href = window.location.href;</script>';
				} else {
					echo '<script>alert("Gagal Update Password");window.location.href = window.location.href;</script>';
				}
			} else {
				echo '<script>alert("Password Lama Tidak Sesuai");window.location.href = window.location.href;</script>';
			}
		}
	}
}
