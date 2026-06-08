<?php
defined('BASEPATH') or exit('No direct script access allowed');
//USe PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller
{
	//Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin', 'Admin');
		$this->load->model('M_supplierserverside');
		$this->load->model('M_classification');

		//	Load check Login as administrator
		check_login(['administrator']);
	}
	// Model Number
	public function modelNumber()
	{
		$data = [
			'title'      	=> 'Model Number',
			'active' 		=> 'modelNumber',
			'breadcrumb' 	=> ['Home', 'Model Number'],
			'users' 	 	=> $this->db->get_where('tbl_users', ['username' =>  $this->session->userdata('username')])->row(),
			'model'			=> $this->Admin->viewModelNumber()
		];

		$this->template->load('tema/index', 'section/model_number', $data);
	}
	// Save Model Number
	public function saveModelNumber()
	{
		header('Content-Type: application/json');

		try {

			$model_number  = trim($this->input->post('model_number'));
			$model_name    = trim($this->input->post('model_name'));

			if (empty($model_number)) {

				echo json_encode([
					'status'  => 'error',
					'message' => 'Model number is required'
				]);
				return;
			}

			// CHECK EXIST
			$existing = $this->db
				->where('model_number', $model_number)
				->get('tbl_models')
				->row();

			if ($existing) {

				echo json_encode([
					'status'  => 'warning',
					'message' => 'Model number already exists'
				]);
				return;
			}

			// INSERT
			$data = [
				'id'           => null,
				'model_number' => $model_number,
				'model_name'   => $model_name,
				'created_at'   => date('Y-m-d H:i:s')
			];

			// $insert = $this->db->insert('tbl_models', $data);
			$insert = $this->Admin->insert($data);

			if ($insert) {

				echo json_encode([
					'status'  => 'success',
					'message' => 'Model number successfully added'
				]);
			} else {

				echo json_encode([
					'status'  => 'error',
					'message' => 'Failed to save data'
				]);
			}
		} catch (Exception $e) {

			echo json_encode([
				'status'  => 'error',
				'message' => $e->getMessage()
			]);
		}
	}
	// Update Model Number
	public function updateModelNumber($id = null)
	{
		header('Content-Type: application/json');

		$id 			= $id ?: $this->input->post('id');
		$model_number 	= $this->input->post('model_number');
		$model_name 	= $this->input->post('model_name');

		if (!$id || !$model_number) {
			echo json_encode(['status' => 'error', 'message' => 'ID and model number are required']);
			return;
		}

		// Check if model number already exists for another record
		$existing = $this->db->get_where('tbl_models', ['model_number' => $model_number, 'id !=' => $id])->row();
		if ($existing) {
			echo json_encode(['status' => 'error', 'message' => 'Model number already exists']);
			return;
		}

		$data = [
			'id'           => $id,
			'model_number' => $model_number,
			'model_name'   => $model_name ?: null,

		];


		$update = $this->Admin->update($id, $data);

		if ($update) {
			echo json_encode(['status' => 'success', 'message' => 'Model number updated successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Failed to update model number']);
		}
	}
	//getByID Model Number
	public function getById($id)
	{
		header('Content-Type: application/json');
		$data = $this->db->get_where('tbl_models', ['id' => $id])->row();

		echo json_encode([
			'status' => 'success',
			'data'   => $data
		]);
	}
	// Delete Model Number
	public function deleteModelNumber($id)
	{
		$delete = $this->Admin->delete($id);

		if ($delete) {
			$this->session->set_flashdata('message', [
				'title' => 'Success',
				'text'  => 'Data Successfully Deleted',
				'icon'  => 'success',
				'type'  => 'success'
			]);
		} else {
			$this->session->set_flashdata('message', [
				'title' => 'Failed',
				'text'  => 'Data not found or failed to delete',
				'icon'  => 'error',
				'type'  => 'danger'
			]);
		}

		redirect('admin/modelNumber', 'refresh');
	}
	//Supplier
	public function supplier()
	{
		$data = [
			'title'      	=> 'Supplier',
			'active' 		=> 'supplier',
			'users' 	 	=> $this->db->get_where('tbl_users', ['username' =>  $this->session->userdata('username')])->row(),
			'breadcrumb' 	=> ['Home', 'Supplier']
		];

		$this->template->load('tema/index', 'section/supplier', $data);
	}
	//Location
	public function location()
	{
		$data = [
			'title'      	=> 'Location',
			'active' 		=> 'location',
			'breadcrumb' 	=> ['Home', 'Location'],
			'users' 	 	=> $this->db->get_where('tbl_users', ['username' =>  $this->session->userdata('username')])->row(),
			'location'		=> $this->Admin->viewLocation()
		];

		$this->template->load('tema/index', 'section/location', $data);
	}
	// Save Location
	public function saveLocation()
	{
		header('Content-Type: application/json');
		try {
			$location_name = trim($this->input->post('location_name'));
			/*
		|--------------------------------------------------------------------------
		| VALIDATION
		|--------------------------------------------------------------------------
		*/
			if (empty($location_name)) {

				echo json_encode([
					'status'  => 'warning',
					'message' => 'Location name is required'
				]);

				return;
			}

			/*
		|--------------------------------------------------------------------------
		| CHECK DUPLICATE
		|--------------------------------------------------------------------------
		*/
			$existing = $this->db
				->where('LOWER(location_name)', strtolower($location_name))
				->get('tbl_locations')
				->row();

			if ($existing) {

				echo json_encode([
					'status'  => 'warning',
					'message' => 'Location already exists : ' . $location_name
				]);

				return;
			}

			/*
		|--------------------------------------------------------------------------
		| INSERT
		|--------------------------------------------------------------------------
		*/
			$data = [
				'id'			=> null,
				'location_name' => $location_name,
			];

			$insert = $this->Admin->insertLocation($data);

			if ($insert) {
				echo json_encode([
					'status'  => 'success',
					'message' => 'Location added successfully'
				]);
			} else {

				echo json_encode([
					'status'  => 'error',
					'message' => 'Failed to save location'
				]);
			}
		} catch (Exception $e) {

			echo json_encode([
				'status'  => 'error',
				'message' => $e->getMessage()
			]);
		}
	}
	// Location By ID
	public function getLocById($id)
	{
		header('Content-Type: application/json');
		$data = $this->db->get_where('tbl_locations', ['id' => $id])->row();
		echo json_encode([
			'status' => 'success',
			'data'   => $data
		]);
	}
	// Update Location
	public function updateLocation($id)
	{
		header('Content-Type: application/json');

		try {

			$location_name = trim($this->input->post('location_name'));

			if (empty($location_name)) {

				echo json_encode([
					'status'  => 'warning',
					'message' => 'Location name is required'
				]);

				return;
			}

			/*
		|--------------------------------------------------------------------------
		| CHECK DUPLICATE EXCEPT CURRENT ID
		|--------------------------------------------------------------------------
		*/

			$existing = $this->db
				->where('LOWER(location_name)', strtolower($location_name))
				->where('id !=', $id)
				->get('tbl_locations')
				->row();

			if ($existing) {

				echo json_encode([
					'status'  => 'warning',
					'message' => 'Location already exists : ' . $location_name
				]);

				return;
			}

			$data = [
				'location_name' => $location_name
			];

			$update = $this->Admin->updateLocation($id, $data);

			if ($update) {

				echo json_encode([
					'status'  => 'success',
					'message' => 'Location updated successfully'
				]);
			} else {

				echo json_encode([
					'status'  => 'error',
					'message' => 'Failed to update location'
				]);
			}
		} catch (Exception $e) {

			echo json_encode([
				'status'  => 'error',
				'message' => $e->getMessage()
			]);
		}
	}
	public function supplierServerside()
	{
		header('Content-Type: application/json');
		$list = $this->M_supplierserverside->get_datatables();
		$data = [];
		$no = $_POST['start'];
		foreach ($list as $row) {

			$no++;
			// STATUS BADGE
			$status = '';
			if ($row->status == 'ACTIVE') {

				$status = '
                <span class="badge bg-success">
                    Active
                </span>
            ';
			} else {

				$status = '
                <span class="badge bg-danger">
                    Inactive
                </span>
            ';
			}

			$data[] = [

				$no,

				$row->supplier_code,
				$row->supplier_name,
				$row->country,
				$status,

				'
            <button
                class="btn btn-warning btn-sm"
                onclick="editSupplier(this)"
                data-id="' . $row->id . '">

                <i class="bi bi-pencil"></i>
            </button>

           <a class="btn btn-danger btn-sm tombol-hapus" 
				href="' . base_url('Admin/deleteSupplier/' . $row->id) . '">
				<i class="bi bi-trash"></i>
			</a>
            '
			];
		}

		$output = [
			"draw"            => $_POST['draw'],
			"recordsTotal"    => $this->M_supplierserverside->count_all(),
			"recordsFiltered" => $this->M_supplierserverside->count_filtered(),
			"data"            => $data,
		];

		echo json_encode($output);
	}
	// Get Supplier by ID
	public function getSupplierById($id)
	{
		header('Content-Type: application/json');
		$data = $this->db->get_where('tbl_suppliers', ['id' => $id])->row();
		echo json_encode([
			'status' => 'success',
			'data'   => $data
		]);
	}
	//Add Supplier
	public function saveSupplier()
	{
		header('Content-Type: application/json');

		$supplier_code = $this->input->post('supplier_code');
		$supplier_name = $this->input->post('supplier_name');
		$country = $this->input->post('country');
		$status = $this->input->post('status');

		// Check if supplier code already exists
		$existing_supplier = $this->db->get_where('tbl_suppliers', ['supplier_code' => $supplier_code])->row();
		if ($existing_supplier) {
			echo json_encode(['status' => 'error', 'message' => 'Supplier code already exists']);
			return;
		}

		$data = [
			'supplier_code' => $supplier_code,
			'supplier_name' => $supplier_name,
			'country' 		=> $country,
			'status' 		=> $status
		];

		$insert = $this->Admin->insertSupplier($data);

		if ($insert) {
			echo json_encode(['status' => 'success', 'message' => 'Supplier added successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Failed to add supplier']);
		}
	}
	//Update Supplier
	public function updateSupplier($id)
	{
		header('Content-Type: application/json');
		$supplier_code = $this->input->post('supplier_code');
		$supplier_name = $this->input->post('supplier_name');
		$country = $this->input->post('country');
		$status = $this->input->post('status');
		$data = [
			'supplier_code' => $supplier_code,
			'supplier_name' => $supplier_name,
			'country' 		=> $country,
			'status' 		=> $status
		];
		$update = $this->Admin->updateSupplier($id, $data);
		if ($update) {
			echo json_encode(['status' => 'success', 'message' => 'Supplier updated successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Failed to update supplier']);
		}
	}
	//delete supplier
	public function deleteSupplier($id)
	{
		$delete = $this->Admin->deleteSupplier($id);
		if ($delete) {
			$this->session->set_flashdata('message', [
				'title' => 'Success',
				'text'  => 'Supplier Successfully Deleted',
				'icon'  => 'success',
				'type'  => 'success'
			]);
		} else {
			$this->session->set_flashdata('message', [
				'title' => 'Failed',
				'text'  => 'Supplier not found or failed to delete',
				'icon'  => 'error',
				'type'  => 'danger'
			]);
		}
		redirect('admin/supplier', 'refresh');
	}

	// Import Supplier
	public function importSupplier()
	{
		header('Content-Type: application/json');

		if (!isset($_FILES['file'])) {
			echo json_encode([
				'status' => 'error',
				'message' => 'No file uploaded'
			]);
			return;
		}

		$file = $_FILES['file']['tmp_name'];
		try {

			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
			$sheet = $spreadsheet->getActiveSheet();
			$rows = $sheet->toArray();
			$inserted = 0;
			foreach ($rows as $index => $row) {

				// Skip header
				if ($index === 0) {
					continue;
				}

				$supplier_name = trim($row[0]);
				$supplier_code = trim($row[1]);
				$country       = trim($row[2]);
				$status        = trim($row[3]);

				// Required validation
				if (empty($supplier_code) || empty($supplier_name)) {
					continue;
				}

				/*
			|--------------------------------------------------------------------------
			| CHECK DUPLICATE SUPPLIER CODE
			|--------------------------------------------------------------------------
			*/
				$check = $this->db
					->where('supplier_code', $supplier_code)
					->get('tbl_suppliers')
					->row();
				if ($check) {
					echo json_encode([
						'status'  => 'warning',
						'message' => 'Supplier Code already exists : ' . $supplier_code
					]);

					return;
				}

				/*
			|--------------------------------------------------------------------------
			| INSERT
			|--------------------------------------------------------------------------
			*/

				$dataInsert = [
					'supplier_name' => $supplier_name,
					'supplier_code' => $supplier_code,
					'country'       => $country,
					'status'        => $status,
					'created_at'    => date('Y-m-d H:i:s')
				];
				$insert = $this->Admin->insertSupplier($dataInsert);
				if ($insert) {
					$inserted++;
				}
			}

			echo json_encode([
				'status'  => 'success',
				'message' => $inserted . ' suppliers imported successfully'
			]);
		} catch (Exception $e) {

			echo json_encode([
				'status'  => 'error',
				'message' => $e->getMessage()
			]);
		}
	}

	//Import Model Number 
	public function importModelNumber()
	{
		header('Content-Type: application/json');
		if (!isset($_FILES['file'])) {
			echo json_encode([
				'status' => 'error',
				'message' => 'No file uploaded'
			]);
			return;
		}
		$file = $_FILES['file']['tmp_name'];

		try {
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
			$sheet = $spreadsheet->getActiveSheet();
			$rows = $sheet->toArray();
			$inserted = 0;
			foreach ($rows as $index => $row) {
				// Skip header
				if ($index === 0) {
					continue;
				}
				$model_number = trim($row[0]);
				$model_name   = trim($row[1]);
				/*
			|--------------------------------------------------------------------------
			| REQUIRED VALIDATION
			|--------------------------------------------------------------------------
			*/
				if (empty($model_number)) {
					continue;
				}
				/*
			|--------------------------------------------------------------------------
			| CHECK DUPLICATE MODEL NUMBER
			|--------------------------------------------------------------------------
			*/
				$existing = $this->db
					->where('model_number', $model_number)
					->get('tbl_models')
					->row();

				if ($existing) {

					echo json_encode([
						'status'  => 'warning',
						'message' => 'Model Number already exists : ' . $model_number
					]);
					return;
				}
				/*
			|--------------------------------------------------------------------------
			| INSERT DATA
			|--------------------------------------------------------------------------
			*/
				$dataInsert = [
					'model_number' => $model_number,
					'model_name'   => $model_name,
					'created_at'   => date('Y-m-d H:i:s')
				];
				$insert = $this->Admin->importModelNumber($dataInsert);
				if ($insert) {
					$inserted++;
				}
			}
			echo json_encode([
				'status'  => 'success',
				'message' => $inserted . ' Model Number imported successfully'
			]);
		} catch (Exception $e) {

			echo json_encode([
				'status'  => 'error',
				'message' => 'Failed to import Model Number : ' . $e->getMessage()
			]);
		}
	}
	//Classification 
	public function classfication()
	{

		$data = [
			'title'      	=> 'Classifications',
			'active' 		=> 'classification',
			'breadcrumb' 	=> ['Home', 'Classification'],
			'users' 	 	=> $this->db->get_where('tbl_users', ['username' =>  $this->session->userdata('username')])->row(),
			'classifications' 	=> $this->db
				->order_by('classification_name', 'ASC')
				->get('tbl_classifications')
				->result()

		];
		$this->template->load('tema/index', 'section/classification', $data);
	}
	// Serverside Classification
	public function classificationServerside()
	{
		$list = $this->M_classification->get_datatables();

		$data = [];

		$no = $_POST['start'];

		foreach ($list as $row) {

			$no++;

			$nested = [];

			$nested[] = $no;

			$nested[] = $row->classification_name;

			$nested[] = $row->parent_name
				? $row->parent_name
				: '<span class="badge bg-primary">ROOT</span>';

			$nested[] = '
			<button type="button"
				class="btn btn-warning btn-sm"
				onclick="editClassification(this)"
				data-id="' . $row->id . '">

				<i class="bi bi-pencil-square"></i>
			</button>

			
           <a class="btn btn-danger btn-sm tombol-hapus" 
				href="' . base_url('Admin/deleteClassification/' . $row->id) . '">
				<i class="bi bi-trash"></i>
			</a>
			
		';

			$data[] = $nested;
		}

		$output = [
			"draw"            => $_POST['draw'],
			"recordsTotal"    => $this->M_classification->count_all(),
			"recordsFiltered" => $this->M_classification->count_filtered(),
			"data"            => $data,
		];

		echo json_encode($output);
	}

	// Save Classification
	public function saveClassification()
	{
		header('Content-Type: application/json');

		$classification_name 	= trim($this->input->post('classification_name'));
		$parent_id 				= $this->input->post('parent_id');

		if (empty($classification_name)) {

			echo json_encode([
				'status'  => 'error',
				'message' => 'Classification name is required'
			]);

			return;
		}

		// Check duplicate
		$exists = $this->db
			->where('classification_name', $classification_name)
			->where('parent_id', $parent_id ?: null)
			->get('tbl_classifications')
			->row();

		if ($exists) {

			echo json_encode([
				'status'  => 'warning',
				'message' => 'Classification already exists'
			]);

			return;
		}

		$insert = $this->db->insert('tbl_classifications', [
			'classification_name' => $classification_name,
			'parent_id' 			=> $parent_id ?: null
		]);

		if ($insert) {

			echo json_encode([
				'status'  => 'success',
				'message' => 'Classification added successfully'
			]);
		} else {

			echo json_encode([
				'status'  => 'error',
				'message' => 'Failed to save classification'
			]);
		}
	}

	//GetClassByID
	public function getClassificationById($id)
	{
		header('Content-Type: application/json');
		$data = $this->db->get_where('tbl_classifications', ['id' => $id])->row();
		echo json_encode([
			'status' => 'success',
			'data'   => $data
		]);
	}

	//Delete Classification
	public function deleteClassification($id)
	{
		$delete = $this->Admin->deleteClassification($id);
		if ($delete) {
			$this->session->set_flashdata('message', [
				'title' => 'Success',
				'text'  => 'Classification Successfully Deleted',
				'icon'  => 'success',
				'type'  => 'success'
			]);
		} else {
			$this->session->set_flashdata('message', [
				'title' => 'Failed',
				'text'  => 'Classification not found or failed to delete',
				'icon'  => 'error',
				'type'  => 'danger'
			]);
		}
		redirect('admin/classfication', 'refresh');
	}
	//ImportLocation
	public function importLocation()
	{
		header('Content-Type: application/json');

		if (!isset($_FILES['file'])) {

			echo json_encode([
				'status'  => 'error',
				'message' => 'No file uploaded'
			]);
			return;
		}

		$file = $_FILES['file']['tmp_name'];

		try {

			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
			$sheet = $spreadsheet->getActiveSheet();
			$rows  = $sheet->toArray();

			$inserted  = 0;
			$duplicates = [];

			foreach ($rows as $index => $row) {

				// Skip Header
				if ($index == 0) {
					continue;
				}

				$location_name = trim($row[0]);

				/*
			|--------------------------------------------------------------------------
			| VALIDATION
			|--------------------------------------------------------------------------
			*/
				if (empty($location_name)) {
					continue;
				}

				/*
			|--------------------------------------------------------------------------
			| CHECK DUPLICATE
			|--------------------------------------------------------------------------
			*/
				$existing = $this->db
					->where('location_name', $location_name)
					->get('tbl_locations')
					->row();

				if ($existing) {

					$duplicates[] = $location_name;
					continue;
				}

				/*
			|--------------------------------------------------------------------------
			| INSERT DATA
			|--------------------------------------------------------------------------
			*/
				$dataInsert = [
					'location_name' => $location_name
				];

				$insert = $this->Admin->importLocation($dataInsert);

				if ($insert) {
					$inserted++;
				}
			}

			/*
		|--------------------------------------------------------------------------
		| RESPONSE
		|--------------------------------------------------------------------------
		*/
			if (!empty($duplicates)) {

				echo json_encode([
					'status'  => 'warning',
					'message' => 'Duplicate locations found: ' . implode(', ', $duplicates)
				]);

				return;
			}

			echo json_encode([
				'status'  => 'success',
				'message' => $inserted . ' locations imported successfully'
			]);
		} catch (Exception $e) {

			echo json_encode([
				'status'  => 'error',
				'message' => 'Failed to import locations: ' . $e->getMessage()
			]);
		}
	}

	//Delete Classification
	public function deleteLocation($id)
	{
		$delete = $this->Admin->deleteLocation($id);
		if ($delete) {
			$this->session->set_flashdata('message', [
				'title' => 'Success',
				'text'  => 'Location  Successfully Deleted',
				'icon'  => 'success',
				'type'  => 'success'
			]);
		} else {
			$this->session->set_flashdata('message', [
				'title' => 'Failed',
				'text'  => 'Location not found or failed to delete',
				'icon'  => 'error',
				'type'  => 'danger'
			]);
		}
		redirect('admin/location', 'refresh');
	}
}
/* End of file: Admin.php */
