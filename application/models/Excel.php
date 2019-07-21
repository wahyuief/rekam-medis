<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel extends CI_Model {
	public function pegawai()
	{
		$this->db->where('jabatan !=', 'dokter');
		$this->db->where('hapus', '0');
		$query = $this->db->get('users');
    	return !empty($query)?$query->result():false;
	}
	public function dokter()
	{
		$this->db->where('jabatan', 'dokter');
		$this->db->where('hapus', '0');
		$query = $this->db->get('users');
    	return !empty($query)?$query->result():false;
	}
	public function obat()
	{
		$this->db->where('hapus', '0');
		$query = $this->db->get('obat');
    	return !empty($query)?$query->result():false;
	}
	public function pasien()
	{
		$this->db->where('hapus', '0');
		$query = $this->db->get('pasien');
    	return !empty($query)?$query->result():false;
	}
	public function penanggung($no_pasien)
	{
		$this->db->select('penanggung.id, penanggung.ktp, penanggung.nama, penanggung.pekerjaan, penanggung.gender, penanggung.phone, penanggung.alamat, perusahaan, hubungan, pasien.nama as nama_pasien, pasien.no_pasien');
		$this->db->from('penanggung');
		$this->db->join('pasien', 'penanggung.id_pasien = pasien.id');
		$this->db->where('pasien.no_pasien', $no_pasien);
		$this->db->where('penanggung.hapus', '0');
		$query = $this->db->get();
    	return !empty($query)?$query->result():false;
	}
	public function rontgen()
	{
		$this->db->select('rontgen.id as id_rontgen, no_pasien, nama, goldarah, gender, tanggal, status');
		$this->db->from('rontgen');
		$this->db->join('pasien', 'rontgen.id_pasien = pasien.id');
		$this->db->where('rontgen.hapus', '0');
		$this->db->order_by('rontgen.id', 'ASC');
		$query = $this->db->get();
    return !empty($query)?$query->result():false;
	}
	public function spirometri()
	{
		$this->db->select('spirometri.id as id_spirometri, no_pasien, nama, goldarah, gender, tanggal, status');
		$this->db->from('spirometri');
		$this->db->join('pasien', 'spirometri.id_pasien = pasien.id');
		$this->db->where('spirometri.hapus', '0');
		$this->db->order_by('spirometri.id', 'ASC');
		$query = $this->db->get();
    return !empty($query)?$query->result():false;
	}
	public function usg()
	{
		$this->db->select('audiometri.id as id_audiometri, no_pasien, nama, goldarah, gender, tanggal, status');
		$this->db->from('audiometri');
		$this->db->join('pasien', 'audiometri.id_pasien = pasien.id');
		$this->db->where('audiometri.hapus', '0');
		$this->db->order_by('audiometri.id', 'ASC');
		$query = $this->db->get();
    return !empty($query)?$query->result():false;
	}
	public function ekg()
	{
		$this->db->select('ekg.id as id_ekg, no_pasien, nama, goldarah, gender, tanggal, status');
		$this->db->from('ekg');
		$this->db->join('pasien', 'ekg.id_pasien = pasien.id');
		$this->db->where('ekg.hapus', '0');
		$this->db->order_by('ekg.id', 'ASC');
		$query = $this->db->get();
    return !empty($query)?$query->result():false;
	}
	public function rekam_medis()
	{
		$this->db->select('no_pasien, pasien.nama as nama_pasien, users.nama as nama_dokter, keluhan, diagnosa, tindakan, rekammedis.tanggal as tgl_daftar, obat.nama as nama_obat');
		$this->db->from('rekammedis');
		$this->db->join('pasien', 'rekammedis.id_pasien = pasien.id');
		$this->db->join('users', 'rekammedis.id_dokter = users.id');
		$this->db->join('obat', 'rekammedis.id_obat = obat.id');
		$this->db->where('users.jabatan', 'Dokter');
		$this->db->where('rekammedis.hapus', '0');
		$query = $this->db->get();
    return !empty($query)?$query->result():false;
	}
}
