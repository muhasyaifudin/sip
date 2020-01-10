<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengajuanSuratController extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mpengajuan');
		$this->load->model(['Mkedatangan', 'Mpenduduk', 'Mtujuan_kedatangan', 'Masal_kedatangan']);
	}
	public function index()
	{
		$data = [
			'penduduk' => $this->Mpenduduk->get_where_not_pindah_meninggal(),
		];

		$this->load_view('Vpengajuan_surat', $data);
	}

	public function get_data()
	{
		$pengajuan = [];
		$filter = $this->input->get('filter');
		if ($filter == 1) {
			$pengajuan = $this->Mpengajuan->get();
		}
		else if ($filter == 2) {
			$pengajuan = $this->Mpengajuan->get_where_not_pindah_meninggal();
		}
		else if ($filter == 3) {
			$pengajuan = $this->Mpengajuan->get_where_meninggal();
		}
		else if ($filter == 4) {
			$pengajuan = $this->Mpengajuan->get_where_pindah();
		}
		else {
			$pengajuan = $this->Mpengajuan->get();
		}
		

		$data['data'] = $pengajuan;

		header('application/json');
		echo json_encode($data);
		
	}

	public function detail()
	{
		$data = $this->input->get();

		if ($data['jenis'] == 'perpindahan_datang') {
			$kedatangan = $this->Mkedatangan->get($data['id_kedatangan']);
			$data_kedatangan['data'] = $kedatangan;
			header('application/json');
			echo json_encode($data_kedatangan);
		}
	}

	public function insert()
	{
		$data = $this->input->post();

		if ($this->Mpengajuan->insert($data)) {
			redirect('admin/pengajuan_surat','refresh');
		}
		else {
			return false;
		}
	}

	public function update()
	{
		$data = $this->input->post();
		$id_pengajuan = $this->input->post('id');

		if ($this->Mpengajuan->update($id_pengajuan, $data)) {
			redirect('admin/pengajuan_surat','refresh');
		}
		else {
			return false;
		}
	}

	public function delete($id)
	{

		if ($this->Mpengajuan->delete($id)) {
			redirect('admin/pengajuan_surat','refresh');
		}
		else{
			return false;
		}
	}

	public function proses_kedatangan()
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
		$id_pengajuan = $this->input->post('id_pengajuan');

		$data_pengajuan = [
			'status_pengajuan' => 1,
		];

		$this->db->trans_start();
		$res = $this->Mkedatangan->update($id_datang, $data_kedatangan);
		$res2 = $this->Mpengajuan->update($id_pengajuan, $data_pengajuan);
		$this->db->trans_complete();
		
		if ($res) {
			redirect('admin/pengajuan_surat','refresh');
		}
		else {
			return false;
		}
	}

}

/* End of file PengajuanSuratController.php */
/* Location: ./application/controllers/PengajuanSuratController.php */