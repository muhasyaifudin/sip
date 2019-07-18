<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		redirect('/','refresh');
	}

	public function logout()
	{
		redirect('login', 'refresh');
	}

}

/* End of file LoginController.php */
/* Location: ./application/controllers/LoginController.php */