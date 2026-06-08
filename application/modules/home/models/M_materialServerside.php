<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_materialServerside extends CI_Model
{
	protected $table = 'tbl_materials';

	/* =========================================================================
	| COLUMN ORDER
	========================================================================= */

	protected $column_order = [

		null,
		null,

		'm.mlm_ref_no',

		'm.material_code',

		'mt.material_type_name',

		's.supplier_name',

		'GROUP_CONCAT(DISTINCT loc.location_name)',

		'm.composition',

		'm.production_leadtime',

		'm.sample_leadtime',

		'GROUP_CONCAT(DISTINCT model.model_number)',

		'lifecycle.lifecycle_name',

		null
	];

	/* =========================================================================
	| COLUMN SEARCH
	========================================================================= */

	protected $column_search = [

		'm.mlm_ref_no',

		'm.material_code',
		'm.material_name',

		'mt.material_type_name',

		's.supplier_name',

		'loc.location_name',

		'm.composition',

		'm.construction',

		'm.technology',

		'lifecycle.lifecycle_name'
	];

	/* =========================================================================
	| DEFAULT ORDER
	========================================================================= */

	protected $order = [
		'm.id' => 'DESC'
	];

	/* =========================================================================
	| QUERY DATATABLE
	========================================================================= */

	private function _get_datatables_query()
	{
		$this->db->select('

			m.*,

			s.supplier_name,

			mt.material_type_name,

			lifecycle.lifecycle_name,

			weight_uom.uom_name as weight_uom_name,

			width_uom.uom_name as width_uom_name,

			ma.id as asset_id,
			ma.qr_code_file,
			ma.glb_file,
			ma.u3m_file,
			ma.blender_material_file,

			cover.file_name as cover_image,

			COUNT(DISTINCT images.id) as total_images,

			GROUP_CONCAT(DISTINCT loc.location_name SEPARATOR ", ") as location_names,

			GROUP_CONCAT(DISTINCT cls.classification_name SEPARATOR ", ") as classification_names,

			GROUP_CONCAT(DISTINCT model.model_number SEPARATOR ", ") as model_numbers

		');

		$this->db->from('tbl_materials m');

		/* =========================================================================
		| SUPPLIER
		========================================================================= */

		$this->db->join(
			'tbl_suppliers s',
			's.id = m.supplier_id',
			'left'
		);

		/* =========================================================================
		| MATERIAL TYPE
		========================================================================= */

		$this->db->join(
			'tbl_material_types mt',
			'mt.id = m.material_type_id',
			'left'
		);

		/* =========================================================================
		| LIFECYCLE
		========================================================================= */

		$this->db->join(
			'tbl_material_lifecycle lifecycle',
			'lifecycle.id = m.lifecycle_id',
			'left'
		);

		/* =========================================================================
		| UOM WEIGHT
		========================================================================= */

		$this->db->join(
			'tbl_uom weight_uom',
			'weight_uom.id = m.weight_uom_id',
			'left'
		);

		/* =========================================================================
		| UOM WIDTH
		========================================================================= */

		$this->db->join(
			'tbl_uom width_uom',
			'width_uom.id = m.width_uom_id',
			'left'
		);

		/* =========================================================================
		| MATERIAL ASSETS
		========================================================================= */

		$this->db->join(
			'tbl_material_assets ma',
			'ma.material_id = m.id',
			'left'
		);

		/* =========================================================================
		| COVER IMAGE
		========================================================================= */

		$this->db->join(
			'tbl_material_asset_images cover',
			'cover.asset_id = ma.id AND cover.is_cover = 1',
			'left'
		);

		/* =========================================================================
		| TOTAL IMAGES
		========================================================================= */

		$this->db->join(
			'tbl_material_asset_images images',
			'images.asset_id = ma.id',
			'left'
		);

		/* =========================================================================
		| LOCATIONS
		========================================================================= */

		$this->db->join(
			'tbl_material_locations mloc',
			'mloc.material_id = m.id',
			'left'
		);

		$this->db->join(
			'tbl_locations loc',
			'loc.id = mloc.location_id',
			'left'
		);

		/* =========================================================================
		| CLASSIFICATIONS
		========================================================================= */

		$this->db->join(
			'tbl_material_classifications mc',
			'mc.material_id = m.id',
			'left'
		);

		$this->db->join(
			'tbl_classifications cls',
			'cls.id = mc.classification_id',
			'left'
		);

		/* =========================================================================
		| MODELS
		========================================================================= */

		$this->db->join(
			'tbl_material_models mm',
			'mm.material_id = m.id',
			'left'
		);

		$this->db->join(
			'tbl_models model',
			'model.id = mm.model_id',
			'left'
		);

		/* =========================================================================
		| FILTERS
		========================================================================= */

		$this->_apply_filters();

		/* =========================================================================
| GLOBAL SEARCH
========================================================================= */

		$search = $_POST['search']['value'] ?? '';

		if (!empty($search)) {

			/*
    |--------------------------------------------------------------------------
    | NORMAL FIELD SEARCH
    |--------------------------------------------------------------------------
    */

			$this->db->group_start();

			foreach ($this->column_search as $index => $item) {

				if ($index == 0) {

					$this->db->like($item, $search);
				} else {

					$this->db->or_like($item, $search);
				}
			}

			$this->db->group_end();

			/*
    |--------------------------------------------------------------------------
    | GROUP_CONCAT SEARCH
    |--------------------------------------------------------------------------
    */

			$escapedSearch = $this->db->escape_like_str($search);

			$this->db->having("
        GROUP_CONCAT(DISTINCT cls.classification_name SEPARATOR ', ')
        LIKE '%{$escapedSearch}%'

        OR

        GROUP_CONCAT(DISTINCT model.model_number SEPARATOR ', ')
        LIKE '%{$escapedSearch}%'
    ");
		}

		/* =========================================================================
		| GROUP BY
		========================================================================= */

		$this->db->group_by('m.id');

		/* =========================================================================
		| ORDER
		========================================================================= */

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

	/* =========================================================================
	| GET DATATABLES
	========================================================================= */

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

	/* =========================================================================
	| COUNT FILTERED
	========================================================================= */

	public function count_filtered()
	{
		$this->_get_datatables_query();

		return $this->db->get()->num_rows();
	}

	/* =========================================================================
	| COUNT ALL
	========================================================================= */

	public function count_all()
	{
		return $this->db
			->from($this->table)
			->count_all_results();
	}

	/* =========================================================================
	| APPLY FILTERS
	========================================================================= */

	private function _apply_filters()
	{
		/* =========================================================================
		| MLM ID
		========================================================================= */

		if ($this->input->post('filtermlm')) {

			$this->db->like(
				'm.mlm_ref_no',
				$this->input->post('filtermlm')
			);
		}

		/* =========================================================================
		| SUPPLIER
		========================================================================= */

		if ($this->input->post('filterSupplier')) {

			$this->db->where(
				'm.supplier_id',
				$this->input->post('filterSupplier')
			);
		}

		/* =========================================================================
		| MATERIAL NAME
		========================================================================= */

		if ($this->input->post('filterMaterialName')) {

			$this->db->like(
				'm.material_name',
				$this->input->post('filterMaterialName')
			);
		}

		/* =========================================================================
		| CLASSIFICATION
		========================================================================= */

		if ($this->input->post('filterClassification')) {

			$this->db->where(
				'mc.classification_id',
				$this->input->post('filterClassification')
			);
		}

		/* =========================================================================
		| COMPOSITION
		========================================================================= */

		if ($this->input->post('filterComposition')) {

			$this->db->like(
				'm.composition',
				$this->input->post('filterComposition')
			);
		}

		/* =========================================================================
		| CONSTRUCTION
		========================================================================= */

		if ($this->input->post('filterConstruction')) {

			$this->db->like(
				'm.construction',
				$this->input->post('filterConstruction')
			);
		}

		/* =========================================================================
		| TECHNOLOGY
		========================================================================= */

		if ($this->input->post('filterTechnology')) {

			$this->db->like(
				'm.technology',
				$this->input->post('filterTechnology')
			);
		}

		/* =========================================================================
		| LOCATION
		========================================================================= */

		if ($this->input->post('filterLocation')) {

			$this->db->where(
				'mloc.location_id',
				$this->input->post('filterLocation')
			);
		}

		/* =========================================================================
		| SAMPLE LEADTIME
		========================================================================= */

		if ($this->input->post('filterSampleLeadtime')) {

			$this->db->where(
				'm.sample_leadtime',
				$this->input->post('filterSampleLeadtime')
			);
		}

		/* =========================================================================
		| PRODUCTION LEADTIME
		========================================================================= */

		if ($this->input->post('filterProductionLeadtime')) {

			$this->db->where(
				'm.production_leadtime',
				$this->input->post('filterProductionLeadtime')
			);
		}

		/* =========================================================================
		| PRICE
		========================================================================= */

		if ($this->input->post('filterPrice')) {

			$this->db->where(
				'm.standard_price',
				$this->input->post('filterPrice')
			);
		}

		/* =========================================================================
		| LIFECYCLE
		========================================================================= */

		if ($this->input->post('filterLifecycle')) {

			$this->db->where(
				'm.lifecycle_id',
				$this->input->post('filterLifecycle')
			);
		}

		/* =========================================================
		| FILTER MATERIAL NAME
		========================================================= */

		$filterMaterialName = $this->input->post(
			'filterMaterialName'
		);

		if (!empty($filterMaterialName)) {

			$this->db->where(
				'm.material_name',
				$filterMaterialName
			);
		}

		/* =========================================================
		| FILTER SUPPLIER
		========================================================= */

		$filterSupplier = $this->input->post(
			'filterSupplier'
		);

		if (!empty($filterSupplier)) {

			$this->db->where(
				'm.supplier_id',
				$filterSupplier
			);
		}
		/* =========================================================
		| FILTER CLASSIFICATION
		========================================================= */

		$filterClassification = $this->input->post(
			'filterClassification'
		);

		if (!empty($filterClassification)) {

			$this->db->where(
				'mc.classification_id',
				$filterClassification
			);
		}
		/* =========================================================
		| FILTER COMPOSITION
		========================================================= */

		$filterComposition = $this->input->post(
			'filterComposition'
		);

		if (!empty($filterComposition)) {

			$this->db->where(
				'm.composition',
				$filterComposition
			);
		}
		/* =========================================================
		| FILTER CONSTRUCTION
		========================================================= */

		$filterConstruction = $this->input->post(
			'filterConstruction'
		);

		if (!empty($filterConstruction)) {

			$this->db->where(
				'm.construction',
				$filterConstruction
			);
		}
		/* =========================================================
		| FILTER TECHNOLOGY
		========================================================= */

		$filterTechnology = $this->input->post(
			'filterTechnology'
		);

		if (!empty($filterTechnology)) {

			$this->db->where(
				'm.technology',
				$filterTechnology
			);
		}
		/* =========================================================
		| FILTER SAMPLE LEADTIME
		========================================================= */

		$filterSampleLeadtime = $this->input->post(
			'filterSampleLeadtime'
		);

		if ($filterSampleLeadtime !== '') {

			$this->db->where(
				'm.sample_leadtime',
				$filterSampleLeadtime
			);
		}
		/* =========================================================
		| FILTER PRODUCTION LEADTIME
		========================================================= */

		$filterProductionLeadtime = $this->input->post(
			'filterProductionLeadtime'
		);

		if ($filterProductionLeadtime !== '') {

			$this->db->where(
				'm.production_leadtime',
				$filterProductionLeadtime
			);
		}

		/* =========================================================
		| FILTER PRICE
		========================================================= */

		$filterPrice = $this->input->post(
			'filterPrice'
		);

		if ($filterPrice !== '') {

			$this->db->where(
				'm.standard_price',
				$filterPrice
			);
		}
	}
}
