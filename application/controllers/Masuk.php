<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
    $this->load->model('mauth');
		if ($this->session->has_userdata('medhicallya')) {
			redirect(base_url('dashboard'));
		}
  }
	public function index()
	{
		$this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'page' => 'masuk',
				'title' => 'Masuk Dashboard'
			);
			$this->load->view('layout', $data);
		} else {
			$input = array(
				'nip' => $this->input->post('nip'),
				'password' => $this->input->post('password')
			);
			$data = $this->mauth->masuk($input['nip'], $input['password']);
			if (!empty($data)) {
				$sess = array(
					'userid' => $data['id'],
					'nip' => $data['nip'],
					'email' => $data['email'],
					'nama' => $data['nama'],
					'jabatan' => $data['jabatan']
				);
				$this->session->set_userdata('medhicallya', $sess);
				redirect(base_url('dashboard'));
			} else {
				echo '<script>alert("Username atau password salah");window.location.href = window.location.href;</script>';
			}
		}
	}
}
