<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kartu extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->model('mdata');
		$this->load->helper('umur');
		if (!$this->session->has_userdata('medhicallya')) {
			redirect(base_url('masuk'));
		}
    }
	public function index()
	{
		redirect(base_url('dashboard'));
	}
	public function pasien($id)
	{
        $this->load->library('pdf');
		$data['data'] = $this->mdata->per_pasien($id);
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "kartu-pasien.pdf";
        $this->pdf->load_view('print_kartupasien', $data);
    }
}