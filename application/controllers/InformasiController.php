<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InformasiController extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Minformasi');
	}

	public function index()
	{
		$this->load_view('Vinformasi');
	}

	public function get_data()
	{
		$data['data'] = $this->Minformasi->get_by_status($this->input->get('filter'));

		header('application/json');
		echo json_encode($data);
	}

	public function insert()
	{
		$data = $this->input->post();

		if ($this->Minformasi->insert($data)) {
			redirect('admin/informasi','refresh');
		}
		else {
			return false;
		}
	}

	public function update()
	{
		$data = $this->input->post();
		$id = $this->input->post('id');

		$res = $this->Minformasi->update($id, $data);

		// var_dump ($id);
		// die();/

		if ($res) {
			redirect('admin/informasi','refresh');
		}
		else {
			var_dump($data);
		}
	}

	public function delete($id)
	{
		if ($this->Minformasi->delete($id)) {
			header('Content-Type: application/json');
			$return = [
				'code' => 200,
				'data' => $id
			];

			echo json_encode($return);
		}
		else{
			header('Content-Type: application/json');

			$return = [
				'code' => 400,
				'data' => []
			];

			echo json_encode($return);

		}
	}

	public function nonaktifkan($id)
	{

		$res = $this->Minformasi->update($id, ['aktif' => 0]);

		if ($res) {
			header('Content-Type: application/json');
			$return = [
				'code' => 200,
				'data' => $res
			];

			echo json_encode($return);
		}
		else{
			header('Content-Type: application/json');

			$return = [
				'code' => 400,
				'data' => []
			];

			echo json_encode($return);

		}
	}

	public function aktifkan($id)
	{

		$res = $this->Minformasi->update($id, ['aktif' => 1]);

		if ($res) {
			header('Content-Type: application/json');
			$return = [
				'code' => 200,
				'data' => $res
			];

			echo json_encode($return);
		}
		else{
			header('Content-Type: application/json');

			$return = [
				'code' => 400,
				'data' => []
			];

			echo json_encode($return);

		}
	}

}

/* End of file InformasiController.php */
/* Location: ./application/controllers/InformasiController.php */