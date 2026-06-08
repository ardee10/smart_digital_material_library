<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
	protected $table = 'tbl_models';

	public function viewModelNumber()
	{
		$query = $this->db->get($this->table)->result();
		return $query;
	}

	// INSERT
	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	// UPDATE
	public function update($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
	}

	//DELETE
	public function delete($id)
	{
		// cek dulu apakah data ada
		$this->db->where('id', $id);
		$query = $this->db->get($this->table);

		if ($query->num_rows() == 0) {
			return false;
		}

		// hapus data
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	public function viewLocation()
	{
		$query = $this->db->get('tbl_locations')->result();
		return $query;
	}

	/* INSERT SUPPLIER */
	public function insertSupplier($data)
	{
		return $this->db->insert('tbl_suppliers', $data);
	}

	/* Update Supplier */
	public function updateSupplier($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('tbl_suppliers', $data);
	}

	/* Delete Supplier */
	public function deleteSupplier($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('tbl_suppliers');
	}

	/* Import Supplier */
	public function importSupplier($data)
	{
		return $this->db->insert('tbl_suppliers', $data);
	}

	/* Import Model Number */
	public function importModelNumber($data)
	{
		return $this->db->insert('tbl_models', $data);
	}
	/* Import Model Number */
	public function importLocation($data)
	{
		return $this->db->insert('tbl_locations', $data);
	}

	/* Insert Location */

	public function insertLocation($data)
	{
		return $this->db->insert('tbl_locations', $data);
	}

	/* Update Location */
	public function updateLocation($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('tbl_locations', $data);
	}

	/* Delete Supplier */
	public function deleteClassification($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('tbl_classifications');
	}
	/* Delete Locations */
	public function deleteLocation($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('tbl_locations');
	}
}

/* End of file: M_admin.php */
