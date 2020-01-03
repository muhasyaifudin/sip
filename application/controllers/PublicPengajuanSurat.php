<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PublicPengajuanSurat extends CI_Controller {

	public function index()
	{
		$this->load_view('public/Vpengajuan_surat');

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

/* End of file PublicPengajuanSurat.php */
/* Location: ./application/controllers/PublicPengajuanSurat.php */