<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_supplierserverside extends CI_Model
{

	protected $table = 'tbl_suppliers';

	protected $column_order = [
		null,
		'supplier_code',
		'supplier_name',
		'country',
		'status',
		null
	];

	protected $column_search = [
		'supplier_code',
		'supplier_name',
		'country',
		'status'
	];

	protected $order = [
		'id' => 'DESC'
	];

	public function __construct()
	{
		parent::__construct();
	}

	private function _get_datatables_query()
	{

		$this->db->from($this->table);

		// SEARCH
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

		// ORDER
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

	public function count_filtered()
	{

		$this->_get_datatables_query();

		return $this->db->get()->num_rows();
	}

	public function count_all()
	{

		return $this->db
			->from($this->table)
			->count_all_results();
	}
}
