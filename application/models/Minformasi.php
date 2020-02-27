<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Minformasi extends CI_Model {

	protected $table = 'tabel_informasi';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get($id = null)
	{
		$this->db->select('tabel_informasi.*');
		$this->db->select('users.username as user_name');

		$this->db->from($this->table);
		$this->db->join('users', 'users.id = tabel_informasi.user_id', 'left');
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

	public function get_by_status($status)
	{
		$this->db->select('tabel_informasi.*');
		$this->db->select('users.username as user_name');
		$this->db->from($this->table);
		$this->db->join('users', 'users.id = tabel_informasi.user_id', 'left');
		$this->db->order_by('tanggal', 'desc');

		if ($status != -1 && $status != null) {
			$this->db->where($this->table.'.aktif', $status);
		}

		$query = $this->db->get();
		$rows = $query->result();

		return $rows;
	}
	
	public function insert($data = NULL)
	{
		if ($data !== NULL) {
			unset($data['id']);
			$data['user_id'] = $this->session->userdata('user_id');
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

				$this->db->trans_start();

				$this->db->where('id', $id);
				$this->db->update($this->table, $data);

				$this->db->trans_complete();

				return true;
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

/* End of file Minformasi.php */
/* Location: ./application/models/Minformasi.php */