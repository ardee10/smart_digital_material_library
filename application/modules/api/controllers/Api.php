<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_api');
	}

	/* =========================================================
	| DEFAULT
	========================================================= */

	public function index()
	{
		$this->response([
			'status'  => 'success',
			'message' => 'Material Library API Ready'
		]);
	}

	/* =========================================================
	| MATERIAL LIST
	========================================================= */

	public function materials()
	{
		$data = $this->M_api->getMaterials();

		$this->response([
			'status' => 'success',
			'data'   => $data
		]);
	}

	/* =========================================================
	| MATERIAL DETAIL
	| /api/material/detail/KJT001
	========================================================= */

	public function detail($material_code = null)
	{
		if (!$material_code) {

			return $this->response([
				'status'  => 'error',
				'message' => 'Material code required'
			]);
		}

		$data = $this->M_api->getMaterialDetail($material_code);

		if (!$data) {

			return $this->response([
				'status'  => 'error',
				'message' => 'Material not found'
			]);
		}

		$this->response([
			'status' => 'success',
			'data'   => $data
		]);
	}

	/* =========================================================
	| SEARCH MATERIAL
	| /api/material/search?q=mesh
	========================================================= */

	public function search()
	{
		$keyword = $this->input->get('q');

		$data = $this->M_api->searchMaterial($keyword);

		$this->response([
			'status' => 'success',
			'data'   => $data
		]);
	}

	/* =========================================================
	| SCAN QR
	| /api/material/scan/KJT001
	========================================================= */

	public function scan($material_code = null)
	{
		if (!$material_code) {

			return $this->response([
				'status'  => 'error',
				'message' => 'QR code invalid'
			]);
		}

		$data = $this->M_api->getMaterialDetail($material_code);

		if (!$data) {

			return $this->response([
				'status'  => 'error',
				'message' => 'Material not found'
			]);
		}

		$this->response([
			'status' => 'success',
			'data'   => $data
		]);
	}

	/* =========================================================
	| JSON RESPONSE
	========================================================= */

	private function response($data)
	{
		header('Content-Type: application/json');
		echo json_encode($data);
		exit;
	}
}
