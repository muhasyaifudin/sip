<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{

		$this->load_view('public/Vhome');

	}

	public function load_view($v, $data = [])
	{
		$data = array(
			// "title" => $v['title'],
			"content" => $v,
			"data" => $data,
		);

		$this->load->view('layout/Vmaster_public', $data);
	}

}

/* End of file HomeController.php */
/* Location: ./application/controllers/HomeController.php */