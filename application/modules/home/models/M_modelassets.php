<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_modelassets extends CI_Model
{

	protected $table = 'tbl_model_assets ma';

	protected $column_order = [

		null,
		'm.model_number',
		'm.model_name',
		'ma.blender_asset_file'

	];

	protected $column_search = [

		'm.model_number',
		'm.model_name',
		'ma.blender_asset_file'

	];

	protected $order = [

		'ma.id' => 'DESC'

	];

	/*
	|--------------------------------------------------------------------------
	| QUERY
	|--------------------------------------------------------------------------
	*/

	private function _get_datatables_query()
	{

		$this->db->select('
			ma.*,

			m.model_number,
			m.model_name
		');

		$this->db->from($this->table);

		$this->db->join(
			'tbl_models m',
			'm.id = ma.model_id',
			'left'
		);

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
				key($this->order),
				$this->order[key($this->order)]
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
	| RESPONSE DATATABLE
	|--------------------------------------------------------------------------
	*/

	public function getDataTables()
	{

		$list = $this->get_datatables();

		$data = [];

		$no = $_POST['start'];

		foreach ($list as $row) {

			$no++;

			$blendButton = '-';

			/*
			|--------------------------------------------------------------------------
			| BLEND FILE
			|--------------------------------------------------------------------------
			*/

			if ($row->blender_asset_file) {

				$blendButton = '

					<a href="' .

					base_url(
						$row->blender_asset_file
					)

					. '"

						target="_blank"

						class="btn btn-dark btn-sm">

						<i class="bi bi-box"></i>

						Download Blend

					</a>
				';
			}

			$data[] = [

				$no,

				'
				<div>

					<strong>' .
					$row->model_number .
					'</strong>

					<br>

					<small class="text-muted">
						' .
					$row->model_name .
					'
					</small>

				</div>
				',

				$blendButton,

				'
				<div class="btn-group">

					<button
						class="btn btn-warning btn-sm">

						<i class="bi bi-pencil"></i>

					</button>

					<button
						class="btn btn-danger btn-sm">

						<i class="bi bi-trash"></i>

					</button>

				</div>
				'
			];
		}

		return [

			"draw" => $_POST['draw'],

			"recordsTotal" =>
			$this->count_all(),

			"recordsFiltered" =>
			$this->count_filtered(),

			"data" => $data

		];
	}
}
