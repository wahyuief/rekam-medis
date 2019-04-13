<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mauth extends CI_Model {
	public function masuk($nip, $password)
	{
    $query = $this->db->get_where('users', ['nip'=>$nip,'password'=>sha1($password)], 1);
    return ($query->num_rows() > 0) ? $query->row_array() : FALSE;
	}
}
