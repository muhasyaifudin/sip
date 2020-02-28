<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfilController extends CI_Controller {

	public function visi_misi()
	{
		$this->load_view('public/Vvisimisi');
	}

	public function potensi()
	{
		$this->load_view('public/Vpotensi');
	}

	public function struktur()
	{
		$this->load_view('public/Vorganisasi');
		
	}

	public function sejarah()
	{
		
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

/* End of file ProfilController.php */
/* Location: ./application/controllers/ProfilController.php */