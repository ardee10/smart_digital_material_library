<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_material_assets_serverside extends CI_Model
{

	protected $table = 'tbl_material_assets';

	protected $column_order = [
		null,
		'm.material_code',
		'ma.qr_code',
		'ma.blender_material_file',
		'ma.u3m_file',
		null
	];

	protected $column_search = [
		'm.material_code',
		'ma.qr_code'
	];

	protected $order = [
		'ma.id' => 'DESC'
	];

	public function __construct()
	{
		parent::__construct();
	}

	/*
	|--------------------------------------------------------------------------
	| BASE QUERY
	|--------------------------------------------------------------------------
	*/

	private function _get_datatables_query()
	{

		$this->db->select("
			ma.*,
			m.material_code,

			(
				SELECT COUNT(mi.id)
				FROM tbl_material_asset_images mi
				WHERE mi.asset_id = ma.id
			) as total_images
		");

		$this->db->from('tbl_material_assets ma');

		$this->db->join(
			'tbl_materials m',
			'm.id = ma.material_id',
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

	public function get_datatables()
	{

		$this->_get_datatables_query();

		if ($_POST['length'] != -1) {

			$this->db->limit(
				$_POST['length'],
				$_POST['start']
			);
		}

		$query = $this->db->get();

		return $query->result();
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
}
