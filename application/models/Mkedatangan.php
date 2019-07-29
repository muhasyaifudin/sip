<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkedatangan extends CI_Model {

	protected $table = 'tabel_kedatangan';
	protected $table_asal = 'tabel_asalkedatangan';
	protected $table_tujuan = 'tabel_tujuankedatangan';

	protected $table_penduduk = 'tabel_penduduk';


	public function get($id = NULL)
	{
		$this->db->select([
			$this->table . '.*',
			$this->table_asal . '.id_asalkedatangan as id_asalkedatangan',
			$this->table_asal . '.alamat as asal_alamat',
			$this->table_asal . '.rt as asal_rt',
			$this->table_asal . '.rw as asal_rw',
			$this->table_asal . '.desa as asal_desa',
			$this->table_asal . '.kecamatan as asal_kecamatan',
			$this->table_asal . '.kabupaten_kota as asal_kabupaten_kota',
			$this->table_penduduk . '.nama',
			$this->table_penduduk . '.nik',
			$this->table_penduduk . '.jenis_kelamin',
			$this->table_penduduk . '.alamat',
			$this->table_penduduk . '.rt',
			$this->table_penduduk . '.rw',
			$this->table_penduduk . '.tempat_lahir',
			$this->table_penduduk . '.tanggal_lahir',
			$this->table_tujuan . '.id_tujuankedatangan as id_tujuankedatangan',
			$this->table_tujuan . '.alamat as tujuan_alamat',
			$this->table_tujuan . '.rt as tujuan_rt',
			$this->table_tujuan . '.rw as tujuan_rw',

		]);
		
		$this->db->from($this->table);
		$this->db->join('tabel_penduduk', 'tabel_penduduk.id_penduduk = tabel_kedatangan.id_penduduk');
		$this->db->join('tabel_asalkedatangan', 'tabel_asalkedatangan.id_asalkedatangan = tabel_kedatangan.id_asalkedatangan');
		$this->db->join('tabel_tujuankedatangan', 'tabel_tujuankedatangan.id_tujuankedatangan = tabel_kedatangan.id_tujuankedatangan');

		
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

	public function insert($data = NULL)
	{
		if ($data !== NULL) {
			isset($data['id_datang']);
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

	public function update($id_datang = NULL, $data = NULL)
	{
		if ($id_datang !== NULL && $data !== NULL) {
			isset($data['id_datang']);

			try {

				$this->db->where('id_datang', $id_datang);
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

				$this->db->where('id_datang', $id);

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

/* End of file Mkedatangan.php */
/* Location: ./application/models/Mkedatangan.php */