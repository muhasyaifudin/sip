<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PendudukController extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url']);
		$this->load->model(['Mpenduduk']);
	}

	public function index()
	{
		$this->load_view('Vpenduduk');
	}

	public function get_data()
	{
		$penduduk = [];
		$filter = $this->input->get('filter');
		if ($filter == 1) {
			$penduduk = $this->Mpenduduk->get();
		}
		else if ($filter == 2) {
			$penduduk = $this->Mpenduduk->get_where_not_pindah_meninggal();
		}
		else if ($filter == 3) {
			$penduduk = $this->Mpenduduk->get_where_meninggal();
		}
		else if ($filter == 4) {
			$penduduk = $this->Mpenduduk->get_where_pindah();
		}
		else {
			$penduduk = $this->Mpenduduk->get();
		}
		

		$data['data'] = $penduduk;

		header('application/json');
		echo json_encode($data);
		
	}

	public function insert()
	{
		$data = $this->input->post();

		if ($this->Mpenduduk->insert($data)) {
			redirect('admin/penduduk','refresh');
		}
		else {
			return false;
		}
	}

	public function update()
	{
		$data = $this->input->post();
		$id_penduduk = $this->input->post('id');

		if ($this->Mpenduduk->update($id_penduduk, $data)) {
			redirect('admin/penduduk','refresh');
		}
		else {
			return false;
		}
	}

	public function delete($id)
	{

		if ($this->Mpenduduk->delete($id)) {
			redirect('admin/penduduk','refresh');
		}
		else{
			return false;
		}
	}

}

/* End of file PendudukController.php */
/* Location: ./application/controllers/PendudukController.php */