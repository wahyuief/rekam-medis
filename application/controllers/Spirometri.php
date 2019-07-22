<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spirometri extends CI_Controller {
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
            'data' => $this->mdata->spirometri_all($nik)
		);
		$this->load->view('public/spirometri', $data);
	}
	public function print_file($nik, $id)
	{
		$this->load->library('pdf');
		$data['spirometri'] = $this->mdata->per_spirometri($nik, $id);
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "report-data-rekam-medis.pdf";
    $this->pdf->load_view('print_spirometri', $data);
	}
}
