<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdata extends CI_Model {
	public function profile($userid)
	{
		$this->db->where('id', $userid);
		$query = $this->db->get('users');
    return !empty($query)?$query->row_array():false;
	}
	public function pegawai()
	{
		$this->db->where('jabatan !=', 'dokter');
		$this->db->where('hapus', '0');
		$query = $this->db->get('users');
    return !empty($query)?$query->result_array():false;
	}
	public function dokter()
	{
		$this->db->where('jabatan', 'dokter');
		$this->db->where('hapus', '0');
		$query = $this->db->get('users');
    return !empty($query)?$query->result_array():false;
	}
	public function obat()
	{
		$this->db->where('hapus', '0');
		$query = $this->db->get('obat');
    return !empty($query)?$query->result_array():false;
	}
	public function pasien()
	{
		$this->db->where('hapus', '0');
		$query = $this->db->get('pasien');
    return !empty($query)?$query->result_array():false;
	}
	public function penanggung($no_pasien)
	{
		$this->db->select('penanggung.id, penanggung.ktp, penanggung.nama, penanggung.pekerjaan, penanggung.gender, penanggung.phone, penanggung.alamat, perusahaan, hubungan, pasien.nama as nama_pasien, pasien.no_pasien');
		$this->db->from('penanggung');
		$this->db->join('pasien', 'penanggung.id_pasien = pasien.id');
		$this->db->where('pasien.no_pasien', $no_pasien);
		$this->db->where('penanggung.hapus', '0');
		$query = $this->db->get();
    return !empty($query)?$query->result_array():false;
	}
	public function no_pasien()
	{
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('pasien');
    return !empty($query)?$query->row_array()['no_pasien']:false;
	}
	public function per_pegawai($id)
	{
		$this->db->where('id', $id);
		$this->db->where('jabatan !=', 'dokter');
		$this->db->where('hapus', '0');
		$query = $this->db->get('users');
    return !empty($query)?$query->row_array():false;
	}
	public function per_dokter($id)
	{
		$this->db->where('id', $id);
		$this->db->where('jabatan', 'dokter');
		$this->db->where('hapus', '0');
		$query = $this->db->get('users');
    return !empty($query)?$query->row_array():false;
	}
	public function per_obat($id)
	{
		$this->db->where('id', $id);
		$this->db->where('hapus', '0');
		$query = $this->db->get('obat');
    return !empty($query)?$query->row_array():false;
	}
	public function per_pasien($id)
	{
		$this->db->where('no_pasien', $id);
		$this->db->where('hapus', '0');
		$query = $this->db->get('pasien');
    return !empty($query)?$query->row_array():false;
	}
	public function per_penanggung($id)
	{
		$this->db->where('id', $id);
		$this->db->where('hapus', '0');
		$query = $this->db->get('penanggung');
    return !empty($query)?$query->row_array():false;
	}
	public function check_pegawai($id)
	{
		$this->db->where('id', $id);
		$this->db->where('jabatan !=', 'dokter');
		$this->db->where('hapus', '0');
		$query = $this->db->get('users');
    return ($query->num_rows() > 0)?true:false;
	}
	public function check_dokter($id)
	{
		$this->db->where('id', $id);
		$this->db->where('jabatan', 'dokter');
		$this->db->where('hapus', '0');
		$query = $this->db->get('users');
    return ($query->num_rows() > 0)?true:false;
	}
	public function check_obat($id)
	{
		$this->db->where('id', $id);
		$this->db->where('hapus', '0');
		$query = $this->db->get('obat');
    return ($query->num_rows() > 0)?true:false;
	}
	public function check_pasien($id)
	{
		$this->db->where('no_pasien', $id);
		$this->db->where('hapus', '0');
		$query = $this->db->get('pasien');
    return ($query->num_rows() > 0)?true:false;
	}
	public function check_penanggung($no_pasien, $id)
	{
		$this->db->select('penanggung.id, pasien.no_pasien');
		$this->db->from('penanggung');
		$this->db->join('pasien', 'penanggung.id_pasien = pasien.id');
		$this->db->where('pasien.no_pasien', $no_pasien);
		$this->db->where('penanggung.id', $id);
		$this->db->where('penanggung.hapus', '0');
		$query = $this->db->get();
    return ($query->num_rows() > 0)?true:false;
	}
	public function count_checkup($no_pasien)
	{
		$this->db->select('checkup.id, pasien.no_pasien');
		$this->db->from('checkup');
		$this->db->join('pasien', 'checkup.id_pasien = pasien.id');
		$this->db->where('pasien.no_pasien', $no_pasien);
		$this->db->where('checkup.hapus', '0');
		$query = $this->db->get();
    return ($query->num_rows() > 0)?true:false;
	}
	public function count_data($table)
	{
		$this->db->where('hapus', '0');
		$query = $this->db->get($table);
		return ($query->num_rows() > 0)?$query->num_rows():'0';
	}
	public function count_dokter()
	{
		$this->db->where('jabatan', 'dokter');
		$this->db->where('hapus', '0');
		$query = $this->db->get('users');
		return ($query->num_rows() > 0)?$query->num_rows():'0';
	}
	public function count_pegawai()
	{
		$this->db->where('jabatan !=', 'dokter');
		$this->db->where('hapus', '0');
		$query = $this->db->get('users');
		return ($query->num_rows() > 0)?$query->num_rows():'0';
	}
	public function check_current($password)
	{
		$this->db->where('password', $password);
		$query = $this->db->get('users');
    return ($query->num_rows() > 0)?true:false;
	}
	public function cari_pasien($nama)
	{
		$this->db->like('nama', $nama);
		$this->db->where('hapus', '0');
		$this->db->limit(10);
		$query = $this->db->get('pasien');
    return !empty($query)?$query->result_array():false;
	}
	public function checkup_per_pasien($ktp)
	{
		$this->db->select('*');
		$this->db->from('checkup');
		$this->db->join('pasien', 'checkup.id_pasien = pasien.id');
		$this->db->where('pasien.ktp', $ktp);
		$this->db->where('checkup.hapus', '0');
		$query = $this->db->get();
    return !empty($query)?$query->row_array():false;
	}
	public function rontgen()
	{
		$this->db->select('*');
		$this->db->from('checkup');
		$this->db->join('pasien', 'checkup.id_pasien = pasien.id');
		$this->db->where('rontgen', '1');
		$this->db->where('checkup.hapus', '0');
		$query = $this->db->get();
    return !empty($query)?$query->result_array():false;
	}
	public function spirometri()
	{
		$this->db->select('*');
		$this->db->from('checkup');
		$this->db->join('pasien', 'checkup.id_pasien = pasien.id');
		$this->db->where('spirometri', '1');
		$this->db->where('checkup.hapus', '0');
		$query = $this->db->get();
    return !empty($query)?$query->result_array():false;
	}
	public function audiometri()
	{
		$this->db->select('*');
		$this->db->from('checkup');
		$this->db->join('pasien', 'checkup.id_pasien = pasien.id');
		$this->db->where('audiometri', '1');
		$this->db->where('checkup.hapus', '0');
		$query = $this->db->get();
    return !empty($query)?$query->result_array():false;
	}
	public function ekg()
	{
		$this->db->select('*');
		$this->db->from('checkup');
		$this->db->join('pasien', 'checkup.id_pasien = pasien.id');
		$this->db->where('ekg', '1');
		$this->db->where('checkup.hapus', '0');
		$query = $this->db->get();
    return !empty($query)?$query->result_array():false;
	}
}
