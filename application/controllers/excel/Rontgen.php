<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rontgen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('excel');
    }

    public function index() {
        $data = array(
            'title' => 'Data Rontgen',
            'data' => $this->excel->rontgen()
        );
        $this->load->view('excel/rontgen',$data);
    }

}