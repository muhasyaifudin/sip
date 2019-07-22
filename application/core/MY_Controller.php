<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->library(['ion_auth']);
		
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('login', 'refresh');
		}
	}

	public function load_view($v, $data = [])
	{
		
		$data = array(
			// "title" => $v['title'],
			"content" => $v,
			"data" => $data,
		);	

		$this->load->view('Vmaster', $data);
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */