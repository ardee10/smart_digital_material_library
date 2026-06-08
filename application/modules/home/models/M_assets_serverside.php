<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_assets_serverside extends CI_Model
{

	var $table = 'tbl_materials m';

	var $column_order = [
		null,
		'm.material_code',
		null,
		null,
		null
	];

	var $column_search = [
		'm.material_code',
		'm.material_name'
	];

	var $order = [
		'm.id' => 'DESC'
	];

	/*
	|--------------------------------------------------------------------------
	| QUERY
	|--------------------------------------------------------------------------
	*/

	private function _get_datatables_query()
	{
		$this->db->select("
			m.id,
			m.material_code,
			m.material_name,

			MAX(CASE 
				WHEN a.asset_type = 'u3m'
				THEN a.file_path
			END) AS u3m_file,

			MAX(CASE 
				WHEN a.asset_type = 'blender_material'
				THEN a.file_path
			END) AS blender_material_file,

			MAX(CASE 
				WHEN a.asset_type = 'blender_asset'
				THEN a.file_path
			END) AS blender_asset_file
		");

		$this->db->from($this->table);

		$this->db->join(
			'tbl_assets a',
			'a.material_id = m.id',
			'left'
		);

		$this->db->group_by('m.id');

		/*
		|--------------------------------------------------------------------------
		| SEARCH
		|--------------------------------------------------------------------------
		*/

		$i = 0;

		foreach ($this->column_search as $item) {

			if ($_POST['search']['value']) {

				if ($i === 0) {

					$this->db->group_start();

					$this->db->like(
						$item,
						$_POST['search']['value']
					);
				} else {

					$this->db->or_like(
						$item,
						$_POST['search']['value']
					);
				}

				if (count($this->column_search) - 1 == $i)
					$this->db->group_end();
			}

			$i++;
		}

		/*
		|--------------------------------------------------------------------------
		| ORDER
		|--------------------------------------------------------------------------
		*/

		if (isset($_POST['order'])) {

			$this->db->order_by(
				$this->column_order[$_POST['order']['0']['column']],
				$_POST['order']['0']['dir']
			);
		} else if (isset($this->order)) {

			$order = $this->order;

			$this->db->order_by(
				key($order),
				$order[key($order)]
			);
		}
	}

	/*
	|--------------------------------------------------------------------------
	| GET DATATABLES
	|--------------------------------------------------------------------------
	*/

	function get_datatables()
	{
		$this->_get_datatables_query();

		if ($_POST['length'] != -1)
			$this->db->limit(
				$_POST['length'],
				$_POST['start']
			);

		return $this->db->get()->result();
	}

	/*
	|--------------------------------------------------------------------------
	| COUNT FILTERED
	|--------------------------------------------------------------------------
	*/

	function count_filtered()
	{
		$this->_get_datatables_query();

		return $this->db->get()->num_rows();
	}

	/*
	|--------------------------------------------------------------------------
	| COUNT ALL
	|--------------------------------------------------------------------------
	*/

	public function count_all()
	{
		$this->db->from($this->table);

		return $this->db->count_all_results();
	}
}
