<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtambah extends CI_Model {
	public function pegawai($data)
	{
		return ($this->db->insert('users', $data))?true:false;
	}
	public function dokter($data)
	{
		return ($this->db->insert('users', $data))?true:false;
	}
	public function obat($data)
	{
		return ($this->db->insert('obat', $data))?true:false;
	}
	public function pasien($data)
	{
		return ($this->db->insert('pasien', $data))?true:false;
	}
	public function penanggung($data)
	{
		return ($this->db->insert('penanggung', $data))?true:false;
	}
	public function checkup($table, $data)
	{
		return ($this->db->insert($table, $data))?true:false;
	}
	public function rekam_medis($data)
	{
		return ($this->db->insert('rekammedis', $data))?true:false;
	}
}
