<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtujuan_kedatangan extends CI_Model {

	protected $table = 'tabel_tujuankedatangan';

	public function get($id = NULL)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		
		if($id !== null){

			$this->db->where($this->table.'.id_tujuankedatangan', $id);
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
			isset($data['id_tujuankedatangan']);
			try {
				$this->db->insert($this->table, $data);
				// $id = $this->db->insert_id();

				$this->db->select('*');
				$this->db->from($this->table);
				$this->db->order_by('id_tujuankedatangan', 'desc');
					
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

	public function update($id_tujuankedatangan = NULL, $data = NULL)
	{
		if ($id_tujuankedatangan !== NULL && $data !== NULL) {
			isset($data['id_tujuankedatangan']);

			try {

				$this->db->where('id_tujuankedatangan', $id_tujuankedatangan);
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

				$this->db->where('id_tujuankedatangan', $id);

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