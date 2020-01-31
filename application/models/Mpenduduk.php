<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpenduduk extends CI_Model {

	protected $table = 'tabel_penduduk';

	public function get($id = NULL)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->order_by('no_kk', 'asc');
		
		if($id !== null){

			$this->db->where($this->table.'.id', $id);
			$query = $this->db->get();
			$row = $query->row();
			
			return $row;
		}


		$query = $this->db->get();
		$rows = $query->result();

		
		return $rows;
	}

	public function get_where_not_pindah_meninggal()
	{
		$this->db->select([
			$this->table . '.*',
			'tabel_perpindahan.id as id_pindah',
			'tabel_kematian.id as id_kematian',

		]);

		$this->db->from($this->table);
		$this->db->join('tabel_perpindahan', 'tabel_perpindahan.id_penduduk = tabel_penduduk.id', 'left');
		$this->db->join('tabel_kematian', 'tabel_kematian.id_penduduk = tabel_penduduk.id', 'left');
		$this->db->where('tabel_perpindahan.id', NULL);
		$this->db->where('tabel_kematian.id', NULL);
		$this->db->order_by('no_kk', 'asc');
		

		$query = $this->db->get();
		$rows = $query->result();

		return $rows;
	}

	public function get_where_meninggal()
	{
		$this->db->select([
			$this->table . '.*',
			'tabel_kematian.id as id_kematian',

		]);

		$this->db->from($this->table);
		$this->db->join('tabel_kematian', 'tabel_kematian.id_penduduk = tabel_penduduk.id');
		$this->db->order_by('no_kk', 'asc');
		

		$query = $this->db->get();
		$rows = $query->result();

		return $rows;
	}

	public function get_where_pindah()
	{
		$this->db->select([
			$this->table . '.*',
			'tabel_perpindahan.id as id_pindah',

		]);

		$this->db->from($this->table);
		$this->db->join('tabel_perpindahan', 'tabel_perpindahan.id_penduduk = tabel_penduduk.id');
		$this->db->order_by('no_kk', 'asc');
		

		$query = $this->db->get();
		$rows = $query->result();

		return $rows;
	}

	public function get_where($where = [], $row = false)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->order_by('no_kk', 'asc');
		
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}

		if ($row) {
			$query = $this->db->get();
			$row = $query->result();

			return $row;
		}

		$query = $this->db->get();
		$rows = $query->result();

		
		return $rows;
	}

	public function insert($data = NULL)
	{
		if ($data !== NULL) {
			isset($data['id']);
			try {
				$this->db->insert($this->table, $data);
				$id = $this->db->insert_id();

				return $this->get($id);

			} catch (Exception $e) {
				return false;
			}
		}
		else{
			return false;
		}
	}

	public function update($id = NULL, $data = NULL)
	{
		if ($id !== NULL && $data !== NULL) {
			isset($data['id']);

			try {

				$this->db->where('id', $id);
				$this->db->update($this->table, $data);

				return $this->get($id);
			} catch (Exception $e) {
				return false;
			}
		}
		else{
			return false;
		}
	}

	public function delete($id = NULL)
	{
		if ($id !== NULL) {
			try {

				$this->db->where('id', $id);

		        $this->db->delete($this->table);

		      	return true;
			} catch (Exception $e) {
				return false;
			}
		}
		else {
			return false;
		}
	}

}

/* End of file Mpenduduk.php */
/* Location: ./application/models/Mpenduduk.php */