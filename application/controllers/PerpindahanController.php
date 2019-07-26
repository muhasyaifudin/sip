<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerpindahanController extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url']);
		$this->load->model(['Mperpindahan', 'Mpenduduk']);
	}

	public function index()
	{
		$data = [
			'penduduk' => $this->Mpenduduk->get(),
		];

		$this->load_view('Vperpindahan', $data);
	}

	public function get_data()
	{
		$perpindahan = $this->Mperpindahan->get();

		$data['data'] = $perpindahan;

		header('application/json');
		echo json_encode($data);
		
	}

	public function insert()
	{
		$data = $this->input->post();

		if ($this->Mperpindahan->insert($data)) {
			redirect('perpindahan','refresh');
		}
		else {
			return false;
		}
	}

	public function update()
	{
		$data = $this->input->post();
		$id_perpindahan = $this->input->post('id_perpindahan');

		if ($this->Mperpindahan->update($id_perpindahan, $data)) {
			redirect('perpindahan','refresh');
		}
		else {
			return false;
		}
	}

	public function delete($id)
	{

		if ($this->Mperpindahan->delete($id)) {
			redirect('perpindahan','refresh');
		}
		else{
			return false;
		}
	}

}

/* End of file PerpindahanController.php */
/* Location: ./application/controllers/PerpindahanController.php */