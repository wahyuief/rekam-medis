<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spirometri extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('excel');
    }

    public function index() {
        $data = array(
            'title' => 'Data Spirometri',
            'data' => $this->excel->spirometri()
        );
        $this->load->view('excel/spirometri',$data);
    }

}