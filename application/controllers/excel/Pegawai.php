<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('excel');
    }

    public function index() {
        $data = array(
            'title' => 'Data Pegawai',
            'data' => $this->excel->pegawai()
        );
        $this->load->view('excel/pegawai',$data);
    }

}