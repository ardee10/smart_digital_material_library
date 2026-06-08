<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_materialServerside extends CI_Model
{
	protected $table = 'tbl_materials';

	/*
    |--------------------------------------------------------------------------
    | COLUMN ORDER
    |--------------------------------------------------------------------------
    */

	var $column_order = [

		null, // no
		null, // cover
		null, // qr

		'm.material_code',
		'm.material_name',
		's.supplier_name',
		'm.composition',
		'ml.lifecycle_name',
		'm.construction',
		'u.uom_name',

		null, // total image
		null  // action
	];

	/*
    |--------------------------------------------------------------------------
    | COLUMN SEARCH
    |--------------------------------------------------------------------------
    */

	var $column_search = [

		'm.material_code',
		'm.material_name',
		'm.mlm_ref_no',
		's.supplier_name',
		'm.composition',
		'ml.lifecycle_name',
		'm.construction'

	];

	/*
    |--------------------------------------------------------------------------
    | DEFAULT ORDER
    |--------------------------------------------------------------------------
    */

	var $order = [
		'm.id' => 'DESC'
	];

	/*
    |--------------------------------------------------------------------------
    | QUERY DATATABLES
    |--------------------------------------------------------------------------
    */

	private function _get_datatables_query()
	{
		$this->db->select('

            m.*,

            s.supplier_name,

            ml.lifecycle_name,

            u.uom_name,

            ma.id as asset_id,
            ma.qr_code_file,

            mai.file_name as cover_image,

            COUNT(mai2.id) as total_images

        ');

		$this->db->from($this->table . ' m');

		/*
        |--------------------------------------------------------------------------
        | JOIN SUPPLIER
        |--------------------------------------------------------------------------
        */

		$this->db->join(
			'tbl_suppliers s',
			's.id = m.supplier_id',
			'left'
		);

		/*
        |--------------------------------------------------------------------------
        | JOIN LIFECYCLE
        |--------------------------------------------------------------------------
        */

		$this->db->join(
			'tbl_material_lifecycle ml',
			'ml.id = m.lifecycle_id',
			'left'
		);

		/*
        |--------------------------------------------------------------------------
        | JOIN UOM
        |--------------------------------------------------------------------------
        */

		$this->db->join(
			'tbl_uom u',
			'u.id = m.weight_uom_id',
			'left'
		);

		/*
        |--------------------------------------------------------------------------
        | JOIN MATERIAL ASSETS
        |--------------------------------------------------------------------------
        */

		$this->db->join(
			'tbl_material_assets ma',
			'ma.material_id = m.id',
			'left'
		);

		/*
        |--------------------------------------------------------------------------
        | JOIN COVER IMAGE
        |--------------------------------------------------------------------------
        */

		$this->db->join(
			'tbl_material_asset_images mai',
			'mai.asset_id = ma.id AND mai.is_cover = 1',
			'left'
		);

		/*
        |--------------------------------------------------------------------------
        | JOIN TOTAL IMAGES
        |--------------------------------------------------------------------------
        */

		$this->db->join(
			'tbl_material_asset_images mai2',
			'mai2.asset_id = ma.id',
			'left'
		);

		/*
        |--------------------------------------------------------------------------
        | FILTERS
        |--------------------------------------------------------------------------
        */

		$this->_apply_filters();

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

				if (
					count($this->column_search) - 1 == $i
				) {

					$this->db->group_end();
				}
			}

			$i++;
		}

		/*
        |--------------------------------------------------------------------------
        | GROUP BY
        |--------------------------------------------------------------------------
        */

		$this->db->group_by('m.id');

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
		} else {

			$this->db->order_by(
				'm.id',
				'DESC'
			);
		}
	}

	/*
    |--------------------------------------------------------------------------
    | GET DATATABLES
    |--------------------------------------------------------------------------
    */

	public function get_datatables()
	{
		$this->_get_datatables_query();

		if ($_POST['length'] != -1) {

			$this->db->limit(
				$_POST['length'],
				$_POST['start']
			);
		}

		return $this->db->get()->result();
	}

	/*
    |--------------------------------------------------------------------------
    | COUNT FILTERED
    |--------------------------------------------------------------------------
    */

	public function count_filtered()
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

	/*
    |--------------------------------------------------------------------------
    | APPLY FILTERS
    |--------------------------------------------------------------------------
    */

	private function _apply_filters()
	{
		/*
        |--------------------------------------------------------------------------
        | KEYWORD
        |--------------------------------------------------------------------------
        */

		if ($this->input->post('keyword')) {

			$keyword = $this->input->post('keyword');

			$this->db->group_start();

			$this->db->like(
				'm.material_name',
				$keyword
			);

			$this->db->or_like(
				'm.material_code',
				$keyword
			);

			$this->db->or_like(
				'm.mlm_ref_no',
				$keyword
			);

			$this->db->group_end();
		}

		/*
        |--------------------------------------------------------------------------
        | SUPPLIER
        |--------------------------------------------------------------------------
        */

		if ($this->input->post('supplier')) {

			$this->db->where(
				'm.supplier_id',
				$this->input->post('supplier')
			);
		}

		/*
        |--------------------------------------------------------------------------
        | CLASSIFICATION
        |--------------------------------------------------------------------------
        */

		if ($this->input->post('classification')) {

			$this->db->where(
				'm.classification_id',
				$this->input->post('classification')
			);
		}

		/*
        |--------------------------------------------------------------------------
        | SEASON
        |--------------------------------------------------------------------------
        */

		if ($this->input->post('season')) {

			$this->db->where(
				'm.season_id',
				$this->input->post('season')
			);
		}

		/*
        |--------------------------------------------------------------------------
        | LIFECYCLE
        |--------------------------------------------------------------------------
        */

		if ($this->input->post('lifecycle')) {

			$this->db->where(
				'm.lifecycle_id',
				$this->input->post('lifecycle')
			);
		}

		/*
        |--------------------------------------------------------------------------
        | COMPOSITION
        |--------------------------------------------------------------------------
        */

		if ($this->input->post('composition')) {

			$this->db->like(
				'm.composition',
				$this->input->post('composition')
			);
		}

		/*
        |--------------------------------------------------------------------------
        | PRICE
        |--------------------------------------------------------------------------
        */

		if ($this->input->post('minPrice')) {

			$this->db->where(
				'm.standard_price >=',
				$this->input->post('minPrice')
			);
		}

		if ($this->input->post('maxPrice')) {

			$this->db->where(
				'm.standard_price <=',
				$this->input->post('maxPrice')
			);
		}

		/*
        |--------------------------------------------------------------------------
        | LOCATION
        |--------------------------------------------------------------------------
        */

		if ($this->input->post('location')) {

			$this->db->join(
				'tbl_material_locations mloc',
				'mloc.material_id = m.id',
				'left'
			);

			$this->db->where(
				'mloc.location_id',
				$this->input->post('location')
			);
		}
	}
}
