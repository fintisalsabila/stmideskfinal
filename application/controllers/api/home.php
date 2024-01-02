<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

class Api extends REST_Controller
{

	function __construct()
	{
		parent::__construct();

		// Set konfigurasi REST_Controller jika diperlukan
		$this->load->library('form_validation');

		if (!$this->session->userdata('id_user')) {
			$this->response([
				'status' => FALSE,
				'message' => 'Silakan login terlebih dahulu.'
			], REST_Controller::HTTP_UNAUTHORIZED);
		}
	}

	public function index_get()
	{
		// Implementasi logika dari fungsi index() di sini
		// ...

		// Contoh respons:
		$this->response([
			'status' => TRUE,
			'message' => 'Data berhasil diambil',
			'data' => $yourData
		], REST_Controller::HTTP_OK);
	}

	// Tambahkan fungsi API lainnya sesuai kebutuhan

	// Contoh fungsi untuk mendapatkan notifikasi
	public function notifications_get()
	{
		// Implementasi logika untuk mendapatkan notifikasi di sini
		// ...

		// Contoh respons:
		$this->response([
			'status' => TRUE,
			'message' => 'Data notifikasi berhasil diambil',
			'data' => $yourNotificationData
		], REST_Controller::HTTP_OK);
	}

	// Contoh fungsi untuk mendapatkan data lainnya
	public function other_data_get()
	{
		// Implementasi logika untuk mendapatkan data lainnya di sini
		// ...

		// Contoh respons:
		$this->response([
			'status' => TRUE,
			'message' => 'Data lainnya berhasil diambil',
			'data' => $yourOtherData
		], REST_Controller::HTTP_OK);
	}

	// Tambahkan fungsi API lainnya sesuai kebutuhan
}
