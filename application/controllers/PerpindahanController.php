<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerpindahanController extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url']);
		$this->load->model(['Mperpindahan', 'Mpenduduk', 'Mtujuan_perpindahan', 'Masal_perpindahan']);
	}

	public function index()
	{
		$data = [
			'penduduk' => $this->Mpenduduk->get_where_not_pindah_meninggal(),
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

		$penduduk = $this->Mpenduduk->get($data['id_penduduk']);

		$data_asal = [
			'alamat' => $penduduk->alamat,
			'rt' => $penduduk->rt,
			'rw' => $penduduk->rw,

		];

		$res_asal = $this->Masal_perpindahan->insert($data_asal);

		$data_tujuan = [
			'alamat' => $data['tujuan_alamat'],
			'rt' => $data['tujuan_rt'],
			'rw' => $data['tujuan_rw'],
			'desa' => $data['tujuan_desa'],
			'kecamatan' => $data['tujuan_kecamatan'],
			'kabupaten_kota' => $data['tujuan_kabupaten_kota'],
		];

		$res_tujuan = $this->Mtujuan_perpindahan->insert($data_tujuan);


		$data_perpindahan = [
			'no_surat' => $data['no_surat'],
			'tanggal_surat' => $data['tanggal_surat'],
			'id_klasifikasi' => 1,
			'id_penduduk' => $data['id_penduduk'],
			'id_asalperpindahan' => $res_asal->id_asalperpindahan,
			'id_tujuanperpindahan' => $res_tujuan->id_tujuanperpindahan,

		];

		if ($this->Mperpindahan->insert($data_perpindahan)) {
			redirect('perpindahan','refresh');
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
			'desa' => $data['tujuan_desa'],
			'kecamatan' => $data['tujuan_kecamatan'],
			'kabupaten_kota' => $data['tujuan_kabupaten_kota'],
		];

		$this->Mtujuan_perpindahan->update($data['id_tujuanperpindahan'], $data_tujuan);

		$data_perpindahan = [
			'no_surat' => $data['no_surat'],
			'tanggal_surat' => $data['tanggal_surat'],
			'id_klasifikasi' => 1,
			'id_penduduk' => $data['id_penduduk'],
		];
		
		$id_pindah = $this->input->post('id_pindah');

		if ($this->Mperpindahan->update($id_pindah, $data_perpindahan)) {
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