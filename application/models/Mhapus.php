<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhapus extends CI_Model {
	public function pegawai($id)
	{
		return ($this->db->update('users', ['hapus' => '1'], ['id' => $id]))?true:false;
	}
	public function dokter($id)
	{
		return ($this->db->update('users', ['hapus' => '1'], ['id' => $id]))?true:false;
	}
	public function obat($id)
	{
		return ($this->db->update('obat', ['hapus' => '1'], ['id' => $id]))?true:false;
	}
	public function pasien($id)
	{
		return ($this->db->update('pasien', ['hapus' => '1'], ['no_pasien' => $id]))?true:false;
	}
}
