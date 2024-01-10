<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class Ticket_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_data_ticket_user($id)
    {
        $query = $this->db->query("SELECT A.progress, A.tanggal_proses, A.tanggal_solved, A.id_teknisi, D.feedback, A.status, A.id_ticket, A.tanggal, A.foto, B.nama_sub_kategori, C.nama_kategori
                                   FROM ticket A 
                                   LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
                                   LEFT JOIN kategori C ON C.id_kategori = B.id_kategori 
                                   LEFT JOIN history_feedback D ON D.id_ticket = A.id_ticket
                                   WHERE A.reported = '$id' ");
        return $query->result_array();
    }

    function get_data_ticket_admin()
    {
        $query = $this->db->query("SELECT A.progress, A.tanggal_proses, A.tanggal_solved, A.id_teknisi, D.feedback, A.status, A.id_ticket, A.tanggal, A.foto, B.nama_sub_kategori, C.nama_kategori
                                   FROM ticket A 
                                   LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
                                   LEFT JOIN kategori C ON C.id_kategori = B.id_kategori 
                                   LEFT JOIN history_feedback D ON D.id_ticket = A.id_ticket");
        return $query->result_array();
    }

    function get_data_ticket_id($id)
    {
        $sql = "SELECT A.status, A.progress, A.tanggal, A.tanggal_solved, A.tanggal_proses, A.tanggal_solved, A.problem_summary, A.problem_detail, A.foto,
        F.nama AS nama_teknisi, D.nama, C.id_kategori, A.id_ticket, A.tanggal, B.nama_sub_kategori, 
        C.nama_kategori, HF.feedback
        FROM ticket A 
        LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
        LEFT JOIN kategori C ON C.id_kategori = B.id_kategori 
        LEFT JOIN karyawan D ON D.nip = A.reported 
        LEFT JOIN teknisi E ON E.id_teknisi = A.id_teknisi
        LEFT JOIN karyawan F ON F.nip = E.nip
        LEFT JOIN history_feedback HF ON HF.id_ticket = A.id_ticket
        WHERE A.id_ticket = '$id'";

        $row = $this->db->query($sql)->row_array();
        return $row;
    }

    function get_data_tracking($id) {
        $query = $this->db->query("SELECT A.tanggal, A.status, A.deskripsi, B.nama
                                   FROM tracking A 
                                   LEFT JOIN karyawan B ON B.nip = A.id_user
                                   WHERE A.id_ticket ='$id'");
        return $query->result_array();
    }

    function get_kategori_masalah() {
        $sql = "SELECT * FROM kategori ORDER BY nama_kategori";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_sub_kategori_masalah($id_kategori) {
        $sql = "SELECT * FROM sub_kategori where id_kategori ='$id_kategori' ORDER BY nama_sub_kategori";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_kondisi() {
        $sql = "SELECT * FROM kondisi ORDER BY nama_kondisi";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getkodeticket()
    {
        $query = $this->db->query("select max(id_ticket) as max_code FROM ticket");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 9, 4);

        $max_nik = $max_fix + 1;

        $tanggal = $time = date("d");
        $bulan = $time = date("m");
        $tahun = $time = date("Y");

        $nip = "T" . $tahun . $bulan . $tanggal . sprintf("%04s", $max_nik);
        return $nip;
    }
}
