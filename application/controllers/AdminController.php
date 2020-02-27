<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mdashboard');
	}

	public function index()
	{

		$data = [
			'total_penduduk' => $this->Mdashboard->get_total_penduduk(),
			'total_kematian' => $this->Mdashboard->get_total_kematian(),
			'total_kedatangan' => $this->Mdashboard->get_total_kedatangan(),
			'total_perpindahan' => $this->Mdashboard->get_total_perpindahan(),
		];

		$this->load_view('Vhome', $data);
	}

}

/* End of file HomeController.php */
/* Location: ./application/controllers/HomeController.php */