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
	public function penggunaan_obat($id)
	{
		$this->db->where('id_obat', $id);
		$this->db->where('hapus', '0');
		$query = $this->db->get('rekammedis');
    	return !empty($query)?$query->num_rows():'0';
	}
	public function pasien()
	{
		$this->db->where('hapus', '0');
		$query = $this->db->get('pasien');
    return !empty($query)?$query->result_array():false;
	}
	public function pasien_perbulan($bulan)
	{
		$this->db->where('MONTH(created_at)', $bulan);
		$this->db->where('YEAR(created_at)', date('Y'));
		$query = $this->db->get('pasien');
    return !empty($query)?$query->num_rows():'0';
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
    return !empty($query)?$query->result_array():false;
	}
	public function rekam_medis_per_pasien($no_pasien)
	{
		$this->db->select('rekammedis.id, no_pasien, pasien.nama as nama_pasien, users.nama as nama_dokter, pasien.goldarah, tanggal_lahir, pasien.gender, pasien.alamat, keluhan, diagnosa, tindakan, rekammedis.tanggal as tgl_daftar, spesialis, obat.nama as nama_obat');
		$this->db->from('rekammedis');
		$this->db->join('pasien', 'rekammedis.id_pasien = pasien.id');
		$this->db->join('users', 'rekammedis.id_dokter = users.id');
		$this->db->join('obat', 'rekammedis.id_obat = obat.id');
		$this->db->where('pasien.no_pasien', $no_pasien);
		$this->db->where('users.jabatan', 'Dokter');
		$this->db->where('rekammedis.hapus', '0');
		$query = $this->db->get();
    return !empty($query)?$query->row_array():false;
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
	public function per_nama_pasien($nama)
	{
		$this->db->like('nama', $nama);
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
	public function perktp_pasien($ktp)
	{
		$this->db->where('ktp', $ktp);
		$this->db->where('hapus', '0');
		$query = $this->db->get('pasien');
    return !empty($query)?$query->row_array():false;
	}
	public function medical_checkup($table, $no_pasien, $id)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join('pasien', $table.'.id_pasien = pasien.id');
		$this->db->where('pasien.no_pasien', $no_pasien);
		$this->db->where($table.'.id', $id);
		$this->db->where($table.'.hapus', '0');
		$this->db->order_by($table.'.id', 'ASC');
		$query = $this->db->get();
    return !empty($query)?$query->result_array():false;
	}
	public function rontgen()
	{
		$this->db->select('rontgen.id as id_rontgen, no_pasien, nama, goldarah, gender, tanggal, status');
		$this->db->from('rontgen');
		$this->db->join('pasien', 'rontgen.id_pasien = pasien.id');
		$this->db->where('rontgen.hapus', '0');
		$this->db->order_by('rontgen.id', 'ASC');
		$query = $this->db->get();
    return !empty($query)?$query->result_array():false;
	}
	public function rontgen_all($ktp)
	{
		$this->db->select('rontgen.id as id_rontgen, ktp, no_pasien, nama, tanggal, status');
		$this->db->from('rontgen');
		$this->db->join('pasien', 'rontgen.id_pasien = pasien.id');
		$this->db->where('pasien.ktp', $ktp);
		$this->db->where('rontgen.hapus', '0');
		$this->db->where('rontgen.status', 'Selesai');
		$this->db->order_by('rontgen.tanggal', 'DESC');
		$query = $this->db->get();
    return !empty($query)?$query->result_array():false;
	}
	public function per_rontgen($no_pasien, $id)
	{
		$this->db->select('no_pasien, users.nama as nama_dokter, pasien.nama as nama_pasien, spesialis, DATE(rontgen.tanggal), tanggal_lahir, pasien.gender, pasien.alamat, jenis_periksa, rontgen.id as no_rontgen, keterangan, cor, pulmo, costae, sinus, diapragma, kesan');
		$this->db->from('rontgen');
		$this->db->join('pasien', 'rontgen.id_pasien = pasien.id');
		$this->db->join('users', 'rontgen.id_dokter = users.id');
		$this->db->where('rontgen.id', $id);
		$this->db->where('pasien.no_pasien', $no_pasien);
		$this->db->where('rontgen.hapus', '0');
		$this->db->order_by('rontgen.tanggal', 'DESC');
		$this->db->limit('1');
		$query = $this->db->get();
    return !empty($query)?$query->row_array():false;
	}
	public function rontgen_perktp($ktp)
	{
		$this->db->select('*');
		$this->db->from('rontgen');
		$this->db->join('pasien', 'rontgen.id_pasien = pasien.id');
		$this->db->where('pasien.ktp', $ktp);
		$this->db->where('rontgen.hapus', '0');
		$this->db->order_by('rontgen.tanggal', 'DESC');
		$this->db->limit('1');
		$query = $this->db->get();
    return !empty($query)?$query->row_array():false;
	}
	public function spirometri()
	{
		$this->db->select('spirometri.id as id_spirometri, no_pasien, nama, goldarah, gender, tanggal, status');
		$this->db->from('spirometri');
		$this->db->join('pasien', 'spirometri.id_pasien = pasien.id');
		$this->db->where('spirometri.hapus', '0');
		$this->db->order_by('spirometri.id', 'ASC');
		$query = $this->db->get();
    return !empty($query)?$query->result_array():false;
	}
	public function spirometri_all($ktp)
	{
		$this->db->select('spirometri.id as id_spirometri, ktp, no_pasien, nama, tanggal, status');
		$this->db->from('spirometri');
		$this->db->join('pasien', 'spirometri.id_pasien = pasien.id');
		$this->db->where('pasien.ktp', $ktp);
		$this->db->where('spirometri.hapus', '0');
		$this->db->where('spirometri.status', 'Selesai');
		$this->db->order_by('spirometri.tanggal', 'DESC');
		$query = $this->db->get();
    return !empty($query)?$query->result_array():false;
	}
	public function per_spirometri($no_pasien, $id)
	{
		$this->db->select('no_pasien, users.nama as nama_dokter, pasien.nama as nama_pasien, spesialis, DATE(spirometri.tanggal), tanggal_lahir, pasien.gender, pasien.alamat, nilai_prediksi, spirometri.id as no_spirometri, keterangan, kvp, vep, ape, kesan');
		$this->db->from('spirometri');
		$this->db->join('pasien', 'spirometri.id_pasien = pasien.id');
		$this->db->join('users', 'spirometri.id_dokter = users.id');
		$this->db->where('spirometri.id', $id);
		$this->db->where('pasien.no_pasien', $no_pasien);
		$this->db->where('spirometri.hapus', '0');
		$this->db->order_by('spirometri.tanggal', 'DESC');
		$this->db->limit('1');
		$query = $this->db->get();
    return !empty($query)?$query->row_array():false;
	}
	public function spirometri_perktp($ktp)
	{
		$this->db->select('*');
		$this->db->from('spirometri');
		$this->db->join('pasien', 'spirometri.id_pasien = pasien.id');
		$this->db->where('pasien.ktp', $ktp);
		$this->db->where('spirometri.hapus', '0');
		$this->db->order_by('spirometri.tanggal', 'DESC');
		$this->db->limit('1');
		$query = $this->db->get();
    return !empty($query)?$query->row_array():false;
	}
	public function usg()
	{
		$this->db->select('usg.id as id_usg, no_pasien, nama, goldarah, gender, tanggal, status');
		$this->db->from('usg');
		$this->db->join('pasien', 'usg.id_pasien = pasien.id');
		$this->db->where('usg.hapus', '0');
		$this->db->order_by('usg.id', 'ASC');
		$query = $this->db->get();
    return !empty($query)?$query->result_array():false;
	}
	public function usg_all($ktp)
	{
		$this->db->select('usg.id as id_usg, ktp, no_pasien, nama, tanggal, status');
		$this->db->from('usg');
		$this->db->join('pasien', 'usg.id_pasien = pasien.id');
		$this->db->where('pasien.ktp', $ktp);
		$this->db->where('usg.hapus', '0');
		$this->db->where('usg.status', 'Selesai');
		$this->db->order_by('usg.tanggal', 'DESC');
		$query = $this->db->get();
    return !empty($query)?$query->result_array():false;
	}
	public function per_usg($no_pasien, $id)
	{
		$this->db->select('no_pasien, users.nama as nama_dokter, pasien.nama as nama_pasien, spesialis, DATE(usg.tanggal), tanggal_lahir, pasien.gender, pasien.alamat, usg.id as no_usg, hepar, empedu, pankreas, lien, ginjal, bulibuli, prostat, kesan, keterangan');
		$this->db->from('usg');
		$this->db->join('pasien', 'usg.id_pasien = pasien.id');
		$this->db->join('users', 'usg.id_dokter = users.id');
		$this->db->where('usg.id', $id);
		$this->db->where('pasien.no_pasien', $no_pasien);
		$this->db->where('usg.hapus', '0');
		$this->db->order_by('usg.tanggal', 'DESC');
		$this->db->limit('1');
		$query = $this->db->get();
    return !empty($query)?$query->row_array():false;
	}
	public function usg_perktp($ktp)
	{
		$this->db->select('*');
		$this->db->from('usg');
		$this->db->join('pasien', 'usg.id_pasien = pasien.id');
		$this->db->where('pasien.ktp', $ktp);
		$this->db->where('usg.hapus', '0');
		$this->db->order_by('usg.tanggal', 'DESC');
		$this->db->limit('1');
		$query = $this->db->get();
    return !empty($query)?$query->row_array():false;
	}
	public function ekg()
	{
		$this->db->select('ekg.id as id_ekg, no_pasien, nama, goldarah, gender, tanggal, status');
		$this->db->from('ekg');
		$this->db->join('pasien', 'ekg.id_pasien = pasien.id');
		$this->db->where('ekg.hapus', '0');
		$this->db->order_by('ekg.id', 'ASC');
		$query = $this->db->get();
    return !empty($query)?$query->result_array():false;
	}
	public function ekg_all($ktp)
	{
		$this->db->select('ekg.id as id_ekg, ktp, no_pasien, nama, tanggal, status');
		$this->db->from('ekg');
		$this->db->join('pasien', 'ekg.id_pasien = pasien.id');
		$this->db->where('pasien.ktp', $ktp);
		$this->db->where('ekg.hapus', '0');
		$this->db->where('ekg.status', 'Selesai');
		$this->db->order_by('ekg.tanggal', 'DESC');
		$query = $this->db->get();
    return !empty($query)?$query->result_array():false;
	}
	public function per_ekg($no_pasien, $id)
	{
		$this->db->select('no_pasien, users.nama as nama_dokter, pasien.nama as nama_pasien, spesialis, DATE(ekg.tanggal), tanggal_lahir, pasien.gender, pasien.alamat, ekg.id as no_ekg, irama, axis, rate, kelainan, kesimpulan, keterangan, saran');
		$this->db->from('ekg');
		$this->db->join('pasien', 'ekg.id_pasien = pasien.id');
		$this->db->join('users', 'ekg.id_dokter = users.id');
		$this->db->where('ekg.id', $id);
		$this->db->where('pasien.no_pasien', $no_pasien);
		$this->db->where('ekg.hapus', '0');
		$this->db->order_by('ekg.tanggal', 'DESC');
		$this->db->limit('1');
		$query = $this->db->get();
    return !empty($query)?$query->row_array():false;
	}
	public function ekg_perktp($ktp)
	{
		$this->db->select('*');
		$this->db->from('ekg');
		$this->db->join('pasien', 'ekg.id_pasien = pasien.id');
		$this->db->where('pasien.ktp', $ktp);
		$this->db->where('ekg.hapus', '0');
		$this->db->order_by('ekg.tanggal', 'DESC');
		$this->db->limit('1');
		$query = $this->db->get();
    return !empty($query)?$query->row_array():false;
	}
}
