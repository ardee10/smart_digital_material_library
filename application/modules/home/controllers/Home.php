<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_materials');
		$this->load->model('M_materialServerside');
		$this->load->model('M_material_assets_serverside');
		$this->load->model('M_modelassets');
		$this->load->model('M_model');

		//	Load check Login as administrator and users
		check_login(['administrator', 'users']);
	}
	public function Dashboard()
	{
		$data = [
			'title'      	=> 'DIGITAL MATERIAL LIBRARIES',
			'active'     	=> 'Dashboard',
			// 'breadcrumb' 	=> ['Home'],
			'users' 	 	=> $this->db->get_where('tbl_users', ['username' =>  $this->session->userdata('username')])->row(),
			'suppliers'  	=> $this->db->get('tbl_suppliers')->result()
		];
		$this->template->load('tema/index', 'index', $data);
	}
	public function materialsGrid()
	{

		// Build base query
		$this->db
			->select('m.*, s.supplier_name, ml.lifecycle_name')
			->from('tbl_materials m')
			->join('tbl_suppliers s', 's.id = m.supplier_id', 'left')
			->join('tbl_material_lifecycle ml', 'ml.id = m.lifecycle_id', 'left');

		if ($this->input->post('filtermlm')) {
			$this->db->like(
				'm.mlm_ref_no',
				$this->input->post('filtermlm')
			);
		}

		if ($this->input->post('filterSupplier')) {
			$this->db->where(
				'm.supplier_id',
				$this->input->post('filterSupplier')
			);
		}

		if ($this->input->post('filterMaterialName')) {
			$this->db->like(
				'm.material_name',
				$this->input->post('filterMaterialName')
			);
		}

		if ($this->input->post('filterClassification')) {
			$this->db->where(
				'EXISTS (
					SELECT 1
					FROM tbl_material_classifications mc
					WHERE mc.material_id = m.id
					AND mc.classification_id = ' . $this->db->escape(
					$this->input->post('filterClassification')
				) . '
				)'
			);
		}

		if ($this->input->post('filterComposition')) {
			$this->db->where(
				'm.composition',
				$this->input->post('filterComposition')
			);
		}

		if ($this->input->post('filterConstruction')) {
			$this->db->where(
				'm.construction',
				$this->input->post('filterConstruction')
			);
		}

		if ($this->input->post('filterTechnology')) {
			$this->db->like(
				'm.technology',
				$this->input->post('filterTechnology')
			);
		}

		if ($this->input->post('filterLocation')) {
			$this->db->where(
				'EXISTS (
					SELECT 1
					FROM tbl_material_locations mloc
					WHERE mloc.material_id = m.id
					AND mloc.location_id = ' . $this->db->escape(
					$this->input->post('filterLocation')
				) . '
				)'
			);
		}

		if ($this->input->post('filterSampleLeadtime') !== '') {
			$this->db->where(
				'm.sample_leadtime',
				$this->input->post('filterSampleLeadtime')
			);
		}

		if ($this->input->post('filterProductionLeadtime') !== '') {
			$this->db->where(
				'm.production_leadtime',
				$this->input->post('filterProductionLeadtime')
			);
		}

		if ($this->input->post('filterPrice') !== '') {
			$this->db->where(
				'm.standard_price',
				$this->input->post('filterPrice')
			);
		}

		if ($this->input->post('filterLifecycle')) {
			$this->db->where(
				'm.lifecycle_id',
				$this->input->post('filterLifecycle')
			);
		}

		$materials = $this->db
			->limit(24)
			->order_by('m.id', 'DESC')
			->get()
			->result();

		$html = '';

		foreach ($materials as $m) {
			// default image
			$image = base_url('assets/images/No_Image_Available.jpg');

			// try to find a material asset image (cover) in uploads/material_assets/images
			$img = $this->db
				->select('mai.file_name')
				->from('tbl_material_assets ma')
				->join('tbl_material_asset_images mai', 'mai.asset_id = ma.id', 'left')
				->where('ma.material_id', $m->id)
				->order_by('mai.is_cover', 'DESC')
				->limit(1)
				->get()
				->row();

			if (!empty($img->file_name)) {
				$path = FCPATH . 'uploads/material_assets/images/' . $img->file_name;
				if (file_exists($path)) {
					$image = base_url('uploads/material_assets/images/' . $img->file_name);
				}
			}

			// build card HTML
			$html .= '<div class="col-md-2 mb-4">'
				. '<div class="card h-100 shadow-sm">'
				. '<img src="' . $image . '" class="card-img-top" style="height: auto;object-fit:cover;">'
				. '<div class="card-body">'
				. '<h6 class="fw-bold mb-1">' . htmlspecialchars($m->material_name) . '</h6>'
				. '<small class="text-muted">' . htmlspecialchars($m->material_code) . '</small>'
				. '<hr>'
				. '<div class="small mb-1"><strong>Supplier:</strong> ' . htmlspecialchars($m->supplier_name) . '</div>'
				. '<div class="small mb-1"><strong>Composition:</strong> ' . htmlspecialchars($m->composition) . '</div>'
				. '<div class="small"><strong>Lifecycle:</strong> ' . htmlspecialchars($m->lifecycle_name) . '</div>'
				. '</div>'
				. '<div class="card-footer bg-white">'
				. '<button class="btn btn-primary btn-sm"><i class="bi bi-download"></i> Download</button> '
				. '<button class="btn btn-info btn-sm text-white" data-id="' . htmlspecialchars($m->material_code) . '" onclick="viewMaterial(this)"><i class="bi bi-eye"></i> View</button>'
				. '</div>'
				. '</div>'
				. '</div>';
		}

		echo $html;
	}

	public function materialServerside()
	{
		$list = $this->M_materialServerside->get_datatables();

		$data = [];

		$no = $_POST['start'];

		foreach ($list as $o) {

			/* =========================================================
		| COVER IMAGE
		========================================================= */

			$cover = '

		<div class="text-center">

			<img
				src="' . base_url('assets/images/No_Image_Available.jpg') . '"

				class="img-thumbnail shadow-sm"

				style="
					width:70px;
					height:70px;
					object-fit:cover;
					border-radius:10px;
				">

		</div>

		';

			if (!empty($o->cover_image)) {

				$coverPath = FCPATH .
					'uploads/material_assets/images/' .
					$o->cover_image;

				if (file_exists($coverPath)) {

					$cover = '

				<div class="text-center">

					<img
						src="' . base_url(
						'uploads/material_assets/images/' .
							$o->cover_image
					) . '"

						class="img-thumbnail shadow-sm"

						style="
							width:70px;
							height:70px;
							object-fit:cover;
							border-radius:10px;
							cursor:pointer;
						"

						onclick="previewImage(this.src)">

				</div>

				';
				}
			}

			/* =========================================================
		| LIFECYCLE BADGE
		========================================================= */

			$badge = 'secondary';

			switch (strtolower($o->lifecycle_name)) {

				case 'released':
					$badge = 'success';
					break;

				case 'limited release':
					$badge = 'warning';
					break;

				case 'inactive':
					$badge = 'danger';
					break;

				case 'created':
					$badge = 'info';
					break;

				case 'rejected':
					$badge = 'dark';
					break;
			}

			/* =========================================================
		| LOCATION
		========================================================= */

			$location = '-';

			if (!empty($o->location_names)) {
				$locations = explode(',', $o->location_names);
				$htmlLocation = '';
				foreach ($locations as $loc) {

					$htmlLocation .= '

				<span class="badge bg-light text-dark border me-1 mb-1">

					' . trim($loc) . '

				</span>

				';
				}

				$location = $htmlLocation;
			}

			/* =========================================================
		| LEADTIME
		========================================================= */

			$productionLeadtime = !empty($o->production_leadtime)
				? $o->production_leadtime . ' Days'
				: '-';

			$sampleLeadtime = !empty($o->sample_leadtime)
				? $o->sample_leadtime . ' Days'
				: '-';


			/* =========================================================
		| MLM ID
		========================================================= */

			$mlmId = !empty($o->mlm_ref_no)
				? $o->mlm_ref_no
				: '-';

			/* =========================================================
		| MATERIAL TYPE
		========================================================= */

			$materialType = !empty($o->material_type_name)
				? $o->material_type_name
				: '-';

			/* =========================================================
	| MODEL NUMBERS
	========================================================= */

			$modelNumbers = '-';

			if (!empty($o->model_numbers)) {

				$models = explode(',', $o->model_numbers);
				$htmlModels = '';
				foreach ($models as $mdl) {
					$htmlModels .= '

        <span class="badge bg-dark me-1 mb-1">

            ' . trim($mdl) . '

        </span>

        ';
				}
				$modelNumbers = $htmlModels;
			}

			/* =========================================================
		| MATERIAL INFO
		========================================================= */

			$materialInfo = '

		<div class="fw-bold text-dark">
			' . $o->material_code . '
		</div>

		<div class="small text-muted">
			' . $o->material_name . '

		</div>

		';

			/* =========================================================
		| SUPPLIER INFO
		========================================================= */

			$supplierInfo = '

		<div class="fw-semibold">

			' . $o->supplier_name . '

		</div>

		
		';

			/* =========================================================
		| ACTION BUTTON
		========================================================= */

			$action = '

		<div class="btn-group btn-group-sm" role="group">

			<button
				class="btn btn-info text-white me-1"
				data-id="' . $o->material_code . '"
				onclick="viewMaterial(this)">
				<i class="bi bi-eye"></i>
			</button>

			<button
				class="btn btn-warning me-1"
				data-id="' . $o->id . '"
				onclick="editMaterial(this)">
				<i class="bi bi-pencil"></i>

			</button>
			<button
				class="btn btn-info btn-pdf me-1"
				data-material-code="' . htmlspecialchars($o->material_code) . '"
				onclick="generateMaterialPDF(' . $o->material_code . ')" >
				<i class="bi bi-file-earmark-pdf"></i>
			</button>


			<a
				href="' . base_url(
				'Home/deleteMaterial/' . $o->id
			) . '"

				class="btn btn-danger tombol-hapus">

				<i class="bi bi-trash"></i>

			</a>

		</div>

		';

			/* =========================================================
		| ROW DATA
		========================================================= */

			$row = [];

			$row[] = ++$no;

			$row[] = $cover;

			$row[] = '

