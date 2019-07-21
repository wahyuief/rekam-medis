<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('excel');
    }

    public function index() {
        $data = array(
            'title' => 'Data Dokter',
            'data' => $this->excel->dokter()
        );
        $this->load->view('excel/dokter',$data);
    }

}