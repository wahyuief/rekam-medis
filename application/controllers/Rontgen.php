<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rontgen extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('mdata');
    }
	public function list($nik)
	{
		$data = array(
			'page' => 'dashboard',
            'title' => 'Dashboard',
            'data' => $this->mdata->rontgen_all($nik)
		);
		$this->load->view('public/rontgen', $data);
	}
	public function print($nik, $id)
	{
		$this->load->library('pdf');
		$data['rontgen'] = $this->mdata->per_rontgen($nik, $id);
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "report-data-rekam-medis.pdf";
    $this->pdf->load_view('print_rontgen', $data);
	}
}
