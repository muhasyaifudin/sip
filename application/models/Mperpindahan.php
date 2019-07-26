<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mperpindahan extends CI_Model {

	protected $table = 'tabel_perpindahan';

	public function get($id = NULL)
	{
		$this->db->select([
			$this->table . '.*',
			'nama',
			'nik',
			'jenis_kelamin',
			'alamat',
			'rt',
			'rw',
			'tempat_lahir',
			'tanggal_lahir'

		]);
		
		$this->db->from($this->table);
		$this->db->join('tabel_penduduk', 'tabel_penduduk.id_penduduk = tabel_perpindahan.id_penduduk');
		
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
			isset($data['id_perpindahan']);
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

	public function update($id_perpindahan = NULL, $data = NULL)
	{
		if ($id_perpindahan !== NULL && $data !== NULL) {
			isset($data['id_perpindahan']);

			try {

				$this->db->where('id_perpindahan', $id_perpindahan);
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

				$this->db->where('id_perpindahan', $id);

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

/* End of file Mperpindahan.php */
/* Location: ./application/models/Mperpindahan.php */