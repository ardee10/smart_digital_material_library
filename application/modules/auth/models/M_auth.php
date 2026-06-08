<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function loginCheck($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('is_active', 1);

		$query = $this->db->get('tbl_users');

		if ($query->num_rows() == 0) {
			return ['status' => 'username_not_found'];
		}

		$user = $query->row();

		if (!password_verify($password, $user->password)) {
			return ['status' => 'wrong_password'];
		}

		// update last login
		$this->db->where('id', $user->id);
		$this->db->update('tbl_users', [
			'last_login' => date('Y-m-d H:i:s')
		]);

		return [
			'status' => 'success',
			'user'   => $user
		];
	}
}

/* End of file: M_auth.php */
