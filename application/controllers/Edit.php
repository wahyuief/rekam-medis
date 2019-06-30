<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {
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
		redirect(base_url('dashboard'));
	}
	public function pegawai($id)
	{
		if ($this->mdata->check_pegawai($id) === FALSE) {
			redirect(base_url('data/pegawai'));
		}
		$this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'trim|required|integer', array('required' => 'Nomor Induk Pegawai Wajib Diisi'));
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required', array('required' => 'Nama Lengkap Wajib Diisi'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', array('required' => 'Alamat Lengkap Wajib Diisi'));
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required', array('required' => 'Jabatan Wajib Diisi'));
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required', array('required' => 'Jenis Kelamin Wajib Diisi'));
		$this->form_validation->set_rules('phone', 'Nomor Telpon', 'trim|required', array('required' => 'Nomor Telpon Wajib Diisi'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array('required' => 'Email Wajib Diisi', 'valid_email' => 'Mohon Mengisi Alamat Email Dengan Benar'));
		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'page' => 'edit_pegawai',
				'title' => 'Edit Pegawai',
				'data' => $this->mdata->per_pegawai($id)
			);
			$this->load->view('layout_dashboard', $data);
		} else {
			if (empty($this->input->post('password'))) {
				$password = $this->mdata->per_pegawai($id)['password'];
			} else {
				$password = sha1($this->input->post('password'));
			}
			$input = array(
				'nip' => $this->input->post('nip'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'jabatan' => $this->input->post('jabatan'),
				'gender' => $this->input->post('gender'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'password' => $password,
				'updated_at' => date('Y-m-d H:i:s')
			);
			if ($this->mupdate->pegawai($input, $id) === true) {
				redirect(base_url('data/pegawai'));
			}
		}
	}
	public function dokter($id)
	{
		if ($this->mdata->check_dokter($id) === FALSE) {
			redirect(base_url('data/dokter'));
		}
		$this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'trim|required|integer', array('required' => 'Nomor Induk Pegawai Wajib Diisi'));
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required', array('required' => 'Nama Lengkap Wajib Diisi'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', array('required' => 'Alamat Lengkap Wajib Diisi'));
		$this->form_validation->set_rules('spesialis', 'Spesialis', 'trim|required', array('required' => 'Spesialis Wajib Diisi'));
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required', array('required' => 'Jenis Kelamin Wajib Diisi'));
		$this->form_validation->set_rules('phone', 'Nomor Telpon', 'trim|required', array('required' => 'Nomor Telpon Wajib Diisi'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array('required' => 'Email Wajib Diisi', 'valid_email' => 'Mohon Mengisi Alamat Email Dengan Benar'));
		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'page' => 'edit_dokter',
				'title' => 'Edit Dokter',
				'data' => $this->mdata->per_dokter($id)
			);
			$this->load->view('layout_dashboard', $data);
		} else {
			if (empty($this->input->post('password'))) {
				$password = $this->mdata->per_dokter($id)['password'];
			} else {
				$password = sha1($this->input->post('password'));
			}
			$input = array(
				'nip' => $this->input->post('nip'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'jabatan' => 'Dokter',
				'spesialis' => $this->input->post('spesialis'),
				'gender' => $this->input->post('gender'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'password' => $password,
				'updated_at' => date('Y-m-d H:i:s')
			);
			if ($this->mupdate->dokter($input, $id) === true) {
				redirect(base_url('data/dokter'));
			}
		}
	}
	public function obat($id)
	{
		if ($this->mdata->check_obat($id) === FALSE) {
			redirect(base_url('data/obat'));
		}
		$this->form_validation->set_rules('nama', 'Nama Obat', 'trim|required', array('required' => 'Nama Obat Wajib Diisi'));
		$this->form_validation->set_rules('jenis', 'Jenis Obat', 'trim|required', array('required' => 'Jenis Obat Wajib Diisi'));
		$this->form_validation->set_rules('stok', 'Stok Obat', 'trim|required', array('required' => 'Stok Obat Wajib Diisi'));
		$this->form_validation->set_rules('satuan', 'Satuan Obat', 'trim|required', array('required' => 'Satuan Obat Wajib Diisi'));
		$this->form_validation->set_rules('keterangan', 'Keterangan Obat', 'trim|required', array('required' => 'Keterangan Obat Wajib Diisi'));
		$this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'trim|required', array('required' => 'Tanggal Masuk Wajib Diisi'));
		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'page' => 'edit_obat',
				'title' => 'Edit Obat',
				'data' => $this->mdata->per_obat($id)
			);
			$this->load->view('layout_dashboard', $data);
		} else {
			$input = array(
				'nama' => $this->input->post('nama'),
				'jenis' => $this->input->post('jenis'),
				'stok' => $this->input->post('stok'),
				'satuan' => $this->input->post('satuan'),
				'keterangan' => $this->input->post('keterangan'),
				'tgl_masuk' => $this->input->post('tgl_masuk'),
				'updated_at' => date('Y-m-d H:i:s')
			);
			if ($this->mupdate->obat($input, $id) === true) {
				redirect(base_url('data/obat'));
			}
		}
	}
	public function pasien($id)
	{
		if ($this->mdata->check_pasien($id) === FALSE) {
			redirect(base_url('data/pasien'));
		}
		$this->form_validation->set_rules('ktp', 'Nomor KTP', 'trim|required', array('required' => 'Nomor KTP Wajib Diisi'));
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
				'page' => 'edit_pasien',
				'title' => 'Edit Pasien',
				'data' => $this->mdata->per_pasien($id)
			);
			$this->load->view('layout_dashboard', $data);
		} else {
			$input = array(
				'ktp' => $this->input->post('ktp'),
				'nama' => $this->input->post('nama'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'phone' => $this->input->post('phone'),
				'alamat' => $this->input->post('alamat'),
				'goldarah' => $this->input->post('goldarah'),
				'gender' => $this->input->post('gender'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'tgl_daftar' => $this->input->post('tgl_daftar'),
				'updated_at' => date('Y-m-d H:i:s')
			);
			if ($this->mupdate->pasien($input, $id) === true) {
				redirect(base_url('data/pasien'));
			}
		}
	}
	public function penanggung()
	{
		$no_pasien = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		if ($this->mdata->check_penanggung($no_pasien, $id) === FALSE) {
			redirect(base_url('data/pasien'));
		}
		$pasien = $this->mdata->per_pasien($no_pasien);
		$this->form_validation->set_rules('ktp', 'Nomor KTP', 'trim|required', array('required' => 'Nomor KTP Wajib Diisi'));
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required', array('required' => 'Nama Lengkap Wajib Diisi'));
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required', array('required' => 'Jenis Kelamin Wajib Diisi'));
		$this->form_validation->set_rules('phone', 'Nomor Telpon', 'trim|required', array('required' => 'Nomor Telpon Wajib Diisi'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', array('required' => 'Alamat Lengkap Wajib Diisi'));
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required', array('required' => 'Pekerjaan Wajib Diisi'));
		$this->form_validation->set_rules('perusahaan', 'Perusahaan', 'trim|required', array('required' => 'Perusahaan Wajib Diisi'));
		$this->form_validation->set_rules('hubungan', 'Hubungan', 'trim|required', array('required' => 'Hubungan Wajib Diisi'));
		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'page' => 'edit_penanggung_pasien',
				'title' => 'Edit Penanggung Pasien',
				'data' => $this->mdata->per_penanggung($id),
				'pasien' => $pasien
			);
			$this->load->view('layout_dashboard', $data);
		} else {
			$input = array(
				'ktp' => $this->input->post('ktp'),
				'nama' => $this->input->post('nama'),
				'gender' => $this->input->post('gender'),
				'phone' => $this->input->post('phone'),
				'alamat' => $this->input->post('alamat'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'perusahaan' => $this->input->post('perusahaan'),
				'hubungan' => $this->input->post('hubungan'),
				'updated_at' => date('Y-m-d H:i:s')
			);
			if ($this->mupdate->penanggung($input, $id) === true) {
				redirect(base_url('penanggung/pasien/').$no_pasien.'/'.$id);
			}
		}
	}
	public function rontgen($no_pasien, $id) {
		if (!$this->mdata->per_rontgen($no_pasien, $id)) {
			redirect(base_url('data/rontgen'));
		}
		$pasien = $this->mdata->per_pasien($no_pasien);
		$this->form_validation->set_rules('cor', 'cor', 'trim|required', array('required' => 'Cor Wajib Diisi'));
		$this->form_validation->set_rules('pulmo', 'pulmo', 'trim|required', array('required' => 'Pulmo Wajib Diisi'));
		$this->form_validation->set_rules('costae', 'costae', 'trim|required', array('required' => 'Costae Wajib Diisi'));
		$this->form_validation->set_rules('sinus', 'sinus', 'trim|required', array('required' => 'Sinus Wajib Diisi'));
		$this->form_validation->set_rules('diapragma', 'diapragma', 'trim|required', array('required' => 'Diapragma Wajib Diisi'));
		$this->form_validation->set_rules('jenis_periksa', 'jenis_periksa', 'trim|required', array('required' => 'Jenis Periksa Wajib Diisi'));
		$this->form_validation->set_rules('kesan', 'kesan', 'trim|required', array('required' => 'Kesan Wajib Diisi'));
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required', array('required' => 'Keterangan Wajib Diisi'));
		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'page' => 'edit_rontgen',
				'title' => 'Data Rontgen',
				'data' => $this->mdata->per_rontgen($no_pasien, $id),
				'pasien' => $pasien,
				'dokter' => $this->mdata->dokter()
			);
			$this->load->view('layout_dashboard', $data);
		} else {
			$input = array(
				'cor' => $this->input->post('cor'),
				'pulmo' => $this->input->post('pulmo'),
				'costae' => $this->input->post('costae'),
				'sinus' => $this->input->post('sinus'),
				'diapragma' => $this->input->post('diapragma'),
				'jenis_periksa' => $this->input->post('jenis_periksa'),
				'kesan' => $this->input->post('kesan'),
				'keterangan' => $this->input->post('keterangan'),
				'status' => $this->input->post('status'),
				'id_dokter' => $this->input->post('dokter')
			);
			print_r($input);
			// die();
			if ($this->mupdate->rontgen($input, $id) === true) {
				redirect(base_url('edit/rontgen/').$no_pasien.'/'.$id);
			}
		}
	}
	public function spirometri($no_pasien, $id) {
		if (!$this->mdata->per_spirometri($no_pasien, $id)) {
			redirect(base_url('data/spirometri'));
		}
		$pasien = $this->mdata->per_pasien($no_pasien);
		$this->form_validation->set_rules('nilai_prediksi', 'nilai_prediksi', 'trim|required', array('required' => 'Nilai Prediksi Wajib Diisi'));
		$this->form_validation->set_rules('kvp', 'kvp', 'trim|required', array('required' => 'Kapasitas Vital Paksa Wajib Diisi'));
		$this->form_validation->set_rules('vep', 'vep', 'trim|required', array('required' => 'Volume Ekspirasi Paksa Detik Pertama Wajib Diisi'));
		$this->form_validation->set_rules('ape', 'ape', 'trim|required', array('required' => 'Arus Puncak Ekspirasi Wajib Diisi'));
		$this->form_validation->set_rules('kesan', 'kesan', 'trim|required', array('required' => 'Kesan Wajib Diisi'));
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required', array('required' => 'Keterangan Wajib Diisi'));
		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'page' => 'edit_spirometri',
				'title' => 'Data Spirometri',
				'data' => $this->mdata->per_spirometri($no_pasien, $id),
				'pasien' => $pasien,
				'dokter' => $this->mdata->dokter()
			);
			$this->load->view('layout_dashboard', $data);
		} else {
			$input = array(
				'nilai_prediksi' => $this->input->post('nilai_prediksi'),
				'kvp' => $this->input->post('kvp'),
				'vep' => $this->input->post('vep'),
				'ape' => $this->input->post('ape'),
				'kesan' => $this->input->post('kesan'),
				'keterangan' => $this->input->post('keterangan'),
				'status' => $this->input->post('status'),
				'id_dokter' => $this->input->post('dokter')
			);
			if ($this->mupdate->spirometri($input, $id) === true) {
				redirect(base_url('edit/spirometri/').$no_pasien.'/'.$id);
			}
		}
	}
	public function audiometri($no_pasien, $id) {
		if (!$this->mdata->per_audiometri($no_pasien, $id)) {
			redirect(base_url('data/audiometri'));
		}
		$pasien = $this->mdata->per_pasien($no_pasien);
		$this->form_validation->set_rules('irama', 'irama', 'trim|required', array('required' => 'Irama Wajib Diisi'));
		$this->form_validation->set_rules('rate', 'rate', 'trim|required', array('required' => 'Rate Wajib Diisi'));
		$this->form_validation->set_rules('axis', 'axis', 'trim|required', array('required' => 'Axis Wajib Diisi'));
		$this->form_validation->set_rules('kelainan', 'kelainan', 'trim|required', array('required' => 'Kelainan Wajib Diisi'));
		$this->form_validation->set_rules('kesimpulan', 'kesimpulan', 'trim|required', array('required' => 'Kesimpulan Wajib Diisi'));
		$this->form_validation->set_rules('saran', 'saran', 'trim|required', array('required' => 'Saran Wajib Diisi'));
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required', array('required' => 'Keterangan Wajib Diisi'));
		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'page' => 'edit_audiometri',
				'title' => 'Data Audiometri',
				'data' => $this->mdata->per_audiometri($no_pasien, $id),
				'pasien' => $pasien,
				'dokter' => $this->mdata->dokter()
			);
			$this->load->view('layout_dashboard', $data);
		} else {
			$input = array(
				'irama' => $this->input->post('irama'),
				'rate' => $this->input->post('rate'),
				'axis' => $this->input->post('axis'),
				'kelainan' => $this->input->post('kelainan'),
				'kesimpulan' => $this->input->post('kesimpulan'),
				'saran' => $this->input->post('saran'),
				'keterangan' => $this->input->post('keterangan'),
				'status' => $this->input->post('status'),
				'id_dokter' => $this->input->post('dokter')
			);
			if ($this->mupdate->audiometri($input, $id) === true) {
				redirect(base_url('edit/audiometri/').$no_pasien.'/'.$id);
			}
		}
	}
	public function ekg($no_pasien, $id) {
		if (!$this->mdata->per_ekg($no_pasien, $id)) {
			redirect(base_url('data/ekg'));
		}
		$pasien = $this->mdata->per_pasien($no_pasien);
		$this->form_validation->set_rules('irama', 'irama', 'trim|required', array('required' => 'Irama Wajib Diisi'));
		$this->form_validation->set_rules('rate', 'rate', 'trim|required', array('required' => 'Rate Wajib Diisi'));
		$this->form_validation->set_rules('axis', 'axis', 'trim|required', array('required' => 'Axis Wajib Diisi'));
		$this->form_validation->set_rules('kelainan', 'kelainan', 'trim|required', array('required' => 'Kelainan Wajib Diisi'));
		$this->form_validation->set_rules('kesimpulan', 'kesimpulan', 'trim|required', array('required' => 'Kesimpulan Wajib Diisi'));
		$this->form_validation->set_rules('saran', 'saran', 'trim|required', array('required' => 'Saran Wajib Diisi'));
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required', array('required' => 'Keterangan Wajib Diisi'));
		if ($this->form_validation->run() === FALSE) {
			$data = array(
				'page' => 'edit_ekg',
				'title' => 'Data EKG',
				'data' => $this->mdata->per_ekg($no_pasien, $id),
				'pasien' => $pasien,
				'dokter' => $this->mdata->dokter()
			);
			$this->load->view('layout_dashboard', $data);
		} else {
			$input = array(
				'irama' => $this->input->post('irama'),
				'rate' => $this->input->post('rate'),
				'axis' => $this->input->post('axis'),
				'kelainan' => $this->input->post('kelainan'),
				'kesimpulan' => $this->input->post('kesimpulan'),
				'saran' => $this->input->post('saran'),
				'keterangan' => $this->input->post('keterangan'),
				'status' => $this->input->post('status'),
				'id_dokter' => $this->input->post('dokter')
			);
			if ($this->mupdate->ekg($input, $id) === true) {
				redirect(base_url('edit/ekg/').$no_pasien.'/'.$id);
			}
		}
	}
}