<div class="fw-bold text-primary">

    ' . $mlmId . '

</div>

';

			$row[] = $materialInfo;
			$row[] = '

<span class="badge bg-secondary">

    ' . $materialType . '

</span>

';

			$row[] = $supplierInfo;
			$row[] = $location;
			$row[] = '

		<div style="
			max-width:220px;
			white-space:normal;
		">
			' . $o->composition . '

		</div>

		';
			$row[] = '
		<span class="badge bg-primary">
			' . $productionLeadtime . '
		</span>

		';
			$row[] = '
		<span class="badge bg-info text-dark">
			' . $sampleLeadtime . '
		</span>

		';
			$row[] = $modelNumbers;
			$row[] = '

<span class="badge bg-' . $badge . '">
    ' . $o->lifecycle_name . '
</span>
';
			$row[] = $action;
			$data[] = $row;
		}

		echo json_encode([

			"draw" => $_POST['draw'],
			"recordsTotal" =>
			$this->M_materialServerside->count_all(),

			"recordsFiltered" =>
			$this->M_materialServerside->count_filtered(),

			"data" => $data

		]);
	}
	//Get Supplier Data
	public function getSuppliers()
	{
		$search = $this->input->post('search');
		$this->db->select('id, supplier_name');

		if ($search) {
			$this->db->like('supplier_name', $search);
		}
		$this->db->limit(20);
		$query = $this->db->get('tbl_suppliers')->result();

		$data = [];

		foreach ($query as $row) {

			$data[] = [

				'id'   => $row->id,
				'text' => $row->supplier_name

			];
		}

		echo json_encode($data);
	}

	public function getMaterialTypes()
	{
		$query = $this->db
			->select('id, material_type_name')
			->from('tbl_material_types')
			->order_by('material_type_name', 'ASC')
			->get()
			->result();

		$data = [];

		foreach ($query as $row) {

			$data[] = [

				'id'   => $row->id,
				'text' => $row->material_type_name

			];
		}

		echo json_encode($data);
	}
	// Get Classifications
	public function getClassifications()
	{
		$search = $this->input->post('search');

		$this->db->select('id, classification_name AS text');
		$this->db->from('tbl_classifications');

		if ($search) {
			$this->db->like('classification_name', $search);
		}

		$this->db->limit(20);
		$query = $this->db->get()->result();

		$data = [];
		foreach ($query as $row) {
			$data[] = [
				'id' 	=> $row->id,
				'text' 	=> $row->text
			];
		}

		echo json_encode($data);
	}
	// Get Model Numbers
	public function getModelNumber()
	{
		$search = $this->input->post('search');
		if ($search === null) {
			$search = $this->input->get('term');
		}

		$this->db->select('id, model_number AS text');
		$this->db->from('tbl_models');

		if ($search) {
			$this->db->like('model_number', $search);
		}

		$this->db->order_by('model_number', 'ASC');
		$this->db->limit(20);
		$query = $this->db->get()->result();

		$data = [];
		foreach ($query as $row) {
			$data[] = [
				'id' => $row->id,
				'text' => $row->text
			];
		}

		echo json_encode(['results' => $data]);
	}
	// Get Locations
	public function getLocations()
	{
		$search = $this->input->post('search');
		$this->db->select('id, location_name');
		$this->db->from('tbl_locations');
		if (!empty($search)) {
			$this->db->like('location_name', $search);
		}
		$this->db->order_by('location_name', 'ASC');
		$this->db->limit(20);

		$query = $this->db->get()->result();

		$data = [];

		foreach ($query as $row) {

			$data[] = [
				'id'   => $row->id,
				'text' => $row->location_name
			];
		}

		echo json_encode([
			'results' => $data
		]);
	}
	// Apply Filter
	public function applyFilter()
	{
		$supplier_id = $this->input->post('supplier_id');
		$classification = $this->input->post('classification');
		$location = $this->input->post('location');
		$season = $this->input->post('season');
		$lifecycle_id = $this->input->post('lifecycle_id');

		$this->db->select('m.*,
			s.supplier_name,
			ml.lifecycle_name
		');

		$this->db->from('tbl_materials m');
		$this->db->join('tbl_suppliers s', 's.id = m.supplier_id', 'left');
		$this->db->join('tbl_material_lifecycle ml', 'ml.id = m.lifecycle_id', 'left');

		if ($supplier_id) {
			$this->db->where('m.supplier_id', $supplier_id);
		}

		if ($classification) {
			if ($this->db->table_exists('tbl_material_classifications')) {
				$this->db->join('tbl_material_classifications mc', 'mc.material_id = m.id', 'inner');
				if (is_array($classification)) {
					$this->db->where_in('mc.classification_id', $classification);
				} else {
					$this->db->where('mc.classification_id', $classification);
				}
				$this->db->group_by('m.id'); // To avoid duplicates
			}
		}

		if ($location) {
			$this->db->where('m.location', $location);
		}

		if ($season) {
			$this->db->where('m.season_id', $season);
		}

		if ($lifecycle_id) {
			$this->db->where('m.lifecycle_id', $lifecycle_id);
		}

		$this->db->order_by('m.id', 'DESC');
		$materials = $this->db->get()->result();

		$html = '';
		foreach ($materials as $m) {
			$image = base_url('assets/images/No_Image_Available.jpg');
			if (!empty($m->render_material)) {
				$path = FCPATH . 'assets/materials/' . $m->render_material;

				if (file_exists($path)) {
					$image = base_url('assets/materials/' . $m->render_material);
				}
			}

			$html .= '
			<div class="col-md-2 mb-4">
				<div class="card h-100 shadow-sm">
					<img src="' . $image . '"
						class="card-img-top"
						style="height: auto;object-fit:cover;">

					<div class="card-body">
						<h6 class="fw-bold mb-1">
							' . $m->material_name . '
						</h6>

						<small class="text-muted">
							' . $m->material_code . '
						</small>

						<hr>

						<div class="small mb-1">
							<strong>Supplier:</strong>
							' . $m->supplier_name . '
						</div>

						<div class="small mb-1">
							<strong>Composition:</strong>
							' . $m->composition . '
						</div>

						<div class="small">
							<strong>Lifecycle:</strong>
							' . $m->lifecycle_name . '
						</div>
					</div>

					<div class="card-footer bg-white">
						<button class="btn btn-primary btn-sm"><i class="bi bi-download"></i> Download</button>
						<button class="btn btn-info btn-sm text-white"><i class="bi bi-eye"></i> View</button>
					</div>
				</div>
			</div>';
		}

		echo json_encode([
			'success' => true,
			'html' => $html,
			'count' => count($materials)
		]);
	}
	// Get Lifecycles
	public function getLifecycles()
	{
		$this->db->select('id, lifecycle_name as text');
		$lifecycles = $this->db->get('tbl_material_lifecycle')->result();

		$data = [];
		foreach ($lifecycles as $row) {
			$data[] = [
				'id' => $row->id,
				'text' => $row->text
			];
		}

		echo json_encode($data);
	}
	// Get Seasons
	public function getSeasons()
	{
		$search = $this->input->post('search');

		$this->db->select('id, season_name, season_year');
		$this->db->from('tbl_seasons');

		if (!empty($search)) {

			$this->db->group_start();
			$this->db->like('season_name', $search);
			$this->db->or_like('season_year', $search);
			$this->db->group_end();
		}

		$this->db->order_by('season_year', 'DESC');
		$this->db->limit(20);

		$query = $this->db->get()->result();

		$data = [];

		foreach ($query as $row) {

			$data[] = [
				'id'   => $row->id,
				'text' => $row->season_name . ' ' . $row->season_year
			];
		}

		echo json_encode([
			'results' => $data
		]);
	}
	// Weight UOM
	public function getWeightUOM()
	{
		header('Content-Type: application/json');

		$data = $this->db
			->where('uom_type', 'WEIGHT')
			->get('tbl_uom')
			->result();

		echo json_encode($data);
	}

	// Width UOM
	public function getWidthUOM()
	{
		header('Content-Type: application/json');

		$data = $this->db
			->where('uom_type', 'WIDTH')
			->get('tbl_uom')
			->result();

		echo json_encode($data);
	}

	// ========================================
	// ADD MATERIAL - 3 STEP PROCESS
	// ========================================
	// Step 1: Save tbl_materials
	// Step 2: Loop model numbers - check/create in tbl_models, insert in tbl_material_models
	// Step 3: Loop locations - insert in tbl_material_locations
	// public function addMaterial()
	public function saveMaterial()
	{
		header('Content-Type: application/json');

		try {

			/*
		|--------------------------------------------------------------------------
		| VALIDATION
		|--------------------------------------------------------------------------
		*/
			$material_code = trim($this->input->post('material_code'));
			$material_name = trim($this->input->post('material_name'));

			if (empty($material_code) || empty($material_name)) {

				echo json_encode([
					'success' => false,
					'message' => 'Material Code and Material Name are required'
				]);
				return;
			}

			/*
		|--------------------------------------------------------------------------
		| CHECK DUPLICATE MATERIAL CODE
		|--------------------------------------------------------------------------
		*/
			$existingMaterial = $this->db
				->where('material_code', $material_code)
				->get('tbl_materials')
				->row();

			if ($existingMaterial) {

				echo json_encode([
					'success' => false,
					'message' => 'Material Code already exists'
				]);
				return;
			}

			/*
		|--------------------------------------------------------------------------
		| START TRANSACTION
		|--------------------------------------------------------------------------
		*/
			$this->db->trans_begin();

			/*
		|--------------------------------------------------------------------------
		| HANDLE SEASON
		|--------------------------------------------------------------------------
		*/
			/*
		|--------------------------------------------------------------------------
		| HANDLE SEASON
		|--------------------------------------------------------------------------
		*/
			$seasonId = $this->input->post('season_id');

			if (empty($seasonId)) {

				echo json_encode([
					'success' => false,
					'message' => 'Season is required'
				]);

				return;
			}

			/*
		|--------------------------------------------------------------------------
		| INSERT tbl_materials
		|--------------------------------------------------------------------------
		*/
			$materialData = [


				'material_code' 			=> $material_code,
				'material_name' 			=> $material_name,
				'mlm_ref_no' 				=> trim($this->input->post('mlm_ref_no')),
				'library_code' 				=> trim($this->input->post('library_code')),
				'supplier_id' 				=> $this->input->post('supplier_id') ?: null,
				'material_type_id' 			=> $this->input->post('material_type_id') ?: null,
				'season_id' 				=> $seasonId,
				'lifecycle_id' 				=> $this->input->post('lifecycle_id') ?: null,
				'standard_price' 			=> $this->input->post('standard_price') ?: null,

				'sample_leadtime' 			=> $this->input->post('sample_leadtime') ?: null,
				'production_leadtime' 		=> $this->input->post('production_leadtime') ?: null,

				'weight' 					=> $this->input->post('weight') ?: null,
				'weight_uom_id' 			=> $this->input->post('weight_uom_id') ?: null,

				'thickness' 				=> $this->input->post('thickness') ?: null,

				'width' 					=> $this->input->post('width') ?: null,
				'width_uom_id' 				=> $this->input->post('width_uom_id') ?: null,

				'composition' 				=> trim($this->input->post('composition')),
				'construction' 				=> trim($this->input->post('construction')),
				'technology' 				=> trim($this->input->post('technology')),

				'pwi_inline_model' 			=> trim($this->input->post('pwi_inline_model')),

				'created_at' 				=> date('Y-m-d H:i:s'),
				'updated_at' 				=> date('Y-m-d H:i:s')
			];

			$materialData = array_filter($materialData, function ($value) {
				return $value !== '';
			});

			// $this->db->insert('tbl_materials', $materialData);
			if (!$this->db->insert('tbl_materials', $materialData)) {

				throw new Exception($this->db->error()['message']);
			}

			$material_id = $this->db->insert_id();

			/*
		|--------------------------------------------------------------------------
		| INSERT CLASSIFICATIONS
		|--------------------------------------------------------------------------
		*/
			$classificationIds = $this->input->post('classification_ids');

			if (!empty($classificationIds) && is_array($classificationIds)) {

				foreach ($classificationIds as $classification_id) {

					if (!empty($classification_id)) {

						$this->db->insert('tbl_material_classifications', [
							'material_id' 		=> $material_id,
							'classification_id' => $classification_id,
							'created_at' 		=> date('Y-m-d H:i:s')
						]);
					}
				}
			}

			/*
		|--------------------------------------------------------------------------
		| INSERT MODEL NUMBERS
		|--------------------------------------------------------------------------
		*/
			$modelNumbers = $this->input->post('model_numbers');

			if (!empty($modelNumbers) && is_array($modelNumbers)) {

				foreach ($modelNumbers as $model_entry) {

					$model_entry = trim($model_entry);

					if (empty($model_entry)) {
						continue;
					}

					$model_id = null;

					/*
				|--------------------------------------------------------------------------
				| EXISTING MODEL ID
				|--------------------------------------------------------------------------
				*/
					if (is_numeric($model_entry)) {

						$existingModel = $this->db
							->where('id', $model_entry)
							->get('tbl_models')
							->row();

						if ($existingModel) {
							$model_id = $existingModel->id;
						}
					}

					/*
				|--------------------------------------------------------------------------
				| NEW MODEL
				|--------------------------------------------------------------------------
				*/
					if (!$model_id) {

						$model_number = str_replace('new:', '', $model_entry);

						$existingModelByNumber = $this->db
							->where('model_number', $model_number)
							->get('tbl_models')
							->row();

						if ($existingModelByNumber) {

							$model_id = $existingModelByNumber->id;
						} else {

							$this->db->insert('tbl_models', [
								'model_number' => $model_number,
								'created_at'   => date('Y-m-d H:i:s')
							]);

							$model_id = $this->db->insert_id();
						}
					}

					/*
				|--------------------------------------------------------------------------
				| INSERT tbl_material_models
				|--------------------------------------------------------------------------
				*/
					$checkMaterialModel = $this->db
						->where('material_id', $material_id)
						->where('model_id', $model_id)
						->get('tbl_material_models')
						->row();

					if (!$checkMaterialModel) {

						$this->db->insert('tbl_material_models', [
							'material_id' 	=> $material_id,
							'model_id' 		=> $model_id,
							'created_at' 	=> date('Y-m-d H:i:s')
						]);
					}
				}
			}

			/*
		|--------------------------------------------------------------------------
		| INSERT LOCATIONS
		|--------------------------------------------------------------------------
		*/
			$location_ids = $this->input->post('location_id');

			if (!empty($location_ids) && is_array($location_ids)) {

				foreach ($location_ids as $location_id) {

					$existsLocation = $this->db
						->where('material_id', $material_id)
						->where('location_id', $location_id)
						->get('tbl_material_locations')
						->row();

					if (!$existsLocation) {

						$this->db->insert('tbl_material_locations', [
							'material_id' 	=> $material_id,
							'location_id' 	=> $location_id,
							'created_at' 	=> date('Y-m-d H:i:s')
						]);
					}
				}
			}

			/*
		|--------------------------------------------------------------------------
		| TRANSACTION CHECK
		|--------------------------------------------------------------------------
		*/
			if ($this->db->trans_status() === FALSE) {

				$this->db->trans_rollback();

				echo json_encode([
					'success' => false,
					'message' => 'Failed to save material'
				]);
			} else {

				$this->db->trans_commit();

				echo json_encode([
					'success' 	 => true,
					'message' 	 => 'Material saved successfully',
					'material_id' => $material_id
				]);
			}
		} catch (Exception $e) {

			$this->db->trans_rollback();

			echo json_encode([
				'success' => false,
				'message' => $e->getMessage()
			]);
		}
	}

	//Assets Files
	public function assetsMaterial()
	{

		$data = [
			'title'      	=> 'MATERIAL ASSETS',
			'active'     	=> 'assets',
			'users' 	 	=> $this->db->get_where('tbl_users', ['username' =>  $this->session->userdata('username')])->row(),
			'breadcrumb' 	=> ['Home', 'Material Assets'],
		];
		$this->template->load('tema/index', 'section/assets', $data);
	}
	// Assets ServerSide
	public function assetsServerside()
	{

		$list = $this->M_assets_serverside->get_datatables();

		$data = [];
		$no   = $_POST['start'];

		foreach ($list as $row) {

			$no++;

			$u3m = '-';
			$blend_mat = '-';
			$blend_asset = '-';

			/*
		|--------------------------------------------------------------------------
		| U3M
		|--------------------------------------------------------------------------
		*/

			if ($row->u3m_file) {

				$u3m = '
				<a href="' . base_url($row->u3m_file) . '" 
				   target="_blank"
				   class="btn btn-sm btn-outline-primary">
				   <i class="bi bi-download"></i> Download
				</a>
			';
			}

			/*
		|--------------------------------------------------------------------------
		| Blender Material
		|--------------------------------------------------------------------------
		*/

			if ($row->blender_material_file) {

				$blend_mat = '
				<a href="' . base_url($row->blender_material_file) . '" 
				   target="_blank"
				   class="btn btn-sm btn-outline-success">
				   <i class="bi bi-download"></i> Download
				</a>
			';
			}

			/*
		|--------------------------------------------------------------------------
		| Blender Asset
		|--------------------------------------------------------------------------
		*/

			if ($row->blender_asset_file) {

				$blend_asset = '
				<a href="' . base_url($row->blender_asset_file) . '" 
				   target="_blank"
				   class="btn btn-sm btn-outline-dark">
				   <i class="bi bi-download"></i> Download
				</a>
			';
			}

			$data[] = [
				$no,

				'
			<div>
				<strong>' . $row->material_code . '</strong><br>
				<small class="text-muted">' . $row->material_name . '</small>
			</div>
			',

				$u3m,
				$blend_mat,
				$blend_asset,

				'
			<div class="btn-group">
				<button class="btn btn-sm btn-warning">
					<i class="bi bi-pencil"></i>
				</button>

				<button class="btn btn-sm btn-danger">
					<i class="bi bi-trash"></i>
				</button>
			</div>
			'
			];
		}

		$output = [
			"draw"            => $_POST['draw'],
			"recordsTotal"    => $this->M_assets_serverside->count_all(),
			"recordsFiltered" => $this->M_assets_serverside->count_filtered(),
			"data"            => $data,
		];

		echo json_encode($output);
	}



	// Get Materials
	public function getMaterials()
	{
		$search = $this->input->post('search');
		$this->db->select('id, material_code, material_name');
		$this->db->from('tbl_materials');
		if ($search) {
			$this->db->group_start();
			$this->db->like('material_code', $search);
			$this->db->or_like('material_name', $search);
			$this->db->group_end();
		}
		$this->db->limit(20);
		$query = $this->db->get()->result();
		$data = [];
		foreach ($query as $row) {

			$data[] = [
				'id'   => $row->id,
				'text' => $row->material_code . ' - ' . $row->material_name
			];
		}
		echo json_encode($data);
	}


	public function getMaterialDetail()
	{
		header('Content-Type: application/json');

		$material_code = $this->input->post('material_code');

		/* =========================================================
	| GET MATERIAL
	========================================================= */

		$material = $this->db
			->select('
			m.*,

			s.supplier_name,

			mt.material_type_name,

			ml.lifecycle_name,

			se.season_name,
			se.season_year,

			weight_uom.uom_name as weight_uom_name,
			width_uom.uom_name as width_uom_name,

			ma.id as asset_id,
			ma.qr_code_file,
			ma.blender_material_file,
			ma.u3m_file,
			ma.glb_file
		')

			->from('tbl_materials m')

			/* =====================================================
		| SUPPLIER
		===================================================== */

			->join(
				'tbl_suppliers s',
				's.id = m.supplier_id',
				'left'
			)

			/* =====================================================
		| MATERIAL TYPE
		===================================================== */

			->join(
				'tbl_material_types mt',
				'mt.id = m.material_type_id',
				'left'
			)

			/* =====================================================
		| LIFECYCLE
		===================================================== */

			->join(
				'tbl_material_lifecycle ml',
				'ml.id = m.lifecycle_id',
				'left'
			)

			/* =====================================================
		| SEASON
		===================================================== */

			->join(
				'tbl_seasons se',
				'se.id = m.season_id',
				'left'
			)

			/* =====================================================
		| UOM
		===================================================== */

			->join(
				'tbl_uom weight_uom',
				'weight_uom.id = m.weight_uom_id',
				'left'
			)

			->join(
				'tbl_uom width_uom',
				'width_uom.id = m.width_uom_id',
				'left'
			)

			/* =====================================================
		| ASSET
		===================================================== */

			->join(
				'tbl_material_assets ma',
				'ma.material_id = m.id',
				'left'
			)

			->where('m.material_code', $material_code)

			->get()
			->row_array();

		if (!$material) {

			echo json_encode([
				'status'  => 'error',
				'message' => 'Material not found'
			]);

			return;
		}

		/* =========================================================
	| CLASSIFICATIONS
	========================================================= */

		$material['classifications'] = $this->db

			->select('
			c.id,
			c.classification_name
		')

			->from('tbl_material_classifications mc')

			->join(
				'tbl_classifications c',
				'c.id = mc.classification_id',
				'left'
			)

			->where('mc.material_id', $material['id'])

			->get()

			->result_array();

		/* =========================================================
	| LOCATIONS
	========================================================= */

		$material['locations'] = $this->db

			->select('
			l.id,
			l.location_name
		')

			->from('tbl_material_locations ml')

			->join(
				'tbl_locations l',
				'l.id = ml.location_id',
				'left'
			)

			->where('ml.material_id', $material['id'])

			->get()

			->result_array();

		/* =========================================================
	| MODEL NUMBERS
	========================================================= */

		$material['models'] = $this->db

			->select('
			m.id,
			m.model_number
		')

			->from('tbl_material_models mm')

			->join(
				'tbl_models m',
				'm.id = mm.model_id',
				'left'
			)
			->where('mm.material_id', $material['id'])
			->get()

			->result_array();

		/* =========================================================
	| IMAGES
	========================================================= */

		$material['images'] = $this->db

			->select('
			id,
			file_name,
			is_cover
		')

			->from('tbl_material_asset_images')

			->where('asset_id', $material['asset_id'])

			->get()

			->result_array();

		/* =========================================================
	| RESPONSE
	========================================================= */

		echo json_encode([
			'status' => 'success',
			'data'   => $material
		]);
	}

	//Delete Material
	public function deleteMaterial($id)
	{

		$delete = $this->M_materials->deleteMaterial($id);
		if ($delete) {
			$this->session->set_flashdata('message', [
				'title' => 'Success',
				'text'  => 'Material Data Successfully Deleted',
				'icon'  => 'success',
				'type'  => 'success'
			]);
		} else {
			$this->session->set_flashdata('message', [
				'title' => 'Failed',
				'text'  => 'Material not found or failed to delete',
				'icon'  => 'error',
				'type'  => 'danger'
			]);
		}
		redirect('Home/Dashboard', 'refresh');
	}

	public function saveMaterialAssets()
	{
		header('Content-Type: application/json');

		/*
    |--------------------------------------------------------------------------
    | VALIDATION
    |--------------------------------------------------------------------------
    */

		$material_id = $this->input->post('material_id');

		if (empty($material_id)) {

			echo json_encode([
				'status'  => 'error',
				'message' => 'Material is required'
			]);
			return;
		}

		/*
    |--------------------------------------------------------------------------
    | CREATE QR CODE GENERATE
    |--------------------------------------------------------------------------
    */
		/*
	|--------------------------------------------------------------------------
	| QR CODE IMAGE
	|--------------------------------------------------------------------------
	|
	| Ambil nama file QR yang sudah di generate
	|
	*/

		$qr_code = $this->input->post('qr_code_image');

		/*
	|--------------------------------------------------------------------------
	| VALIDATION
	|--------------------------------------------------------------------------
	*/

		if (empty($qr_code)) {

			echo json_encode([
				'status'  => 'error',
				'message' => 'Please generate QR Code first'
			]);

			return;
		}

		/*
|--------------------------------------------------------------------------
| CHECK QR DUPLICATE
|--------------------------------------------------------------------------
*/

		$existsQR = $this->db
			->where('qr_code_file', $qr_code)
			->get('tbl_material_assets')
			->row();

		if ($existsQR) {

			echo json_encode([

				'status'  => 'warning',
				'message' =>
				'Assets already exist for this material'
			]);
			return;
		}

		/*
    |--------------------------------------------------------------------------
    | INSERT MAIN TABLE
    |--------------------------------------------------------------------------
    */

		$assetData = [
			'material_id' 		=> $material_id,
			'qr_code_file'     	=> $qr_code,
			'created_at'  		=> date('Y-m-d H:i:s')
		];

		$this->db->insert('tbl_material_assets', $assetData);

		$asset_id = $this->db->insert_id();

		/*
    |--------------------------------------------------------------------------
    | BASE DIRECTORY
    |--------------------------------------------------------------------------
    */

		$baseDir = './uploads/material_assets/';

		/*
    |--------------------------------------------------------------------------
    | AUTO CREATE FOLDER
    |--------------------------------------------------------------------------
    */

		$folders = [
			$baseDir . 'images/',
			$baseDir . 'glb/',
			$baseDir . 'u3m/',
			$baseDir . 'blender_material/'
		];

		foreach ($folders as $folder) {

			if (!is_dir($folder)) {

				mkdir($folder, 0777, true);
			}
		}

		/*
    |--------------------------------------------------------------------------
    | SINGLE FILE UPLOAD FUNCTION
    |--------------------------------------------------------------------------
    */

		$uploadFile = function ($field, $path, $allowed) {

			if (
				!isset($_FILES[$field]) ||
				empty($_FILES[$field]['name'])
			) {
				return null;
			}

			$CI = &get_instance();

			/*
        |--------------------------------------------------------------------------
        | VALIDATE EXTENSION MANUAL
        |--------------------------------------------------------------------------
        */

			$ext = strtolower(
				pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION)
			);

			$allowedExt = explode('|', $allowed);

			if (!in_array($ext, $allowedExt)) {

				return [
					'error' => 'File type not allowed : ' . $ext
				];
			}

			/*
        |--------------------------------------------------------------------------
        | CONFIG
        |--------------------------------------------------------------------------
        */

			$config = [
				'upload_path'   => $path,
				'allowed_types' => '*',
				'detect_mime'   => false,
				'encrypt_name'  => true,
				'max_size'      => 102400
			];

			$CI->load->library('upload');
			$CI->upload->initialize($config);

			/*
        |--------------------------------------------------------------------------
        | UPLOAD
        |--------------------------------------------------------------------------
        */

			if (!$CI->upload->do_upload($field)) {

				return [
					'error' => $CI->upload->display_errors('', '')
				];
			}

			$uploadData = $CI->upload->data();

			return $uploadData['file_name'];
		};

		/*
    |--------------------------------------------------------------------------
    | BLENDER MATERIAL
    |--------------------------------------------------------------------------
    */

		$blender_material = $uploadFile(
			'blender_material',
			$baseDir . 'blender_material/',
			'blend'
		);

		if (is_array($blender_material)) {

			echo json_encode([
				'status'  => 'error',
				'message' => $blender_material['error']
			]);
			return;
		}

		/*
    |--------------------------------------------------------------------------
    | U3M FILE
    |--------------------------------------------------------------------------
    */

		$u3m_file = $uploadFile(
			'u3m_file',
			$baseDir . 'u3m/',
			'u3m'
		);

		if (is_array($u3m_file)) {

			echo json_encode([
				'status'  => 'error',
				'message' => $u3m_file['error']
			]);
			return;
		}

		/*
    |--------------------------------------------------------------------------
    | GLB FILE
    |--------------------------------------------------------------------------
    */

		$glb_file = $uploadFile(
			'glb_file',
			$baseDir . 'glb/',
			'glb'
		);

		if (is_array($glb_file)) {

			echo json_encode([
				'status'  => 'error',
				'message' => $glb_file['error']
			]);
			return;
		}

		/*
    |--------------------------------------------------------------------------
    | UPDATE MAIN TABLE
    |--------------------------------------------------------------------------
    */

		$this->db->where('id', $asset_id);

		$this->db->update('tbl_material_assets', [

			'blender_material_file' => $blender_material,
			'u3m_file'              => $u3m_file,
			'glb_file'              => $glb_file
		]);

		/*
    |--------------------------------------------------------------------------
    | MULTIPLE IMAGE UPLOAD
    |--------------------------------------------------------------------------
    */

		if (!empty($_FILES['material_images']['name'][0])) {

			$count = count($_FILES['material_images']['name']);

			for ($i = 0; $i < $count; $i++) {

				$_FILES['temp_image']['name']     = $_FILES['material_images']['name'][$i];
				$_FILES['temp_image']['type']     = $_FILES['material_images']['type'][$i];
				$_FILES['temp_image']['tmp_name'] = $_FILES['material_images']['tmp_name'][$i];
				$_FILES['temp_image']['error']    = $_FILES['material_images']['error'][$i];
				$_FILES['temp_image']['size']     = $_FILES['material_images']['size'][$i];

				/*
            |--------------------------------------------------------------------------
            | VALIDATE IMAGE EXTENSION
            |--------------------------------------------------------------------------
            */

				$ext = strtolower(
					pathinfo($_FILES['temp_image']['name'], PATHINFO_EXTENSION)
				);

				if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
					continue;
				}

				/*
            |--------------------------------------------------------------------------
            | CONFIG
            |--------------------------------------------------------------------------
            */

				$config = [
					'upload_path'   => $baseDir . 'images/',
					'allowed_types' => '*',
					'detect_mime'   => false,
					'encrypt_name'  => true,
					'max_size'      => 10240
				];

				$this->load->library('upload');
				$this->upload->initialize($config);

				/*
            |--------------------------------------------------------------------------
            | UPLOAD IMAGE
            |--------------------------------------------------------------------------
            */

				if ($this->upload->do_upload('temp_image')) {

					$uploadData = $this->upload->data();

					$this->db->insert('tbl_material_asset_images', [

						'asset_id'   => $asset_id,
						'file_name'  => $uploadData['file_name'],
						'created_at' => date('Y-m-d H:i:s')
					]);
				}
			}
		}

		/*
    |--------------------------------------------------------------------------
    | SUCCESS
    |--------------------------------------------------------------------------
    */

		echo json_encode([
			'status'  => 'success',
			'message' => 'Material Assets Successfully Saved'
		]);
	}

	public function materialAssets()
	{
		$list = $this->M_material_assets_serverside
			->get_datatables();

		$data = [];
		$no = $_POST['start'];

		foreach ($list as $row) {

			$no++;

			/*
		|--------------------------------------------------------------------------
		| BLENDER FILE
		|--------------------------------------------------------------------------
		*/

			$blender = '-';

			if (!empty($row->blender_material_file)) {

				$blender = '
				<a href="' . base_url(
					'uploads/material_assets/blender_material/' .
						$row->blender_material_file
				) . '"
				target="_blank"
				class="btn btn-sm btn-outline-primary">
					<i class="bi bi-download"></i>
				</a>
			';
			}

			/*
		|--------------------------------------------------------------------------
		| U3M FILE
		|--------------------------------------------------------------------------
		*/

			$u3m = '-';

			if (!empty($row->u3m_file)) {

				$u3m = '
				<a href="' . base_url(
					'uploads/material_assets/u3m/' .
						$row->u3m_file
				) . '"
				target="_blank"
				class="btn btn-sm btn-outline-success">
					<i class="bi bi-download"></i>
				</a>
			';
			}

			/*
		|--------------------------------------------------------------------------
		| GLB FILE
		|--------------------------------------------------------------------------
		*/

			$glb = '-';

			if (!empty($row->glb_file)) {

				$glb = '
				<a href="' . base_url(
					'uploads/material_assets/glb/' .
						$row->glb_file
				) . '"
				target="_blank"
				class="btn btn-sm btn-outline-primary">
					<i class="bi bi-box-arrow-up-right"></i>
				</a>
				';
			}
			/*
		|--------------------------------------------------------------------------
		| IMAGES COUNT
		|--------------------------------------------------------------------------
		*/

			$images = '
			<span class="badge bg-info text-dark"
				style="cursor:pointer"
				onclick="showImagesDetail(' . $row->id . ')">

				' . $row->total_images . ' Images

			</span>
			';

			/*
				|--------------------------------------------------------------------------
				| ACTION
				|--------------------------------------------------------------------------
				*/

			$action = '
					<a class="btn btn-danger btn-sm tombol-hapus" 
				href="' . base_url('Home/deleteAssetsMaterial/' . $row->id) . '">
						<i class="bi bi-trash"></i>
					</a>
				';
			$qr = '
						<a href="' . base_url(
				'uploads/qrcode/' .
					$row->qr_code_file
			) . '"
						target="_blank">

							<img src="' . base_url(
				'uploads/qrcode/' .
					$row->qr_code_file
			) . '"
							width="60"
							height="60"
							style="
								object-fit:cover;
								border-radius:8px;
								border:1px solid #ddd;
								padding:4px;
								background:#fff;
							">

						</a>
					';
			$data[] = [

				$no,
				$row->material_code,
				$qr,
				$blender,
				$u3m,
				$glb,
				$images,
				$action
			];
		}

		$output = [

			"draw" => $_POST['draw'],
			"recordsTotal" =>
			$this->M_material_assets_serverside
				->count_all(),

			"recordsFiltered" =>
			$this->M_material_assets_serverside
				->count_filtered(),

			"data" => $data
		];

		echo json_encode($output);
	}

	public function generateQRCode()
	{
		header('Content-Type: application/json');

		$material_code = trim(
			$this->input->post('material_code')
		);

		/*
			|--------------------------------------------------------------------------
			| VALIDATION
			|--------------------------------------------------------------------------
			*/

		if (empty($material_code)) {

			echo json_encode([
				'status'  => 'error',
				'message' => 'Material code required'
			]);

			return;
		}

		/*
			|--------------------------------------------------------------------------
			| CHECK QR ALREADY EXISTS
			|--------------------------------------------------------------------------
			|
			| Cek:
			| 1. File QR sudah ada di folder
			| 2. Sudah pernah dipakai di tbl_material_assets
			|
			*/

		$file_name = 'QR_' . $material_code . '.png';

		$full_path =
			FCPATH .
			'uploads/qrcode/' .
			$file_name;

		/*
			|--------------------------------------------------------------------------
			| CHECK DATABASE
			|--------------------------------------------------------------------------
			*/

		$existsDB = $this->db
			->where('qr_code_file', $file_name)
			->get('tbl_material_assets')
			->row();

		/*
			|--------------------------------------------------------------------------
			| CHECK FILE
			|--------------------------------------------------------------------------
			*/

		$existsFile = file_exists($full_path);

		if ($existsDB || $existsFile) {

			echo json_encode([

				'status'  => 'warning',

				'message' =>
				'QR Code already generated for this material',

				'file_name' => $file_name,

				'url' => base_url(
					'uploads/qrcode/' .
						$file_name
				)
			]);

			return;
		}

		/*
			|--------------------------------------------------------------------------
			| LOAD QR LIBRARY
			|--------------------------------------------------------------------------
			*/

		include APPPATH .
			'third_party/phpqrcode/qrlib.php';

		/*
			|--------------------------------------------------------------------------
			| CREATE DIRECTORY
			|--------------------------------------------------------------------------
			*/

		$path = FCPATH . 'uploads/qrcode/';

		if (!is_dir($path)) {

			mkdir($path, 0777, true);
		}

		/*
			|--------------------------------------------------------------------------
			| QR CONTENT
			|--------------------------------------------------------------------------
			*/

		$qr_content = $material_code;

		/*
			|--------------------------------------------------------------------------
			| GENERATE QR
			|--------------------------------------------------------------------------
			*/

		QRcode::png(
			$qr_content,
			$full_path,
			QR_ECLEVEL_H,
			10
		);

		/*
			|--------------------------------------------------------------------------
			| RESPONSE
			|--------------------------------------------------------------------------
			*/

		echo json_encode([

			'status' => 'success',

			'message' =>
			'QR Code generated successfully',

			'file_name' => $file_name,

			'url' => base_url(
				'uploads/qrcode/' .
					$file_name
			)
		]);
	}

	public function getMaterialImages()
	{
		header('Content-Type: application/json');

		$asset_id = $this->input->post('asset_id');

		$data = $this->db
			->where('asset_id', $asset_id)
			->get('tbl_material_asset_images')
			->result();

		if (!$data) {

			echo json_encode([
				'status'  => 'error',
				'message' => 'Images not found'
			]);

			return;
		}

		echo json_encode([
			'status' => 'success',
			'data'   => $data
		]);
	}

	public function setCoverImage()
	{
		header('Content-Type: application/json');

		$id = $this->input->post('id');

		$asset_id = $this->input->post('asset_id');

		/*
			|--------------------------------------------------------------------------
			| RESET COVER
			|--------------------------------------------------------------------------
			*/

		$this->db
			->where('asset_id', $asset_id)
			->update(
				'tbl_material_asset_images',
				['is_cover' => 0]
			);

		/*
			|--------------------------------------------------------------------------
			| SET NEW COVER
			|--------------------------------------------------------------------------
			*/

		$this->db
			->where('id', $id)
			->update(
				'tbl_material_asset_images',
				['is_cover' => 1]
			);

		echo json_encode([
			'status' => 'success',
			'message' => 'Cover image updated'
		]);
	}

	public function deleteMaterialImage()
	{
		header('Content-Type: application/json');

		$id = $this->input->post('id');

		$data = $this->db
			->where('id', $id)
			->get('tbl_material_asset_images')
			->row();

		if (!$data) {

			echo json_encode([
				'status' => 'error',
				'message' => 'Image not found'
			]);

			return;
		}

		$path =
			FCPATH .
			'uploads/material_assets/images/' .
			$data->file_name;

		if (file_exists($path)) {

			unlink($path);
		}

		$this->db->where('id', $id);
		$this->db->delete('tbl_material_asset_images');

		echo json_encode([
			'status' => 'success',
			'message' => 'Image deleted successfully'
		]);
	}
	/* =========================================================
	| MODEL ASSETS
	========================================================= */
	public function modelAssets()
	{

		$data = [
			'title'      	=> 'MODEL ASSETS',
			'active'     	=> 'modelassets',
			'users' 	 	=> $this->db->get_where('tbl_users', ['username' =>  $this->session->userdata('username')])->row(),
			'breadcrumb' 	=> ['Home', 'Model Assets'],
		];
		$this->template->load('tema/index', 'section/modelassets', $data);
	}
	public function modelAssetsServerside()
	{

		$list = $this->M_modelassets->get_datatables();

		$data = [];

		$no = $_POST['start'];

		foreach ($list as $row) {

			$no++;

			/*
				|--------------------------------------------------------------------------
				| BLEND FILE
				|--------------------------------------------------------------------------
				*/

			$blend_file = '-';

			if ($row->blender_asset_file) {

				$blend_file = '

						<a href="' . base_url($row->blender_asset_file) . '" 

							target="_blank"

							class="btn btn-sm btn-outline-dark">

							<i class="bi bi-box"></i>

							Download Blend

						</a>

					';
			}

			/*
				|--------------------------------------------------------------------------
				| MODEL INFO
				|--------------------------------------------------------------------------
				*/

			$modelInfo = '

					<div>

						<strong>' . $row->model_number . '</strong><br>

						<small class="text-muted">

							' . $row->model_name . '

						</small>

					</div>

				';

			/*
				|--------------------------------------------------------------------------
				| ACTION
				|--------------------------------------------------------------------------
				*/

			$action = '

					<div class="btn-group">
						<button
						class="btn btn-warning btn-sm"
						onclick="editModelAssets(this)"
						data-id="' . $row->id . '">

						<i class="bi bi-pencil"></i>
					</button>

				<a class="btn btn-danger btn-sm tombol-hapus" 
						href="' . base_url('Home/deleteModelAssets/' . $row->id) . '">
						<i class="bi bi-trash"></i>
					</a>
					
					</div>

				';

			/*
				|--------------------------------------------------------------------------
				| PUSH ARRAY
				|--------------------------------------------------------------------------
				*/

			$data[] = [

				$no,

				$modelInfo,

				$row->model_name,

				$blend_file,

				$action

			];
		}

		/*
			|--------------------------------------------------------------------------
			| OUTPUT
			|--------------------------------------------------------------------------
			*/

		$output = [

			"draw" => $_POST['draw'],

			"recordsTotal" =>
			$this->M_modelassets->count_all(),

			"recordsFiltered" =>
			$this->M_modelassets->count_filtered(),

			"data" => $data,

		];

		echo json_encode($output);
	}
	/*
	|--------------------------------------------------------------------------
	| SAVE MODEL ASSETS
	|--------------------------------------------------------------------------
	*/
	public function saveModelAssets()
	{
		header('Content-Type: application/json');

		$model_id = $this->input->post('model_id');

		/*
			|--------------------------------------------------------------------------
			| CHECK EXISTS
			|--------------------------------------------------------------------------
			*/

		$exists = $this->db
			->where('model_id', $model_id)
			->get('tbl_model_assets')
			->row();

		if ($exists) {
			echo json_encode([
				'status' => 'error',
				'message' => 'Assets already exists'

			]);

			return;
		}

		/*
		|--------------------------------------------------------------------------
		| UPLOAD CONFIG
		|--------------------------------------------------------------------------
		*/

		$path = FCPATH . 'uploads/model_assets/blender/';

		/*
		|--------------------------------------------------------------------------
		| CREATE DIRECTORY IF NOT EXISTS
		|--------------------------------------------------------------------------
		*/

		if (!is_dir($path)) {

			mkdir($path, 0777, true);
		}

		/*
		|--------------------------------------------------------------------------
		| DEBUG
		|--------------------------------------------------------------------------
		*/

		$config['upload_path'] = str_replace('\\', '/', $path);
		$config['allowed_types'] = '*';
		$config['max_size'] = 500000;
		$config['encrypt_name'] = true;
		$this->load->library('upload');
		$this->upload->initialize($config);
		$path = FCPATH . 'uploads/model_assets/blender/';

		/*
		|--------------------------------------------------------------------------
		| CREATE DIRECTORY IF NOT EXISTS
		|--------------------------------------------------------------------------
		*/

		if (!is_dir($path)) {

			mkdir($path, 0777, true);
		}

		/*
		|--------------------------------------------------------------------------
		| DEBUG
		|--------------------------------------------------------------------------
		*/
		$config['upload_path'] = str_replace('\\', '/', $path);
		$config['allowed_types'] = '*';
		$config['max_size'] = 500000;
		$config['encrypt_name'] = true;
		$this->load->library('upload');
		$this->upload->initialize($config);
		/*
				|--------------------------------------------------------------------------
				| UPLOAD FILE
				|--------------------------------------------------------------------------
				*/
		if (!$this->upload->do_upload('blender_asset_file')) {
			echo json_encode([
				'status' => 'error',
				'message' => strip_tags(
					$this->upload->display_errors()
				)
			]);

			return;
		}
		$upload = $this->upload->data();
		/*
				|--------------------------------------------------------------------------
				| INSERT DATABASE
				|--------------------------------------------------------------------------
				*/
		$insert = [

			'model_id' => $model_id,
			'blender_asset_file' => 'uploads/model_assets/blender/' . $upload['file_name'],
			'created_at' => date('Y-m-d H:i:s')

		];

		$this->db->insert(
			'tbl_model_assets',
			$insert
		);

		echo json_encode([
			'status' => 'success',
			'messge' => 'Model assets uploaded successfully'

		]);
	}
	/* =========================================================
	| DELETE ASSETS MODEL
	========================================================= */
	public function deleteModelAssets($id)
	{

		$delete = $this->M_model->deleteModelAssets($id);
		if ($delete) {
			$this->session->set_flashdata('message', [
				'title' => 'Success',
				'text'  => 'Model Asset Successfull Deleted',
				'icon'  => 'success',
				'type'  => 'success'
			]);
		} else {
			$this->session->set_flashdata('message', [
				'title' => 'Failed',
				'text'  => 'Model Asset not found or failed to delete',
				'icon'  => 'error',
				'type'  => 'danger'
			]);
		}
		redirect('Home/modelAssets', 'refresh');
	}
	//Model Assets Get By Id
	public function getdetailModelAssets($id)
	{
		header('Content-Type: application/json');

		$data = $this->db
			->select('
					ma.*,
					m.model_number,
					m.model_name
				')

			->from('tbl_model_assets ma')
			->join(
				'tbl_models m',
				'm.id = ma.model_id',
				'left'
			)
			->where('ma.id', $id)
			->get()
			->row();

		if (!$data) {
			echo json_encode([
				'status' => 'error',
				'message' => 'Model Assets Not Found'

			]);

			return;
		}

		echo json_encode([

			'status' => 'success',

			'data' => $data

		]);
	}
	/* =========================================================
	| UPDATE MODEL ASSETS
	========================================================= */
	public function updateModelAssets()
	{
		header('Content-Type: application/json');
		$id = $this->input->post('id');
		$model_id = $this->input->post('model_id');

		/*
				|--------------------------------------------------------------------------
				| CHECK DUPLICATE
				|--------------------------------------------------------------------------
				*/

		$check = $this->db

			->where('model_id', $model_id)

			->where('id !=', $id)

			->get('tbl_model_assets')

			->row();

		if ($check) {

			echo json_encode([

				'status' => 'error',

				'message' => 'Assets Already Exists'

			]);

			return;
		}

		/*
			|--------------------------------------------------------------------------
			| GET OLD DATA
			|--------------------------------------------------------------------------
			*/
		$old = $this->db
			->where('id', $id)
			->get('tbl_model_assets')
			->row();

		if (!$old) {

			echo json_encode([
				'status' => 'error',
				'message' => 'Data not found'

			]);

			return;
		}

		/*
			|--------------------------------------------------------------------------
			| UPLOAD FILE
			|--------------------------------------------------------------------------
			*/
		$update = [
			'model_id' => $model_id
		];

		if (!empty($_FILES['blender_asset_file']['name'])) {

			$path = FCPATH . 'uploads/model_assets/blender/';

			if (!is_dir($path)) {

				mkdir($path, 0777, true);
			}

			$config['upload_path'] = str_replace('\\', '/', $path);
			$config['allowed_types'] = '*';
			$config['max_size'] = 500000;
			$config['encrypt_name'] = true;
			$this->load->library('upload');
			$this->upload->initialize($config);

			$this->load->library(
				'upload',
				$config
			);

			if (!$this->upload->do_upload('blender_asset_file')) {

				echo json_encode([

					'status' => 'error',
					'message' => strip_tags(
						$this->upload->display_errors()
					)

				]);

				return;
			}

			/*
				|--------------------------------------------------------------------------
				| DELETE OLD FILE
				|--------------------------------------------------------------------------
				*/

			if ($old->blender_asset_file) {
				$oldFile = FCPATH .
					$old->blender_asset_file;
				if (file_exists($oldFile)) {
					unlink($oldFile);
				}
			}

			$uploadData = $this->upload->data();
			$update['blender_asset_file'] =
				'uploads/model_assets/blender/' .
				$uploadData['file_name'];
		}

		/*
			|--------------------------------------------------------------------------
			| UPDATE
			|--------------------------------------------------------------------------
			*/
		$this->M_model->updateModelAssets(
			$id,
			$update
		);

		echo json_encode([

			'status' => 'success',
			'message' => 'Model Assets Updated'

		]);
	}
	public function getDetailMaterial($id)
	{
		header('Content-Type: application/json');

		$material = $this->db
			->select('
					m.*,
					s.supplier_name,
					mt.material_type_name,
					se.season_name,
					lc.lifecycle_name,

					weight_uom.uom_name as weight_uom_name,
				width_uom.uom_name as width_uom_name,
				
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
				'tbl_seasons se',
				'se.id = m.season_id',
				'left'
			)

			->join(
				'tbl_material_lifecycle lc',
				'lc.id = m.lifecycle_id',
				'left'
			)

			->join(
				'tbl_uom weight_uom',
				'weight_uom.id = m.weight_uom_id',
				'left'
			)

			->join(
				'tbl_uom width_uom',
				'width_uom.id = m.width_uom_id',
				'left'
			)

			->where('m.id', $id)
			->get()
			->row_array();

		if (!$material) {

			echo json_encode([
				'success' => false,
				'message' => 'Material not found'
			]);

			return;
		}

		/* =========================================================
		| CLASSIFICATIONS IDS
		========================================================= */

		$classifications = $this->db
			->select('classification_id')
			->from('tbl_material_classifications')
			->where('material_id', $id)
			->get()
			->result_array();

		$material['classification_ids'] = array_column(
			$classifications,
			'classification_id'
		);

		/* =========================================================
		| CLASSIFICATION NAMES
		========================================================= */

		$material['classification_names'] = [];

		if (!empty($material['classification_ids'])) {

			$material['classification_names'] = $this->db
				->select('id, classification_name')
				->from('tbl_classifications')
				->where_in(
					'id',
					$material['classification_ids']
				)
				->get()
				->result_array();
		}

		/* =========================================================
		| LOCATIONS
		========================================================= */

		$locations = $this->db
			->select('location_id')
			->from('tbl_material_locations')
			->where('material_id', $id)
			->get()
			->result_array();

		$material['location_ids'] = array_column(
			$locations,
			'location_id'
		);

		/* =========================================================
		| LOCATION NAMES
		========================================================= */

		$material['location_names'] = [];

		if (!empty($material['location_ids'])) {

			$material['location_names'] = $this->db
				->select('id, location_name')
				->from('tbl_locations')
				->where_in(
					'id',
					$material['location_ids']
				)
				->get()
				->result_array();
		}

		/* =========================================================
			| MODEL NUMBERS
			========================================================= */


		$models = $this->db
			->select('model_id')
			->from('tbl_material_models')
			->where('material_id', $id)
			->get()
			->result_array();

		$material['model_numbers'] = array_column(
			$models,
			'model_id'
		);

		/* =========================================================
		| MODEL NUMBER NAMES
		========================================================= */

		$material['model_number_names'] = [];

		if (!empty($material['model_numbers'])) {

			$material['model_number_names'] = $this->db
				->select('id, model_number')
				->from('tbl_models')
				->where_in(
					'id',
					$material['model_numbers']
				)
				->get()
				->result_array();
		}

		echo json_encode($material);
	}
	/* =========================================================
	| UPDATE MATERIAL
	========================================================= */
	public function updateMaterial($id)
	{
		header('Content-Type: application/json');

		$data = $this->input->post();

		$update = $this->M_materials->updateMaterial($id, $data);

		if ($update) {

			echo json_encode([
				'success' => true,
				'message' => 'Material updated successfully'
			]);
		} else {

			echo json_encode([
				'success' => false,
				'message' => 'Failed to update material'
			]);
		}
	}

	/* =========================================================
	| GET FILTER MLM
	========================================================= */

	public function getFilterMLM()
	{
		$data = $this->db
			->distinct()
			->select('mlm_ref_no')
			->from('tbl_materials')
			->where('mlm_ref_no IS NOT NULL')
			->where('mlm_ref_no !=', '')
			->order_by('mlm_ref_no', 'ASC')
			->get()
			->result();

		echo json_encode($data);
	}
	/* =========================================================
	| GET FILTER SUPPLIER
	========================================================= */
	public function getFilterSupplier()
	{
		$data = $this->db
			->distinct()
			->select('
			s.id,
			s.supplier_name
		')
			->from('tbl_materials m')

			->join(
				'tbl_suppliers s',
				's.id = m.supplier_id',
				'left'
			)
			->where('s.id IS NOT NULL')
			->order_by('s.supplier_name', 'ASC')
			->get()
			->result();

		echo json_encode($data);
	}
	/* =========================================================
	| GET FILTER MATERIAL NAME
	========================================================= */

	public function getFilterMaterialName()
	{
		$data = $this->db
			->distinct()

			->select('
			material_name
		')
			->from('tbl_materials')
			->where('material_name IS NOT NULL')
			->where('material_name !=', '')

			->order_by('material_name', 'ASC')

			->get()
			->result();

		echo json_encode($data);
	}
	/* =========================================================
	| GET FILTER CLASSIFICATION
	========================================================= */

	public function getFilterClassification()
	{
		$data = $this->db

			->distinct()

			->select('
			c.id,
			c.classification_name
		')

			->from('tbl_classifications c')

			->join(
				'tbl_material_classifications mc',
				'mc.classification_id = c.id',
				'inner'
			)

			->order_by(
				'c.classification_name',
				'ASC'
			)

			->get()
			->result();

		echo json_encode($data);
	}
	/* =========================================================
	| GET FILTER LOCATION
	========================================================= */
	public function getFilterLocation()
	{
		$data = $this->db

			->distinct()

			->select('
			l.id,
			l.location_name
		')
			->from('tbl_locations l')
			->join(
				'tbl_material_locations ml',
				'ml.location_id = l.id',
				'inner'
			)

			->order_by(
				'l.location_name',
				'ASC'
			)

			->get()
			->result();

		echo json_encode($data);
	}
	/* =========================================================
	| GET FILTER LIFECYCLE
	========================================================= */
	public function getFilterLifecycle()
	{
		$data = $this->db

			->distinct()

			->select('
			id,
			lifecycle_name
		')

			->from('tbl_material_lifecycle')

			->order_by(
				'lifecycle_name',
				'ASC'
			)

			->get()
			->result();

		echo json_encode($data);
	}
	/* =========================================================
	| GET FILTER COMPOSITION
	========================================================= */
	public function getFilterComposition()
	{
		$data = $this->db

			->distinct()

			->select('composition')

			->from('tbl_materials')

			->where('composition IS NOT NULL')
			->where('composition !=', '')

			->order_by(
				'composition',
				'ASC'
			)

			->get()
			->result();

		echo json_encode($data);
	}
	/* =========================================================
	| GET FILTER CONSTRUCTION
	========================================================= */
	public function getFilterConstruction()
	{
		$data = $this->db

			->distinct()
			->select('construction')
			->from('tbl_materials')

			->where('construction IS NOT NULL')
			->where('construction !=', '')

			->order_by(
				'construction',
				'ASC'
			)

			->get()
			->result();

		echo json_encode($data);
	}

	/* =========================================================
	| GET FILTER TECHNOLOGY
	========================================================= */
	public function getFilterTechnology()
	{
		$data = $this->db
			->distinct()
			->select('technology')
			->from('tbl_materials')
			->where('technology IS NOT NULL')
			->where('technology !=', '')
			->order_by(
				'technology',
				'ASC'
			)
			->get()
			->result();

		echo json_encode($data);
	}
	/* =========================================================
	| GET FILTER SAMPLE LEADTIME
	========================================================= */
	public function getFilterSampleLeadtime()
	{
		$data = $this->db

			->distinct()

			->select('sample_leadtime')

			->from('tbl_materials')

			->where('sample_leadtime IS NOT NULL')

			->order_by(
				'sample_leadtime',
				'ASC'
			)

			->get()
			->result();

		echo json_encode($data);
	}
	/* =========================================================
	| GET FILTER PRODUCTION LEADTIME
	========================================================= */
	public function getFilterProductionLeadtime()
	{
		$data = $this->db
			->distinct()
			->select('production_leadtime')
			->from('tbl_materials')
			->where('production_leadtime IS NOT NULL')
			->order_by(
				'production_leadtime',
				'ASC'
			)

			->get()
			->result();

		echo json_encode($data);
	}
	/* =========================================================
	| GET FILTER PRICE
	========================================================= */
	public function getFilterPrice()
	{
		$data = $this->db

			->distinct()

			->select('standard_price')

			->from('tbl_materials')

			->where('standard_price IS NOT NULL')

			->order_by(
				'standard_price',
				'ASC'
			)

			->get()
			->result();

		echo json_encode($data);
	}
	/* =========================================================
	| CARD MATERIAL
	========================================================= */
	public function materialCard()
	{

		$data = [
			'title'      	=> 'MATERIAL CARD',
			'active'     	=> 'material_card',
			'users' 	 	=> $this->db->get_where('tbl_users', ['username' =>  $this->session->userdata('username')])->row(),
			'breadcrumb' 	=> ['Home', 'Material Card'],
		];
		$this->template->load('tema/index', 'section/material_card', $data);
	}

	/* =========================================================
	| GET CARD MATERIALS
	========================================================= */
	public function getCardMaterials()
	{
		$list = $this->M_materials->getCardMaterials();

		$data = [];

		$no = $_POST['start'];

		foreach ($list as $o) {

			$no++;

			/* =========================================================
		IMAGE
		========================================================= */

			$image = base_url(
				'assets/images/No_Image_Available.jpg'
			);

			if (!empty($o->image_file)) {

				$image = base_url(
					'uploads/material_assets/images/' .
						$o->image_file
				);
			}

			/* =========================================================
		QR
		========================================================= */

			$qr = '-';

			if (!empty($o->qr_code_file)) {

				$qr = '
				<img src="' .
					base_url(
						'uploads/qrcode/' .
							$o->qr_code_file
					) .
					'"
				style="
					width:60px;
					height:60px;
					object-fit:contain;
				">
			';
			}

			/* =========================================================
		ROW
		========================================================= */

			$row = [];

			/* CHECKBOX */

			$row[] = '
			<div class="form-check text-center">

				<input type="checkbox"
					class="form-check-input checkMaterial"
					value="' . $o->id . '">

			</div>
		';

			/* IMAGE */

			$row[] = '
			<img src="' . $image . '"
				class="img-thumbnail"
				style="
					width:60px;
					height:60px;
					object-fit:cover;
				">
		';

			/* MLM */

			$row[] = '
			<div class="fw-semibold">
				' . $o->material_code . '
			</div>
		';

			/* MATERIAL */

			$row[] = '
			<div class="fw-semibold">
				' . $o->material_name . '
			</div>

			<div class="small text-muted">
				' . $o->library_code . '
			</div>
		';

			/* TYPE */

			$row[] = $o->material_type_name ?? '-';

			/* SUPPLIER */

			$row[] = $o->supplier_name ?? '-';

			/* QR */

			$row[] = $qr;

			$data[] = $row;
		}

		$output = [

			"draw" => $_POST['draw'],

			"recordsTotal" =>
			$this->M_materials->countAllCardMaterials(),

			"recordsFiltered" =>
			$this->M_materials->countFilteredCardMaterials(),

			"data" => $data

		];

		echo json_encode($output);
	}



	/* =========================================================
| PRINT MATERIAL CARD
========================================================= */

	public function printMaterialCard()
	{
		$ids = $this->input->get('ids');

		/* =========================================================
		| VALIDATION
		========================================================= */

		if (!$ids) {
			show_error('No material selected');
			return;
		}

		$idArray = explode(',', $ids);

		/* =========================================================
	| GET MATERIALS
	========================================================= */

		$this->db->select('
		m.*,

		s.supplier_name,

		mt.material_type_name,

		ml.lifecycle_name,

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
			'tbl_suppliers s',
			's.id = m.supplier_id',
			'left'
		);

		$this->db->join(
			'tbl_material_types mt',
			'mt.id = m.material_type_id',
			'left'
		);

		$this->db->join(
			'tbl_material_lifecycle ml',
			'ml.id = m.lifecycle_id',
			'left'
		);

		$this->db->join(
			'tbl_material_assets ma',
			'ma.material_id = m.id',
			'left'
		);

		$this->db->where_in(
			'm.id',
			$idArray
		);

		$materials = $this->db->get()->result();
		/* =========================================================
		| VIEW
		========================================================= */

		$data = [
			'materials' => $materials
		];

		$this->load->view(
			'section/print_material_card',
			$data
		);
	}


	public function getMaterialCardData()
	{
		$ids = $this->input->post('ids');

		if (empty($ids)) {

			echo json_encode([
				'status' => 'error',
				'message' => 'No material selected'
			]);

			return;
		}

		$this->db->select('
		m.id,
		m.material_code,
		m.material_name,
		m.library_code,
		s.supplier_name,
		ma.qr_code_file,
		img.file_name as image_file
	');

		$this->db->from('tbl_materials m');

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

		$this->db->join(
			'tbl_material_asset_images img',
			'img.asset_id = ma.id AND img.is_cover = 1',
			'left'
		);

		$this->db->where_in('m.id', $ids);

		$data = $this->db->get()->result();

		echo json_encode([
			'status' => 'success',
			'data'   => $data
		]);
	}

	/* Delete Assets Materials */

	public function deleteAssetsMaterial($id)
	{
		$delete = $this->M_materials->deleteAssetsMaterial($id);
		if ($delete) {
			$this->session->set_flashdata('message', [
				'title' => 'Success',
				'text'  => 'Assets Material Successfull Deleted',
				'icon'  => 'success',
				'type'  => 'success'
			]);
		} else {
			$this->session->set_flashdata('message', [
				'title' => 'Failed',
				'text'  => 'Assets Material not found or failed to delete',
				'icon'  => 'error',
				'type'  => 'danger'
			]);
		}
		redirect('materialsassets', 'refresh');
	}
}


/* End of file: Home.php */
