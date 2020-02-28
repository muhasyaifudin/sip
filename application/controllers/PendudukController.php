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

		$this->form_validation->set_data($data);
        $this->form_validation->set_rules(
            'nik', 
            'NIK', 
            'required|is_unique[tabel_penduduk.nik]',
            [
                'required'      => '%s wajib diisi.',
                'is_unique'     => '%s sudah ada.'
            ]
        );

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error_message', validation_errors());

            redirect('admin/penduduk','refresh');
        }


		if ($this->Mpenduduk->insert($data)) {
			redirect('admin/penduduk','refresh');
		}
		else {
			$this->session->set_flashdata('error_message', 'Data gagal disimpan');
		}
	}

	public function update()
	{
		$data = $this->input->post();
		$id_penduduk = $this->input->post('id');

		$penduduk = $this->Mpenduduk->get($id_penduduk);

		$is_unique = '';
        if(strtolower($data['nik']) != strtolower($penduduk->nik)) {
            $is_unique =  '|is_unique[tabel_penduduk.nik]';
        } else {
            $is_unique =  '';
        }
        
        $this->form_validation->set_data($data);

        $this->form_validation->set_rules(
            'nik', 
            'NIK', 
            'required'.$is_unique,
            [
                'required'      => '%s wajib diisi.',
                'is_unique'     => '%s sudah ada.'
            ]
        );

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error_message', validation_errors());

            redirect('admin/penduduk','refresh');
        }

		if ($this->Mpenduduk->update($id_penduduk, $data)) {
			redirect('admin/penduduk','refresh');
		}
		else {
			$this->session->set_flashdata('error_message', 'Data gagal disimpan');
			redirect('admin/penduduk','refresh');
		}
	}

	public function delete($id)
	{

		if ($this->Mpenduduk->delete($id)) {
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

}

/* End of file PendudukController.php */
/* Location: ./application/controllers/PendudukController.php */