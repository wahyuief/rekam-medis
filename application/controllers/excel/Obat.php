<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('excel');
    }

    public function index() {
        $data = array(
            'title' => 'Data Obat',
            'data' => $this->excel->obat()
        );
        $this->load->view('excel/obat',$data);
    }

}