<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_materials extends CI_Model
{

	protected $table = 'tbl_materials';
	protected $column_order = [
		null,
		'material_code',
		'material_name',
		'mlm_ref_no'
	];
	protected $column_search = [
		'material_code',
		'material_name',
		'mlm_ref_no',
		'composition',
		'construction',
		's.supplier_name'
	];

	protected $order = [
		'm.id' => 'DESC'
	];

	public function __construct()
	{
		parent::__construct();
	}
	private function _get_datatables_query()
	{
		$this->db->select('

        m.*,
        s.supplier_name,
        lc.lifecycle_name
    ');

		$this->db->from('tbl_materials m');
		$this->db->join(
			'tbl_suppliers s',
			's.id = m.supplier_id',
			'left'
		);

		$this->db->join(
			'tbl_material_lifecycle lc',
			'lc.id = m.lifecycle_id',
			'left'
		);
		/*
    |--------------------------------------------------------------------------
    | SEARCH
    |--------------------------------------------------------------------------
    */
		$i = 0;
		$searchValue = isset($_POST['search']['value']) ? $_POST['search']['value'] : '';

		foreach ($this->column_search as $item) {

			if ($searchValue !== '') {

				if ($i === 0) {

					$this->db->group_start();

					$this->db->like(
						$item,
						$searchValue
					);
				} else {

					$this->db->or_like(
						$item,
						$searchValue
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
    | ORDER
    |--------------------------------------------------------------------------
    */

		$this->db->order_by(
			'm.id',
			'DESC'
		);
	}

	public function get_datatables()
	{

		$this->_get_datatables_query();

		$length = isset($_POST['length']) ? $_POST['length'] : -1;
		$start = isset($_POST['start']) ? $_POST['start'] : 0;

		if ($length != -1) {

			$this->db->limit(
				$length,
				$start
			);
		}

		return $this->db->get()->result();
	}

	public function count_filtered()
	{

		$this->_get_datatables_query();

		return $this->db->get()->num_rows();
	}

	public function count_all()
	{

		$this->db->from($this->table);

		return $this->db->count_all_results();
	}

	// =========================================
	// VIEW MATERIAL BY CODE
	// =========================================
	public function viewMaterialID($id)
	{
		$this->db->select('
		m.*,

		s.supplier_name,

		se.season_name,
		se.season_year,

		l.lifecycle_name,

		wu.uom_name as weight_uom,
		uu.uom_name as width_uom
	');

		$this->db->from('tbl_materials m');

		$this->db->join('tbl_suppliers s', 's.id = m.supplier_id', 'left');

		$this->db->join('tbl_seasons se', 'se.id = m.season_id', 'left');

		$this->db->join('tbl_material_lifecycle l', 'l.id = m.lifecycle_id', 'left');

		$this->db->join('tbl_uom wu', 'wu.id = m.weight_uom_id', 'left');

		$this->db->join('tbl_uom uu', 'uu.id = m.width_uom_id', 'left');

		$this->db->where('m.id', $id);

		$data = $this->db->get()->row_array();

		if (!$data) {
			return null;
		}

		/*
	|-------------------------------------------------
	| GET MODELS
	|-------------------------------------------------
	*/
		$models = $this->db
			->select('mo.model_number')
			->from('tbl_material_models mm')
			->join('tbl_models mo', 'mo.id = mm.model_id')
			->where('mm.material_id', $data['id'])
			->get()
			->result_array();

		$data['models'] = !empty($models)
			? implode(', ', array_column($models, 'model_number'))
			: '-';

		/*
	|-------------------------------------------------
	| GET LOCATIONS
	|-------------------------------------------------
	*/
		$locations = $this->db
			->select('l.location_name')
			->from('tbl_material_locations ml')
			->join('tbl_locations l', 'l.id = ml.location_id')
			->where('ml.material_id', $data['id'])
			->get()
			->result_array();

		$data['locations'] = !empty($locations)
			? implode(', ', array_column($locations, 'location_name'))
			: '-';
		return $data;
	}

	// ========================================================================
	// DELETE MATERIAL + ALL RELATIONS
	// ========================================================================

	public function deleteMaterial($id)
	{
		$this->db->trans_begin();

		try {

			/*
        |------------------------------------------------------------------
        | CHECK MATERIAL EXISTS
        |------------------------------------------------------------------
        */
			$material = $this->db
				->where('id', $id)
				->get('tbl_materials')
				->row();

			if (!$material) {

				throw new Exception('Material not found');
			}

			/*
        |------------------------------------------------------------------
        | GET MATERIAL ASSETS
        |------------------------------------------------------------------
        */
			$assets = $this->db
				->where('material_id', $id)
				->get('tbl_material_assets')
				->result();

			/*
        |------------------------------------------------------------------
        | DELETE ASSET FILES + IMAGES
        |------------------------------------------------------------------
        */
			foreach ($assets as $asset) {

				/*
            |--------------------------------------------------------------
            | DELETE QR FILE
            |--------------------------------------------------------------
            */
				if (!empty($asset->qr_code_file)) {

					$path = FCPATH .
						'uploads/material_assets/qrcode/' .
						$asset->qr_code_file;

					if (file_exists($path)) {
						unlink($path);
					}
				}

				/*
            |--------------------------------------------------------------
            | DELETE BLENDER FILE
            |--------------------------------------------------------------
            */
				if (!empty($asset->blender_material_file)) {

					$path = FCPATH .
						'uploads/material_assets/blender/' .
						$asset->blender_material_file;

					if (file_exists($path)) {
						unlink($path);
					}
				}

				/*
            |--------------------------------------------------------------
            | DELETE U3M FILE
            |--------------------------------------------------------------
            */
				if (!empty($asset->u3m_file)) {

					$path = FCPATH .
						'uploads/material_assets/u3m/' .
						$asset->u3m_file;

					if (file_exists($path)) {
						unlink($path);
					}
				}

				/*
            |--------------------------------------------------------------
            | DELETE GLB FILE
            |--------------------------------------------------------------
            */
				if (!empty($asset->glb_file)) {

					$path = FCPATH .
						'uploads/material_assets/glb/' .
						$asset->glb_file;

					if (file_exists($path)) {
						unlink($path);
					}
				}

				/*
            |--------------------------------------------------------------
            | DELETE MATERIAL ASSET IMAGES
            |--------------------------------------------------------------
            */
				$images = $this->db
					->where('asset_id', $asset->id)
					->get('tbl_material_asset_images')
					->result();

				foreach ($images as $img) {

					if (!empty($img->file_name)) {

						$imgPath = FCPATH .
							'uploads/material_assets/images/' .
							$img->file_name;

						if (file_exists($imgPath)) {
							unlink($imgPath);
						}
					}
				}

				/*
            |--------------------------------------------------------------
            | DELETE tbl_material_asset_images
            |--------------------------------------------------------------
            */
				$this->db->delete(
					'tbl_material_asset_images',
					['asset_id' => $asset->id]
				);
			}

			/*
        |------------------------------------------------------------------
        | GET RELATED MODELS
        |------------------------------------------------------------------
        */
			$materialModels = $this->db
				->where('material_id', $id)
				->get('tbl_material_models')
				->result();

			/*
        |------------------------------------------------------------------
        | DELETE MODEL ASSETS FILES
        |------------------------------------------------------------------
        */
			foreach ($materialModels as $mm) {

				$modelAssets = $this->db
					->where('model_id', $mm->model_id)
					->get('tbl_model_assets')
					->result();

				foreach ($modelAssets as $modelAsset) {

					if (!empty($modelAsset->blender_asset_file)) {

						$blendPath = FCPATH .
							'uploads/model_assets/' .
							$modelAsset->blender_asset_file;

						if (file_exists($blendPath)) {
							unlink($blendPath);
						}
					}
				}

				/*
            |--------------------------------------------------------------
            | DELETE tbl_model_assets
            |--------------------------------------------------------------
            */
				$this->db->delete(
					'tbl_model_assets',
					['model_id' => $mm->model_id]
				);
			}

			/*
        |------------------------------------------------------------------
        | DELETE RELATION TABLES
        |------------------------------------------------------------------
        */

			// tbl_material_tags
			$this->db->delete(
				'tbl_material_tags',
				['material_id' => $id]
			);

			// tbl_material_classifications
			$this->db->delete(
				'tbl_material_classifications',
				['material_id' => $id]
			);

			// tbl_material_locations
			$this->db->delete(
				'tbl_material_locations',
				['material_id' => $id]
			);

			// tbl_material_models
			$this->db->delete(
				'tbl_material_models',
				['material_id' => $id]
			);

			// tbl_material_assets
			$this->db->delete(
				'tbl_material_assets',
				['material_id' => $id]
			);

			/*
        |------------------------------------------------------------------
        | DELETE MAIN MATERIAL
        |------------------------------------------------------------------
        */
			$this->db->delete(
				'tbl_materials',
				['id' => $id]
			);

			/*
        |------------------------------------------------------------------
        | TRANSACTION CHECK
        |------------------------------------------------------------------
        */
			if ($this->db->trans_status() === FALSE) {

				$this->db->trans_rollback();

				return false;
			}

			$this->db->trans_commit();

			return true;
		} catch (Exception $e) {

			$this->db->trans_rollback();

			log_message(
				'error',
				'Delete Material Error : ' . $e->getMessage()
			);

			return false;
		}
	}

	public function updateMaterial($id, $data)
	{
		$this->db->trans_begin();

		/* =========================================================
	| VALIDATE MATERIAL
	========================================================= */

		$check = $this->db
			->get_where('tbl_materials', [
				'id' => $id
			])
			->row();

		if (!$check) {
			return false;
		}

		/* =========================================================
	| UPDATE tbl_materials
	========================================================= */

		// $materialData = [

		// 	'material_name'        => $data['material_name'] ?? null,
		// 	'mlm_ref_no'           => $data['mlm_ref_no'] ?? null,
		// 	'library_code'         => $data['library_code'] ?? null,

		// 	'supplier_id'          => $data['supplier_id'] ?? null,
		// 	'material_type_id'     => $data['material_type_id'] ?? null,
		// 	'season_id'            => $data['season_id'] ?? null,
		// 	'lifecycle_id'         => $data['lifecycle_id'] ?? null,

		// 	'standard_price'       => $data['standard_price'] ?? 0,

		// 	'sample_leadtime'      => $data['sample_leadtime'] ?? 0,
		// 	'production_leadtime'  => $data['production_leadtime'] ?? 0,

		// 	'composition'          => $data['composition'] ?? null,
		// 	'construction'         => $data['construction'] ?? null,
		// 	'technology'           => $data['technology'] ?? null,

		// 	'weight'               => $data['weight'] ?? 0,
		// 	'weight_uom_id'        => $data['weight_uom_id'] ?? null,

		// 	'thickness'            => $data['thickness'] ?? 0,

		// 	'width'                => $data['width'] ?? 0,
		// 	'width_uom_id'         => $data['width_uom_id'] ?? null,

		// 	'pwi_inline_model'     => $data['pwi_inline_model'] ?? null,

		// 	'updated_at'           => date('Y-m-d H:i:s')

		// ];
		$materialData = [

			'material_name'       => $data['material_name'],
			'mlm_ref_no'          => $data['mlm_ref_no'],
			'library_code'        => $data['library_code'],

			'supplier_id'         => !empty($data['supplier_id'])
				? $data['supplier_id']
				: null,

			'material_type_id'    => !empty($data['material_type_id'])
				? $data['material_type_id']
				: null,

			'season_id'           => !empty($data['season_id'])
				? $data['season_id']
				: null,

			'lifecycle_id'        => !empty($data['lifecycle_id'])
				? $data['lifecycle_id']
				: null,

			'standard_price'      => $data['standard_price'] !== ''
				? $data['standard_price']
				: null,

			'sample_leadtime'     => $data['sample_leadtime'] !== ''
				? $data['sample_leadtime']
				: null,

			'production_leadtime' => $data['production_leadtime'] !== ''
				? $data['production_leadtime']
				: null,

			'composition'         => $data['composition'],
			'construction'        => $data['construction'],
			'technology'          => $data['technology'],

			'weight'              => $data['weight'] !== ''
				? $data['weight']
				: null,

			'weight_uom_id'       => !empty($data['weight_uom_id'])
				? $data['weight_uom_id']
				: null,

			'thickness'           => $data['thickness'] !== ''
				? $data['thickness']
				: null,

			'width'               => $data['width'] !== ''
				? $data['width']
				: null,

			'width_uom_id'        => !empty($data['width_uom_id'])
				? $data['width_uom_id']
				: null,

			'pwi_inline_model'    => $data['pwi_inline_model'],

			'updated_at'          => date('Y-m-d H:i:s')

		];

		$this->db->where('id', $id);
		$this->db->update('tbl_materials', $materialData);

		/* =========================================================
	| UPDATE CLASSIFICATIONS
	| tbl_material_classifications
	========================================================= */

		$this->db->where('material_id', $id);
		$this->db->delete('tbl_material_classifications');

		if (
			isset($data['classification_ids']) &&
			is_array($data['classification_ids']) &&
			count($data['classification_ids']) > 0
		) {

			$classificationBatch = [];

			foreach ($data['classification_ids'] as $classification_id) {

				if ($classification_id != '') {

					$classificationBatch[] = [

						'material_id'       => $id,
						'classification_id' => $classification_id,
						'created_at'        => date('Y-m-d H:i:s')

					];
				}
			}

			if (!empty($classificationBatch)) {

				$this->db->insert_batch(
					'tbl_material_classifications',
					$classificationBatch
				);
			}
		}

		/* =========================================================
	| UPDATE LOCATIONS
	| tbl_material_locations
	========================================================= */

		$this->db->where('material_id', $id);
		$this->db->delete('tbl_material_locations');

		if (
			isset($data['location_id']) &&
			is_array($data['location_id']) &&
			count($data['location_id']) > 0
		) {

			$locationBatch = [];

			foreach ($data['location_id'] as $location_id) {

				if ($location_id != '') {

					$locationBatch[] = [

						'material_id' => $id,
						'location_id' => $location_id,
						'created_at'  => date('Y-m-d H:i:s')

					];
				}
			}

			if (!empty($locationBatch)) {

				$this->db->insert_batch(
					'tbl_material_locations',
					$locationBatch
				);
			}
		}

		/* =========================================================
	| UPDATE MODEL NUMBERS
	| tbl_material_models
	========================================================= */

		$this->db->where('material_id', $id);
		$this->db->delete('tbl_material_models');

		/*
	| model_numbers tidak wajib
	*/

		if (
			isset($data['model_numbers']) &&
			is_array($data['model_numbers']) &&
			count($data['model_numbers']) > 0
		) {

			$modelBatch = [];

			foreach ($data['model_numbers'] as $model_id) {

				if ($model_id != '') {

					$modelBatch[] = [

						'material_id' => $id,
						'model_id'    => $model_id,
						'created_at'  => date('Y-m-d H:i:s')

					];
				}
			}

			if (!empty($modelBatch)) {

				$this->db->insert_batch(
					'tbl_material_models',
					$modelBatch
				);
			}
		}

		/* =========================================================
	| TRANSACTION RESULT
	========================================================= */

		if ($this->db->trans_status() === FALSE) {

			$this->db->trans_rollback();

			log_message(
				'error',
				'Update Material Failed : ' . $this->db->last_query()
			);

			return false;
		} else {

			$this->db->trans_commit();

			return true;
		}
	}

	/* =========================================================
| QUERY
========================================================= */

	private function _getCardMaterialsQuery()
	{
		$this->db->select('
		m.id,
		m.material_code,
		m.material_name,
		m.library_code,

		mt.material_type_name,

		s.supplier_name,

		ma.qr_code_file,

		(
			SELECT file_name
			FROM tbl_material_asset_images
			WHERE asset_id = ma.id
			AND is_cover = 1
			LIMIT 1
		) as image_file
	');

		$this->db->from('tbl_materials m');

		$this->db->join(
			'tbl_material_types mt',
			'mt.id = m.material_type_id',
			'left'
		);

		$this->db->join(
			'tbl_suppliers s',
			's.id = m.supplier_id',
			'left'
		);

		$this->db->join(
			'tbl_material_assets ma',
			'ma.material_id = m.id',
			'left'
		);

		/* SEARCH */

		if (!empty($_POST['search']['value'])) {

			$search = $_POST['search']['value'];

			$this->db->group_start();

			$this->db->like(
				'm.material_code',
				$search
			);

			$this->db->or_like(
				'm.material_name',
				$search
			);

			$this->db->or_like(
				's.supplier_name',
				$search
			);

			$this->db->group_end();
		}
	}

	/* =========================================================
| GET DATA
========================================================= */

	public function getCardMaterials()
	{
		$this->_getCardMaterialsQuery();

		if ($_POST['length'] != -1) {

			$this->db->limit(
				$_POST['length'],
				$_POST['start']
			);
		}

		return $this->db->get()->result();
	}

	/* =========================================================
| COUNT FILTER
========================================================= */

	public function countFilteredCardMaterials()
	{
		$this->_getCardMaterialsQuery();

		return $this->db->get()->num_rows();
	}

	/* =========================================================
| COUNT ALL
========================================================= */

	public function countAllCardMaterials()
	{
		return $this->db
			->count_all('tbl_materials');
	}


	public function deleteAssetsMaterial($id)
	{
		$this->db->trans_begin();

		/* =========================================================
	| GET ASSET
	========================================================= */

		$asset = $this->db
			->get_where(
				'tbl_material_assets',
				['id' => $id]
			)
			->row();

		if (!$asset) {
			return false;
		}

		/* =========================================================
	| DELETE QR CODE FILE
	========================================================= */

		if (!empty($asset->qr_code_file)) {

			$file = FCPATH .
				'uploads/qrcode/' .
				$asset->qr_code_file;

			if (file_exists($file)) {
				@unlink($file);
			}
		}

		/* =========================================================
	| DELETE BLEND FILE
	========================================================= */

		if (!empty($asset->blender_material_file)) {

			$file = FCPATH .
				'uploads/material_assets/blender_material/' .
				$asset->blender_material_file;

			if (file_exists($file)) {
				@unlink($file);
			}
		}

		/* =========================================================
	| DELETE U3M FILE
	========================================================= */

		if (!empty($asset->u3m_file)) {

			$file = FCPATH .
				'uploads/material_assets/u3m/' .
				$asset->u3m_file;

			if (file_exists($file)) {
				@unlink($file);
			}
		}

		/* =========================================================
	| DELETE GLB FILE
	========================================================= */

		if (!empty($asset->glb_file)) {

			$file = FCPATH .
				'uploads/material_assets/glb/' .
				$asset->glb_file;

			if (file_exists($file)) {
				@unlink($file);
			}
		}

		/* =========================================================
	| DELETE ALL MATERIAL IMAGES
	========================================================= */

		$images = $this->db
			->get_where(
				'tbl_material_asset_images',
				[
					'asset_id' => $id
				]
			)
			->result();

		if (!empty($images)) {

			foreach ($images as $img) {

				if (!empty($img->file_name)) {

					$file = FCPATH .
						'uploads/material_assets/images/' .
						$img->file_name;

					if (file_exists($file)) {
						@unlink($file);
					}
				}
			}

			$this->db->delete(
				'tbl_material_asset_images',
				[
					'asset_id' => $id
				]
			);
		}

		/* =========================================================
	| DELETE MAIN ASSET RECORD
	========================================================= */

		$this->db->delete(
			'tbl_material_assets',
			['id' => $id]
		);

		/* =========================================================
	| TRANSACTION
	========================================================= */

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return false;
		}

		$this->db->trans_commit();

		return true;
	}
}

/* End of file: M_materials.php */
