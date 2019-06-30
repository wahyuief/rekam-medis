<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mupdate extends CI_Model {
	public function profile($data, $where)
	{
		return ($this->db->update('users', $data, $where))?true:false;
	}
	public function pegawai($data, $id)
	{
		return ($this->db->update('users', $data, ['id' => $id]))?true:false;
	}
	public function dokter($data, $id)
	{
		return ($this->db->update('users', $data, ['id' => $id]))?true:false;
	}
	public function obat($data, $id)
	{
		return ($this->db->update('obat', $data, ['id' => $id]))?true:false;
	}
	public function pasien($data, $id)
	{
		return ($this->db->update('pasien', $data, ['no_pasien' => $id]))?true:false;
	}
	public function penanggung($data, $id)
	{
		return ($this->db->update('penanggung', $data, ['id' => $id]))?true:false;
	}
	public function checkup($data, $id)
	{
		return ($this->db->update('checkup', $data, ['id_pasien' => $id]))?true:false;
	}
	public function rekam_medis($data, $id)
	{
		return ($this->db->update('rekammedis', $data, ['id' => $id]))?true:false;
	}
	public function rontgen($data, $id)
	{
		return ($this->db->update('rontgen', $data, ['id' => $id]))?true:false;
	}
	public function spirometri($data, $id)
	{
		return ($this->db->update('spirometri', $data, ['id' => $id]))?true:false;
	}
	public function audiometri($data, $id)
	{
		return ($this->db->update('audiometri', $data, ['id' => $id]))?true:false;
	}
	public function ekg($data, $id)
	{
		return ($this->db->update('ekg', $data, ['id' => $id]))?true:false;
	}
}
