<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PublicPengajuanSurat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->model([
			'Mpengajuan',
			'Mpenduduk',
			'Mtujuan_kedatangan',
			'Masal_kedatangan',
			'Mkedatangan',

		]);
	}

	public function index()
	{
		$this->load->database();
		$this->load_view('public/Vpengajuan_surat');


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

	public function submit()
	{
		$data = $this->input->post();

		if ($data['jenis'] == 'perpindahan_datang') {
			$this->proses_perpindahan_datang($data);
		}
		elseif ($data['jenis'] == 'perpindahan_pergi') {
			$this->proses_perpindahan_pergi($data);
		}
	}

	public function proses_perpindahan_datang($data)
	{

		$this->db->trans_start();
		$data_penduduk = [
			'nik' => $data['nik'],
			'no_kk' => $data['no_kk'],
			'shdk' => $data['shdk'],
			'nama' => $data['nama'],
			'jenis_kelamin' => $data['jenis_kelamin'],
			'tempat_lahir' => $data['nik'],
			'tanggal_lahir' => $data['tanggal_lahir'],
			'status' => $data['status'],
			'pekerjaan' => $data['pekerjaan'],
			'nama_ibu' => $data['nama_ibu'],
			'nama_ayah' => $data['nama_ayah'],
			'alamat' => $data['tujuan_alamat'],
			'rt' => $data['tujuan_rt'],
			'rw' => $data['tujuan_rw'],

		];

		$penduduk = $this->Mpenduduk->insert($data_penduduk);

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
			'no_surat' => isset($data['no_surat']) && $data['no_surat'] != null ? $data['no_surat'] : null,
			'tanggal_surat' => isset($data['tanggal_surat']) && $data['tanggal_surat'] != null ? $data['tanggal_surat'] : null,
			'id_klasifikasi' => 1,
			'id_penduduk' => $penduduk->id,
			'id_asalkedatangan' => $res_asal->id,
			'id_tujuankedatangan' => $res_tujuan->id,

		];

		$kedatangan = $this->Mkedatangan->insert($data_kedatangan);

		$pengajuan = [
			'tanggal' => isset($data['tanggal']) && $data['tanggal'] != null ? $data['tanggal'] : date('Y-m-d'),
			'nama_pengirim' => isset($data['nama_pengirim']) ? $data['nama_pengirim'] : null,
			'jenis' => isset($data['jenis']) ? $data['jenis'] : null,
			'sub_jenis' => isset($data['jenis']) ? $data['jenis'] : null,
			'keterangan' => isset($data['keterangan']) ? $data['keterangan'] : null,
			'status_pengajuan' => 0,
			'id_kedatangan' => $kedatangan->id,
		];

		$res = $this->Mpengajuan->insert($pengajuan);

		$this->db->trans_complete();

		if ($res) {
			$this->session->set_flashdata('message', 'Data berhasil disimpan');

			redirect('/pengajuan_surat?jenis=perpindahan_datang','refresh');
		}
	}

	public function load_view($v, $data = [])
	{
		$data = array(
			// "title" => $v['title'],
			"content" => $v,
			"data" => $data,
		);

		$this->load->view('layout/Vmaster_public', $data);
	}



}

/* End of file PublicPengajuanSurat.php */
/* Location: ./application/controllers/PublicPengajuanSurat.php */