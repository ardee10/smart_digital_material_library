<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_api extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	/* =========================================================
	| MATERIAL LIST
	========================================================= */

	public function getMaterials()
	{
		return $this->db
			->select('
				id,
				material_code,
				material_name,
				library_code
			')
			->from('tbl_materials')
			->order_by('material_name', 'ASC')
			->get()
			->result_array();
	}

	/* =========================================================
	| SEARCH MATERIAL
	========================================================= */

	public function searchMaterial($keyword = '')
	{
		return $this->db
			->select('
				id,
				material_code,
				material_name,
				library_code
			')
			->from('tbl_materials')
			->group_start()
			->like('material_name', $keyword)
			->or_like('material_code', $keyword)
			->or_like('library_code', $keyword)
			->group_end()
			->limit(30)
			->get()
			->result_array();
	}

	/* =========================================================
	| MATERIAL DETAIL
	========================================================= */

	public function getMaterialDetail($material_code)
	{
		$material = $this->db

			->select('
				m.*,

				s.supplier_name,

				mt.material_type_name,

				ml.lifecycle_name,

				se.season_name,
				se.season_year
			')

			->from('tbl_materials m')

			->join(
				'tbl_suppliers s',
				's.id = m.supplier_id',
				'left'
			)

			->join(
				'tbl_material_types mt',
				'mt.id = m.material_type_id',
				'left'
			)

			->join(
				'tbl_material_lifecycle ml',
				'ml.id = m.lifecycle_id',
				'left'
			)

			->join(
				'tbl_seasons se',
				'se.id = m.season_id',
				'left'
			)

			->where(
				'm.material_code',
				$material_code
			)

			->get()

			->row_array();

		if (!$material) {
			return false;
		}

		return $material;
	}
}
