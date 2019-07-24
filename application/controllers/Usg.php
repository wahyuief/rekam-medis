<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usg extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->model('mdata');
		$this->load->helper('umur');
    }
	public function list($nik)
	{
		$data = array(
			'page' => 'dashboard',
            'title' => 'Dashboard',
            'data' => $this->mdata->usg_all($nik)
		);
		$this->load->view('public/usg', $data);
	}
	public function print_file($nik, $id)
	{
		$this->load->library('pdf');
		$data['usg'] = $this->mdata->per_usg($nik, $id);
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "report-data-rekam-medis.pdf";
    $this->pdf->load_view('print_usg', $data);
	}
}
