<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{

		$this->load_view('Vhome');
	}

}

/* End of file HomeController.php */
/* Location: ./application/controllers/HomeController.php */