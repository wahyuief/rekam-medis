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
}
