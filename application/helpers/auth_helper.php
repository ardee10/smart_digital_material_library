<?php
defined('BASEPATH') or exit('No direct script access allowed');

function check_login($allowed = [])
{
	$CI = &get_instance();

	$level = $CI->session->userdata('level');
	$login = $CI->session->userdata('logged_in');

	/*
	|--------------------------------------------------------------------------
	| CHECK LOGIN
	|--------------------------------------------------------------------------
	*/

	if (!$login) {

		$CI->session->set_flashdata('message', [
			'type' => 'error',
			'text' => 'Silakan login terlebih dahulu'
		]);

		redirect('Auth');
		exit;
	}

	/*
	|--------------------------------------------------------------------------
	| CHECK ROLE
	|--------------------------------------------------------------------------
	*/

	if (!empty($allowed) && !in_array($level, $allowed)) {

		$CI->session->set_flashdata('message', [
			'type' => 'error',
			'text' => 'Anda tidak memiliki akses'
		]);

		redirect('Auth');
		exit;
	}
}
