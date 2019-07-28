<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelahiranController extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url']);
		$this->load->model(['Mkelahiran', 'Mpenduduk']);
	}

	public function index()
	{
		$data = [
			'penduduk' => $this->Mpenduduk->get(),
		];

		$this->load_view('Vkelahiran', $data);
	}

	public function get_data()
	{
		$kelahiran = $this->Mkelahiran->get();

		$data['data'] = $kelahiran;

		header('application/json');
		echo json_encode($data);
		
	}

	public function insert()
	{
		$data = $this->input->post();

		if ($this->Mkelahiran->insert($data)) {
			redirect('kelahiran','refresh');
		}
		else {
			return false;
		}
	}

	public function update()
	{
		$data = $this->input->post();
		$id_kelahiran = $this->input->post('id_kelahiran');

		if ($this->Mkelahiran->update($id_kelahiran, $data)) {
			redirect('kelahiran','refresh');
		}
		else {
			return false;
		}
	}

	public function delete($id)
	{

		if ($this->Mkelahiran->delete($id)) {
			redirect('kelahiran','refresh');
		}
		else{
			return false;
		}
	}

}

/* End of file KelahiranController.php */
/* Location: ./application/controllers/KelahiranController.php */