<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengajuanSuratController extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mpengajuan');
		$this->load->model(['Mkedatangan', 'Mpenduduk', 'Mtujuan_kedatangan', 'Masal_kedatangan']);
		$this->load->model(['Mperpindahan', 'Mtujuan_perpindahan']);
		$this->load->model(['Mkelahiran', 'Mkematian']);
	}
	public function index()
	{
		$data = [
			'penduduk' => $this->Mpenduduk->get(),
		];

		$this->load_view('Vpengajuan_surat', $data);
	}

	public function get_data()
	{
		$pengajuan = [];
		$status_pengajuan = $this->input->get('status_pengajuan');
		
		$pengajuan = $this->Mpengajuan->get_by_status($status_pengajuan);
		

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

		else if ($data['jenis'] == 'perpindahan_pergi') {
			$perpindahan = $this->Mperpindahan->get($data['id_perpindahan']);
			$data_perpindahan['data'] = $perpindahan;
			header('application/json');
			echo json_encode($data_perpindahan);
		}
		else if ($data['jenis'] == 'kematian') {
			$kematian = $this->Mkematian->get($data['id_kematian']);
			$data_kematian['data'] = $kematian;
			header('application/json');
			echo json_encode($data_kematian);
		}
		else if ($data['jenis'] == 'kelahiran') {
			$kelahiran = $this->Mkelahiran->get($data['id_kelahiran']);
			$data_kelahiran['data'] = $kelahiran;
			header('application/json');
			echo json_encode($data_kelahiran);
		}
		else if ($data['jenis'] == 'lahir_mati') {
			$kematian = $this->Mkematian->get($data['id_kematian']);
			$data_kematian['data'] = $kematian;
			header('application/json');
			echo json_encode($data_kematian);
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

		$data['status_pengajuan'] = -1; 

		if ($this->Mpengajuan->update($id, $data)) {
			header('Content-Type: application/json');

			$return = [
				'code' => 200,
				'data' => []
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

	public function ok($id)
	{

		$data['status_pengajuan'] = 2; 

		if ($this->Mpengajuan->update($id, $data)) {
			header('Content-Type: application/json');

			$return = [
				'code' => 200,
				'data' => []
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
			redirect('admin/pengajuan_surat','refresh');
		}
	}


	public function proses_perpindahan()
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
		
		$id_pindah = $this->input->post('id');
		$id_pengajuan = $this->input->post('id_pengajuan');

		$data_pengajuan = [
			'status_pengajuan' => 1,
		];

		$this->db->trans_start();
		$res = $this->Mperpindahan->update($id_pindah, $data_perpindahan);
		$res2 = $this->Mpengajuan->update($id_pengajuan, $data_pengajuan);
		$this->db->trans_complete();
		
		if ($res) {
			redirect('admin/pengajuan_surat','refresh');
		}
		else {
			redirect('admin/pengajuan_surat','refresh');
		}
	}


	public function proses_kematian()
	{
		$data = $this->input->post();

		$data_kematian = [
			'tanggal_lapor' => $data['tanggal_lapor'],
			'no_akta' => $data['no_akta'],
			'id_penduduk' => $data['id_penduduk'],
			'tanggal_meninggal' => $data['tanggal_meninggal'],
		];

		$id_kematian = $this->input->post('id');
		$id_pengajuan = $this->input->post('id_pengajuan');

		$data_pengajuan = [
			'status_pengajuan' => 1,
		];

		$this->db->trans_start();
		$res = $this->Mkematian->update($id_kematian, $data_kematian);
		$res2 = $this->Mpengajuan->update($id_pengajuan, $data_pengajuan);
		$this->db->trans_complete();
		
		if ($res) {
			redirect('admin/pengajuan_surat','refresh');
		}
		else {
			redirect('admin/pengajuan_surat','refresh');
		}
	}

	public function proses_kelahiran()
	{
		$data = $this->input->post();

		$data_kelahiran = [
			'tanggal_lapor' => $data['tanggal_lapor'],
			'no_akta' => $data['no_akta'],
			'id_penduduk' => $data['id_penduduk'],
			'tanggal_lahir' => $data['tanggal_lahir'],
		];

		$id_kelahiran = $this->input->post('id');
		$id_pengajuan = $this->input->post('id_pengajuan');

		$data_pengajuan = [
			'status_pengajuan' => 1,
		];

		$this->db->trans_start();
		$res = $this->Mkelahiran->update($id_kelahiran, $data_kelahiran);
		$res2 = $this->Mpengajuan->update($id_pengajuan, $data_pengajuan);
		$this->db->trans_complete();
		
		if ($res) {
			redirect('admin/pengajuan_surat','refresh');
		}
		else {
			redirect('admin/pengajuan_surat','refresh');
		}
	}
}

/* End of file PengajuanSuratController.php */
/* Location: ./application/controllers/PengajuanSuratController.php */