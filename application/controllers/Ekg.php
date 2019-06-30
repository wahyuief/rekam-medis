<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekg extends CI_Controller {
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
            'data' => $this->mdata->ekg_all($nik)
		);
		$this->load->view('public/ekg', $data);
	}
	public function print($nik, $id)
	{
		$this->load->library('pdf');
		$data['ekg'] = $this->mdata->per_ekg($nik, $id);
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "report-data-rekam-medis.pdf";
    $this->pdf->load_view('print_ekg', $data);
	}
}
