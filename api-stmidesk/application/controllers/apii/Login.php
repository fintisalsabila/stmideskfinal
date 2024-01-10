<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Login extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function login_post()
	{
		$username = trim($this->input->post('username'));
		$password = md5(trim($this->input->post('password')));

		$akses = $this->db->query("select A.username, B.nama, A.level, B.id_jabatan, C.id_dept FROM user A 
		LEFT JOIN karyawan B ON B.nip = A.username
        LEFT JOIN bagian_departemen C ON C.id_bagian_dept = B.id_bagian_dept
	 WHERE A.username = '$username' AND A.password = '$password'");

		if ($akses->num_rows() == 1) {
			$data = $akses->row_array();
			if($data["level"] == "CUSTOMER" || $data["level"] == "ADMIN") {
				$this->response([
				'payload' => $akses->row_array(),
			], REST_Controller::HTTP_OK);
			}else{
				$this->response([
				'payload' => null
			], REST_Controller::HTTP_NOT_FOUND);
			}
		} else {
			$this->response([
				'payload' => null
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
}
