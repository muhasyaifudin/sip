<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpengajuan extends CI_Model {

	protected $table = 'tabel_pengajuan';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function get($id = NULL)
	{
		$this->db->select([
			$this->table . '.*',
			'tanggal',
			'nama_pengirim',
			'jenis',
			'sub_jenis',
			'status_pengajuan',
			'keterangan',

		]);
		
		$this->db->from($this->table);
		$this->db->order_by('tanggal', 'desc');
		
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
	public function get_by_status($status_pengajuan = NULL)
	{
		$this->db->select([
			$this->table . '.*',
			'tanggal',
			'nama_pengirim',
			'jenis',
			'sub_jenis',
			'status_pengajuan',
			'keterangan',

		]);
		
		$this->db->from($this->table);
		$this->db->order_by('tanggal', 'desc');
		
		if($status_pengajuan !== null){

			$this->db->where($this->table.'.status_pengajuan', $status_pengajuan);
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
			unset($data['id']);
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
			unset($data['id']);

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

	public function get_report($where = [])
	{
		$this->db->select([
			$this->table . '.*',
			'tanggal',
			'nama_pengirim',
			'jenis',
			'sub_jenis',
			'status_pengajuan',
			'keterangan',

		]);
		
		$this->db->from($this->table);

		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}

		$this->db->order_by('tanggal', 'desc');

		$query = $this->db->get();
		$rows = $query->result();

		
		return $rows;
	}

}

/* End of file Mkematian.php */
/* Location: ./application/models/Mkematian.php */