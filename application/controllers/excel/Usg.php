<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usg extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('excel');
    }

    public function index() {
        $data = array(
            'title' => 'Data USG',
            'data' => $this->excel->usg()
        );
        $this->load->view('excel/usg',$data);
    }

}