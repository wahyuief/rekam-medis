<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekam_medis extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('excel');
    }

    public function index() {
        $data = array(
            'title' => 'Data Rekam Medis',
            'data' => $this->excel->rekam_medis()
        );
        $this->load->view('excel/rekam_medis',$data);
    }

}