<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PendudukController extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
		$this->load_view('Vpenduduk');
	}

}

/* End of file PendudukController.php */
/* Location: ./application/controllers/PendudukController.php */