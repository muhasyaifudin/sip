<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpenduduk extends CI_Model {

	protected $table = 'tabel_penduduk';

	public function get($id = NULL)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		
		
		if($id !== null){

			$this->db->where($this->table.'.id_penduduk', $id);
			$query = $this->db->get();
			$row = $query->row();
			
			return $row;
		}


		$query = $this->db->get();
		$rows = $query->result();

		
		return $rows;
	}

	public function insert($data = NULL)
	{
		if ($data !== NULL) {
			isset($data['id_penduduk']);
			try {
				$this->db->insert($this->table, $data);
				$id = $this->db->insert_id();

				return true;

			} catch (Exception $e) {
				return false;
			}
		}
		else{
			return false;
		}
	}

	public function update($id_penduduk = NULL, $data = NULL)
	{
		if ($id_penduduk !== NULL && $data !== NULL) {
			isset($data['id_penduduk']);

			try {

				$this->db->where('id_penduduk', $id_penduduk);
				$this->db->update($this->table, $data);

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

				$this->db->where('id_penduduk', $id);

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