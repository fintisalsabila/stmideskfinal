<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Ticket extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ticket_model');
        // $this->load->helper('form');
        // $this->load->library('form_validation');
    }

    public function index_get($user_id)
    {
        if($user_id == "adminpanel") {
            $data = $this->Ticket_model->get_data_ticket_admin();
        }else{
            $data = $this->Ticket_model->get_data_ticket_user($user_id);
        }

        foreach ($data as $k => $v) {
            if ($data[$k]['status'] == 6 and $data[$k]['feedback'] == "") {
            } else {
                $data[$k]['feedback'] = getFeedback($data[$k]['status'], $data[$k]['feedback']);
            }
            $data[$k]['status'] = getStatus($data[$k]['status']);
            $data[$k]['progress'] = getProgress($data[$k]['progress']);
        }

        if ($data) {
            $this->response([
                'payload' => $data
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'payload' => null
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function detail_get($id)
    {
        $data = $this->Ticket_model->get_data_ticket_id($id);
        if ($data['tanggal_solved'] == "0000-00-00 00:00:00") {
            $data['tanggal_solved'] = "-";
        }
        if ($data['tanggal_proses'] == "0000-00-00 00:00:00") {
            $data['tanggal_proses'] = "-";
        }
        if ($data['nama_teknisi'] == null) {
            $data['nama_teknisi'] = "";
        }


        $tracking = $this->Ticket_model->get_data_tracking($id);

        if ($data) {
            $this->response([
                'data' => $data,
                'tracking' => $tracking,

            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'data' => null,
                'tracking' => null
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function kategori_masalah_get(){
        $kategori = $this->Ticket_model->get_kategori_masalah();

        if ($kategori) {
            $this->response([
                'payload' => $kategori

            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'payload' => null
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function sub_kategori_masalah_get($id_kategori)
    {
        $sub_kategori = $this->Ticket_model->get_sub_kategori_masalah($id_kategori);

        if ($sub_kategori) {
            $this->response([
                'payload' => $sub_kategori

            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'payload' => null
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function kondisi_get()
    {
        $kondisi = $this->Ticket_model->get_kondisi();

        if ($kondisi) {
            $this->response([
                'payload' => $kondisi

            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'payload' => null
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function ticket_post()
    {
        error_reporting(0);
        $getkodeticket = $this->Ticket_model->getkodeticket();

        $ticket = $getkodeticket;

        $id_user = strtoupper(trim($this->input->post('id_user')));
        $tanggal = date("Y-m-d  H:i:s");

        $id_sub_kategori = strtoupper(trim($this->input->post('id_sub_kategori')));
        $problem_summary = strtoupper(trim($this->input->post('problem_summary')));
        $problem_detail = strtoupper(trim($this->input->post('problem_detail')));
        $id_teknisi = strtoupper(trim($this->input->post('id_teknisi')));

        $data['id_ticket'] = $ticket;
        $data['reported'] = $id_user;
        $data['tanggal'] = $tanggal;
        $data['id_sub_kategori'] = $id_sub_kategori;
        $data['problem_summary'] = $problem_summary;
        $data['problem_detail'] = $problem_detail;
        $data['id_teknisi'] = $id_teknisi;
        $data['status'] = 1;
        $data['progress'] = 0;

        $tracking['id_ticket'] = $ticket;
        $tracking['tanggal'] = $tanggal;
        $tracking['status'] = "Created Ticket";
        $tracking['deskripsi'] = "";
        $tracking['id_user'] = $id_user;

        $filename = $_FILES["foto"]["name"];

        $file_berkas = "";
        if (!empty($filename)) {
            $extensionList = array("png", "jpeg", "jpg");
            $sliceName = explode(".", $filename);
            $ekstensi_berkas = end($sliceName);
            if (in_array($ekstensi_berkas, $extensionList)) {
                $file_berkas = time() . mt_rand() . "." . $ekstensi_berkas;
                $this->upload_dokumen_file($file_berkas, "../assets/uploads/", "foto");
            } else {
                $this->response([
                    'payload' => "gagal"
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }

        $data['foto'] = $file_berkas;

        $this->db->insert('ticket', $data);
        $this->db->insert('tracking', $tracking);

        if ($data) {
            $this->response([
                'payload' => "sukses"
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'payload' => "gagal"
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    function upload_dokumen_file($fupload_name, $lokasi, $filename)
    {
        $vfile_upload = $lokasi . $fupload_name;
        move_uploaded_file($_FILES[$filename]["tmp_name"], $vfile_upload);
    }
}
