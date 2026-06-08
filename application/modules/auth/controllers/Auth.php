<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth', 'Auth');
	}

	public function index()
	{
		$data = [
			'title' => 'Halaman Login'
		];
		$this->load->view('auth', $data);
	}
	public function visitor()
	{
		$data = [
			'title' => 'Halaman Visotor'
		];

		$this->load->view('auth_visitor', $data);
	}

	public function visitorCheck()
	{
		/*
	|--------------------------------------------------------------------------
	| GET INPUT
	|--------------------------------------------------------------------------
	*/
		$plant = $this->input->post('plant');
		$nik   = $this->input->post('nik');
		/*

	|--------------------------------------------------------------------------
	| VALIDATION
	|--------------------------------------------------------------------------
	*/

		if (empty($plant) || empty($nik)) {
			$this->session->set_flashdata('message', [
				'icon'  => 'error',
				'type'	=> 'error',
				'title' => 'Failed',
				'text'  => 'Plant dan NIK wajib diisi'
			]);
			redirect('Auth/visitor');
			return;
		}

		/*
	|--------------------------------------------------------------------------
	| HIT API
	|--------------------------------------------------------------------------
	*/

		$url = EMPLOYEE . '/' . $nik; //http://192.168.44.97/apidata/Kaizen/employee148755
		$response = @file_get_contents($url);
		/*
	|--------------------------------------------------------------------------
	| API FAILED
	|--------------------------------------------------------------------------
	*/
		if ($response === FALSE) {
			$this->session->set_flashdata('message', [
				'type' => 'error',
				'icon'  => 'error',
				'title' => 'API Error',
				'text'  => 'Gagal terhubung ke server employee'
			]);
			redirect('Auth/visitor');
			return;
		}
		/*
	|--------------------------------------------------------------------------
	| DECODE JSON
	|--------------------------------------------------------------------------
	*/
		$result = json_decode($response);
		/*
|--------------------------------------------------------------------------
| PLANT VALIDATION
|--------------------------------------------------------------------------
*/

		if ($plant == 'PWI') {
			$this->session->set_flashdata('message', [
				'type' => 'error',
				'icon'  => 'warning',
				'title' => 'Plant Not Available',
				'text'  => 'PWI plant is not available yet'

			]);

			redirect('Auth/visitor');

			return;
		}

		/*
|--------------------------------------------------------------------------
| ONLY PWJ ALLOWED
|--------------------------------------------------------------------------
*/

		if ($plant != 'PWJ') {
			$this->session->set_flashdata('message', [
				'type' => 'error',
				'icon'  => 'error',
				'title' => 'Invalid Plant',
				'text'  => 'Please select a valid plant'
			]);

			redirect('Auth/visitor');

			return;
		}

		/*
|--------------------------------------------------------------------------
| CHECK API RESPONSE
|--------------------------------------------------------------------------
|
| JSON:
|
| {
|   "status":"success",
|   "data":[ ... ]
| }
|
*/

		if (
			!$result ||
			$result->status != 'success' ||
			empty($result->data)
		) {

			$this->session->set_flashdata('message', [
				'type' => 'error',
				'icon'  => 'error',
				'title' => 'Employee Not Found',
				'text'  => 'Employee ID was not found'
			]);

			redirect('Auth/visitor');

			return;
		}

		/*
|--------------------------------------------------------------------------
| EMPLOYEE DATA
|--------------------------------------------------------------------------
*/

		$employee = $result->data[0];

		/*
|--------------------------------------------------------------------------
| SAVE SESSION
|--------------------------------------------------------------------------
*/

		$data = [

			'visitor_login' => true,
			'EMP_NO'        => $employee->EMP_NO,
			'NAME'          => $employee->NAME,
			'DEPT_NM'       => $employee->DEPT_NM,
			'WC_NM'         => $employee->WC_NM,
			'HAND_TEL_NO'   => $employee->HAND_TEL_NO,
			'PLANT'         => $plant

		];

		$this->session->set_userdata($data);
		/*
|--------------------------------------------------------------------------
| SUCCESS
|--------------------------------------------------------------------------
*/

		$this->session->set_flashdata('message', [
			'icon'  => 'success',
			'type'  => 'success',
			'title' => 'Login Success',
			'text'  => 'Welcome to Smart Digital Material Library'
		]);

		redirect('Material');
	}
	public function loginCheck()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', [
				'type' => 'error',
				'text' => 'Username dan password harus diisi'
			]);
			redirect('Auth');
		}

		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);

		$result = $this->Auth->loginCheck($username, $password);

		if ($result['status'] == 'success') {

			$user = $result['user']; // 
			$session_data = [
				'id'        => $user->id,
				'username'  => $user->username,
				'nama'      => $user->nama_lengkap,
				'level'     => $user->level,
				'foto'      => $user->foto,
				'logged_in' => TRUE
			];

			$this->session->set_userdata($session_data);
			$this->session->set_flashdata('message', [
				'type'  => 'success',
				'title' => 'Success',
				'icon'  => 'success',
				'text'  => 'Welcome to Smart Digital Material Library ' . $user->nama_lengkap
			]);

			//redirect berdasarkan level
			if ($user->level == 'administrator') {
				redirect('dashboard', 'refresh');

				echo 'Login sebagai Adminstrator Berhasil';
			} elseif ($user->level == 'users') {
				redirect('dashboard', 'refresh');

				echo 'Login sebagai Users Berhasil';
			}
		} elseif ($result['status'] == 'username_not_found') {

			$this->session->set_flashdata('message', [
				'type' => 'error',
				'text' => 'Username tidak ditemukan atau akun tidak aktif'
			]);
			redirect('Auth');
		} elseif ($result['status'] == 'wrong_password') {

			$this->session->set_flashdata('message', [
				'type' => 'warning',
				'text' => 'Password yang Anda masukkan salah'
			]);
			redirect('Auth');
		} else {

			$this->session->set_flashdata('message', [
				'type' => 'error',
				'text' => 'Terjadi kesalahan saat proses login'
			]);
			redirect('Auth');
		}
	}
	public function logout()
	{

		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama_lengkap');
		$this->session->unset_userdata('level');

		//  set flash message setelah destroy → pakai cara ini
		$this->session->set_flashdata('message', [
			'type'  => 'success',
			'title' => 'Logout',
			'text'  => 'Your Account Successfully Logout',
			'icon'  => 'success'
		]);

		// Redirect ke halaman login
		redirect('Auth');
	}
	public function logoutVisitor()
	{

		$this->session->unset_userdata('EMP_NO');
		$this->session->unset_userdata('NAME');
		$this->session->unset_userdata('DEPT_NM');


		//  set flash message setelah destroy → pakai cara ini
		$this->session->set_flashdata('message', [
			'type'  => 'success',
			'title' => 'Logout',
			'text'  => 'Your Account Successfully Logout',
			'icon'  => 'success'
		]);

		// Redirect ke halaman login
		redirect('Auth/visitor');
	}
}

/* End of file: Auth.php */
