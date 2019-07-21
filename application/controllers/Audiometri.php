<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audiometri extends CI_Controller {
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
            'data' => $this->mdata->audiometri_all($nik)
		);
		$this->load->view('public/audiometri', $data);
	}
	public function print($nik, $id)
	{
		$this->load->library('pdf');
		$data['audiometri'] = $this->mdata->per_audiometri($nik, $id);
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "report-data-rekam-medis.pdf";
    $this->pdf->load_view('print_audiometri', $data);
	}
}
