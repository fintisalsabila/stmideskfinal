<?php
defined('BASEPATH') or exit('No direct script access allowed');

class profile extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_app');

        if (!$this->session->userdata('id_user')) {
            $this->session->set_flashdata("msg", "<div class='alert alert-info'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Silahkan login terlebih dahulu.
       </div>");
            redirect('login');
        }
    }


    function view()
    {
        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/profile";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id_user = trim($this->session->userdata('id_user'));

        //notification 

        $sql_listticket = "SELECT COUNT(id_ticket) AS jml_list_ticket FROM ticket WHERE status = 2";
        $row_listticket = $this->db->query($sql_listticket)->row();

        $data['notif_list_ticket'] = $row_listticket->jml_list_ticket;

        $sql_approvalticket = "SELECT COUNT(A.id_ticket) AS jml_approval_ticket FROM ticket A 
        LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori 
        LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
        LEFT JOIN karyawan D ON D.nip = A.reported 
        LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept WHERE E.id_dept = $id_dept AND status = 1";
        $row_approvalticket = $this->db->query($sql_approvalticket)->row();

        $data['notif_approval'] = $row_approvalticket->jml_approval_ticket;

        $sql_assignmentticket = "SELECT COUNT(id_ticket) AS jml_assignment_ticket FROM ticket WHERE status = 3 AND id_teknisi='$id_user'";
        $row_assignmentticket = $this->db->query($sql_assignmentticket)->row();

        $data['notif_assignment'] = $row_assignmentticket->jml_assignment_ticket;

        //end notification

        $id = $this->session->userdata('id_user');


        $sql =
            "SELECT A.nip, A.nama, A.alamat, A.jk, B.level, B.level, C.nama_jabatan, D.nama_bagian_dept, E.nama_dept, C.nama_jabatan 
        FROM KARYAWAN A 
        LEFT JOIN user B ON B.username = A.nip 
        LEFT JOIN jabatan C ON C.id_jabatan = A.id_jabatan 
        LEFT JOIN bagian_departemen D ON D.id_bagian_dept = A.id_bagian_dept 
        LEFT JOIN departemen E ON E.id_dept = D.id_dept WHERE A.nip ='$id'";

        $row = $this->db->query($sql)->row();

        //general
        $data['nip'] = $row->nip;
        $data['nama'] = $row->nama;
        $data['alamat'] = $row->alamat;
        $data['jk'] = $row->jk;

        //info jabatan
        $data['jabatan'] = $row->nama_jabatan;
        $data['dept'] = $row->nama_dept;
        $data['bagian'] = $row->nama_bagian_dept;
        $data['level'] = $row->level;




        $this->load->view('template', $data);
    }


    //UBAH KATA SANDI TOLONG
    function change_password()
    {
        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/change_password";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id_user = trim($this->session->userdata('id_user'));

        $id = $this->session->userdata('id_user');


        $sql =
            "SELECT A.nip, A.nama, A.alamat, A.jk, B.level, B.level, C.nama_jabatan, D.nama_bagian_dept, E.nama_dept, C.nama_jabatan 
        FROM KARYAWAN A 
        LEFT JOIN user B ON B.username = A.nip 
        LEFT JOIN jabatan C ON C.id_jabatan = A.id_jabatan 
        LEFT JOIN bagian_departemen D ON D.id_bagian_dept = A.id_bagian_dept 
        LEFT JOIN departemen E ON E.id_dept = D.id_dept WHERE A.nip ='$id'";

        $row = $this->db->query($sql)->row();

        $data['url'] = "profile/save";

        $this->load->view('template', $data);
    }

    function save()
    {
        $id_user = trim($this->session->userdata('id_user'));

        $pass = trim($this->input->post('pass'));
        $pass_confirm = trim($this->input->post('pass_confirm'));
        if($pass != $pass_confirm ) {
            $this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Password tidak sama.
			    </div>");
            redirect('profile/change_password');
        }

        $this->db->trans_start();

        $this->db->where('username', $id_user);
        $this->db->update('user', array("password" => md5($pass_confirm)));

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> gagal ubah kata sandi.
			    </div>");
            redirect('profile/change_password');
        } else {
            $this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> berhasil ubah kata sandi.
			    </div>");
            redirect('profile/change_password');
        }
    }
}
