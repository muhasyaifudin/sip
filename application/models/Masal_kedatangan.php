<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masal_kedatangan extends CI_Model {

	protected $table = 'tabel_asalkedatangan';

	public function get($id = NULL)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		
		if($id !== null){

			$this->db->where($this->table.'.id_asalkedatangan', $id);
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
			isset($data['id_asalkedatangan']);
			try {
				$this->db->insert($this->table, $data);
				// $id = $this->db->insert_id();

				$this->db->select('*');
				$this->db->from($this->table);
				$this->db->order_by('id_asalkedatangan', 'desc');
					
				$query = $this->db->get();
				$row = $query->row();

				return $row;

			} catch (Exception $e) {
				return false;
			}
		}
		else{
			return false;
		}
	}

	public function update($id_asalkedatangan = NULL, $data = NULL)
	{
		if ($id_asalkedatangan !== NULL && $data !== NULL) {
			isset($data['id_asalkedatangan']);

			try {

				$this->db->where('id_asalkedatangan', $id_asalkedatangan);
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

				$this->db->where('id_asalkedatangan', $id);

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

/* End of file Mtujuan_kedatangan.php */
/* Location: ./application/models/Mtujuan_kedatangan.php */