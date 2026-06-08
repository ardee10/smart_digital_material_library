<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Material extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		if (!$this->session->userdata('EMP_NO')) {
			/* Berikan SweetAlert */
			$this->session->set_flashdata('message', [
				'icon'  => 'warning',
				'title' => 'Session Expired',
				'text'  => 'Please login first'
			]);
			redirect('auth/visitor');
		}

		$data = [
			'title'      	=> 'SMART DIGITAL MATERIAL LIBRARIES',
			'active'     	=> 'Material Scan',
		];
		$this->template->load('tema/index_visitor', 'index', $data);
	}

	public function scanQRCode()
	{
		header('Content-Type: application/json');

		/*
	|--------------------------------------------------------------------------
	| GET QR CODE
	|--------------------------------------------------------------------------
	*/

		$material_code = $this->input->post('material_code');

		if (empty($material_code)) {

			echo json_encode([
				'status' => 'error',
				'message' => 'QR Code is empty'

			]);

			return;
		}

		/*
	|--------------------------------------------------------------------------
	| FIND MATERIAL
	|--------------------------------------------------------------------------
	*/

		$material = $this->db
			->select('
			m.*,
			s.supplier_name,
			ml.lifecycle_name
		')

			->from('tbl_materials m')

			->join(
				'tbl_suppliers s',
				's.id = m.supplier_id',
				'left'
			)

			->join(
				'tbl_material_lifecycle ml',
				'ml.id = m.lifecycle_id',
				'left'
			)

			->where('m.material_code', trim($material_code))

			->get()

			->row();

		/*
	|--------------------------------------------------------------------------
	| NOT FOUND
	|--------------------------------------------------------------------------
	*/

		if (!$material) {

			echo json_encode([

				'status' => 'error',

				'message' => 'Material QR Code Not Found'

			]);

			return;
		}

		/*
	|--------------------------------------------------------------------------
	| SUCCESS
	|--------------------------------------------------------------------------
	*/

		echo json_encode([

			'status' => 'success',

			'material' => $material

		]);
	}

	public function getMaterialDetail()
	{
		header('Content-Type: application/json');

		$material_code = $this->input->post('material_code');

		$material = $this->db
			->select('
			m.*,

			s.supplier_name,

			ml.lifecycle_name,

			u.uom_name,

			se.season_name,
			se.season_year,

			ma.id as asset_id,
			ma.qr_code_file,
			ma.blender_material_file,
			ma.u3m_file,
			ma.glb_file
		')
			->from('tbl_materials m')

			->join(
				'tbl_suppliers s',
				's.id = m.supplier_id',
				'left'
			)

			->join(
				'tbl_uom u',
				'u.id = m.weight_uom_id',
				'left'
			)

			->join(
				'tbl_material_lifecycle ml',
				'ml.id = m.lifecycle_id',
				'left'
			)

			->join(
				'tbl_material_assets ma',
				'ma.material_id = m.id',
				'left'
			)


			->join(
				'tbl_seasons se',
				'se.id = m.season_id',
				'left'
			)

			->where('m.material_code', $material_code)

			->get()
			->row();

		if (!$material) {

			echo json_encode([
				'status' => 'error',
				'message' => 'Material not found'
			]);

			return;
		}

		/*
	|--------------------------------------------------------------------------
	| GET IMAGES
	|--------------------------------------------------------------------------
	*/

		$images = [];

		if ($material->asset_id) {

			$getImages = $this->db
				->where('asset_id', $material->asset_id)
				// ->order_by('sort_order', 'ASC')
				->get('tbl_material_asset_images')
				->result();

			foreach ($getImages as $img) {

				$images[] = [

					'id' => $img->id,

					'url' => base_url(
						'uploads/material_assets/images/' .
							$img->file_name
					)
				];
			}
		}

		echo json_encode([

			'status' => 'success',
			'material' => $material,
			'images' => $images

		]);
	}
}

/* End of file: Material.php */
