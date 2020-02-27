<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdashboard extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_total_penduduk()
	{
		$this->db->select([
			'tabel_penduduk.*',
			'tabel_perpindahan.id as id_pindah',
			'tabel_kematian.id as id_kematian',

		]);

		$this->db->from('tabel_penduduk');
		$this->db->join('tabel_perpindahan', 'tabel_perpindahan.id_penduduk = tabel_penduduk.id', 'left');
		$this->db->join('tabel_kematian', 'tabel_kematian.id_penduduk = tabel_penduduk.id', 'left');
		$this->db->where('tabel_perpindahan.id', NULL);
		$this->db->where('tabel_kematian.id', NULL);
		$this->db->order_by('no_kk', 'asc');
		

		$query = $this->db->get();
		$rows = $query->num_rows();

		return $rows;
	}

	public function get_total_kematian()
	{
		$this->db->select([
			'tabel_kematian.*',
		]);
		
		$this->db->from('tabel_kematian');
		$this->db->join('tabel_penduduk', 'tabel_penduduk.id = tabel_kematian.id_penduduk');
		$this->db->order_by('no_kk', 'asc');
		

		$query = $this->db->get();
		$rows = $query->num_rows();

		
		return $rows;

	}

	public function get_total_kedatangan()
	{
		$this->db->select([
			'tabel_kedatangan.*',
		]);
		
		$this->db->from('tabel_kedatangan');
		$this->db->join('tabel_penduduk', 'tabel_penduduk.id = tabel_kedatangan.id_penduduk', 'left');
		$this->db->join('tabel_asalkedatangan', 'tabel_asalkedatangan.id = tabel_kedatangan.id_asalkedatangan', 'left');
		$this->db->join('tabel_tujuankedatangan', 'tabel_tujuankedatangan.id = tabel_kedatangan.id_tujuankedatangan', 'left');
		

		$query = $this->db->get();
		$rows = $query->num_rows();

		
		return $rows;

	}

	public function get_total_perpindahan()
	{
		$this->db->select([
			'tabel_perpindahan.*',
		]);
		
		$this->db->from('tabel_perpindahan');
		$this->db->join('tabel_penduduk', 'tabel_penduduk.id = tabel_perpindahan.id_penduduk');
		$this->db->join('tabel_tujuanperpindahan', 'tabel_tujuanperpindahan.id = tabel_perpindahan.id_tujuanperpindahan');
		
		$this->db->order_by('no_kk', 'asc');
		

		$query = $this->db->get();
		$rows = $query->num_rows();

		
		return $rows;

	}
}

/* End of file Mdashboard.php */
/* Location: ./application/models/Mdashboard.php */