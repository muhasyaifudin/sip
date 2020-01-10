<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KedatanganController extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url']);
		$this->load->model(['Mkedatangan', 'Mpenduduk', 'Mtujuan_kedatangan', 'Masal_kedatangan']);
	}

	public function index()
	{
		$data = [
			'penduduk' => $this->Mpenduduk->get_where_not_pindah_meninggal(),
		];

		$this->load_view('Vkedatangan', $data);
	}

	public function get_data()
	{
		$kedatangan = $this->Mkedatangan->get();

		$data['data'] = $kedatangan;

		header('application/json');

		echo json_encode($data);
		
	}

	public function insert()
	{
		$data = $this->input->post();

		$penduduk = $this->Mpenduduk->get($data['id_penduduk']);

		$data_tujuan = [
			'alamat' => $data['tujuan_alamat'],
			'rt' => $data['tujuan_rt'],
			'rw' => $data['tujuan_rw'],

		];

		$res_tujuan = $this->Mtujuan_kedatangan->insert($data_tujuan);

		$data_asal = [
			'alamat' => $data['asal_alamat'],
			'rt' => $data['asal_rt'],
			'rw' => $data['asal_rw'],
			'desa' => $data['asal_desa'],
			'kecamatan' => $data['asal_kecamatan'],
			'kabupaten_kota' => $data['asal_kabupaten_kota'],
		];

		$res_asal = $this->Masal_kedatangan->insert($data_asal);


		$data_kedatangan = [
			'no_surat' => $data['no_surat'],
			'tanggal_surat' => $data['tanggal_surat'],
			'id_klasifikasi' => 1,
			'id_penduduk' => $data['id_penduduk'],
			'id_asalkedatangan' => $res_asal->id,
			'id_tujuankedatangan' => $res_tujuan->id,

		];

		if ($this->Mkedatangan->insert($data_kedatangan)) {
			redirect('admin/kedatangan','refresh');
		}
		else {
			return false;
		}
	}

	public function update()
	{
		$data = $this->input->post();

		$data_tujuan = [
			'alamat' => $data['tujuan_alamat'],
			'rt' => $data['tujuan_rt'],
			'rw' => $data['tujuan_rw'],

		];

		$res_tujuan = $this->Mtujuan_kedatangan->update($data['id_tujuankedatangan'], $data_tujuan);

		$data_asal = [
			'alamat' => $data['asal_alamat'],
			'rt' => $data['asal_rt'],
			'rw' => $data['asal_rw'],
			'desa' => $data['asal_desa'],
			'kecamatan' => $data['asal_kecamatan'],
			'kabupaten_kota' => $data['asal_kabupaten_kota'],
		];

		$res_asal = $this->Masal_kedatangan->update($data['id_asalkedatangan'], $data_asal);

		$data_kedatangan = [
			'no_surat' => $data['no_surat'],
			'tanggal_surat' => $data['tanggal_surat'],
			'id_klasifikasi' => 1,
			'id_penduduk' => $data['id_penduduk'],
		];
		
		$id_datang = $this->input->post('id');

		$this->db->trans_start();
		$res = $this->Mkedatangan->update($id_datang, $data_kedatangan);
		$this->db->trans_complete();


		if ($res) {
			redirect('admin/kedatangan','refresh');
		}
		else {
			return false;
		}
	}

	public function delete($id)
	{

		if ($this->Mkedatangan->delete($id)) {
			redirect('admin/kedatangan','refresh');
		}
		else{
			return false;
		}
	}

}

/* End of file PerpindahanController.php */
/* Location: ./application/controllers/PerpindahanController.php */