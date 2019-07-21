<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('excel');
    }

    public function index() {
        $data = array(
            'title' => 'Data Pasien',
            'data' => $this->excel->pasien()
        );
        $this->load->view('excel/pasien',$data);
    }

}