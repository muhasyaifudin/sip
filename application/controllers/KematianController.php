<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KematianController extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url']);
		$this->load->model(['Mkematian', 'Mpenduduk']);
	}

	public function index()
	{
		$data = [
			'penduduk' => $this->Mpenduduk->get_where_not_pindah_meninggal(),
		];

		$this->load_view('Vkematian', $data);
	}

	public function get_data()
	{
		$kematian = $this->Mkematian->get();

		$data['data'] = $kematian;

		header('application/json');
		echo json_encode($data);
		
	}

	public function insert()
	{
		$data = $this->input->post();

		if ($this->Mkematian->insert($data)) {
			redirect('admin/kematian','refresh');
		}
		else {
			return false;
		}
	}

	public function update()
	{
		$data = $this->input->post();
		$id_kematian = $this->input->post('id_kematian');

		if ($this->Mkematian->update($id_kematian, $data)) {
			redirect('admin/kematian','refresh');
		}
		else {
			return false;
		}
	}

	public function delete($id)
	{

		if ($this->Mkematian->delete($id)) {
			redirect('admin/kematian','refresh');
		}
		else{
			return false;
		}
	}

}

/* End of file KematianController.php */
/* Location: ./application/controllers/KematianController.php */