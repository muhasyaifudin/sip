<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masal_perpindahan extends CI_Model {

	protected $table = 'tabel_asalperpindahan';

	public function get($id = NULL)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		
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

/* End of file Mtujuan_perpindahan.php */
/* Location: ./application/models/Mtujuan_perpindahan.php */