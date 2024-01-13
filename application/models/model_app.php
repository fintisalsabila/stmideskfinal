<?php

class Model_app extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    //  ================= AUTOMATIC CODE ==================
    public function insert_ticket($gambar) {
        $data = array(
            'gambar' => $gambar
            // Tambahkan kolom lain sesuai kebutuhan
        );

        $this->db->insert('ticket', $data);
    }

    public function get_tickets() {
        $query = $this->db->get('ticket');
        return $query->result();
    }

/**Generates a unique ticket code based on the maximum existing ticket ID.**/
    public function getkodeticket()
{
    $query = $this->db->query("SELECT MAX(id_ticket) AS max_code FROM ticket");

    $row = $query->row_array();

    $max_id = $row['max_code'];
    $max_fix = (int) substr($max_id, 9, 4);

    $max_nik = $max_fix + 1;

    $tanggal = date("d");
    $bulan = date("m");
    $tahun = date("Y");

    $nip = "T" . $tahun . $bulan . $tanggal . sprintf("%04s", $max_nik);
    return $nip;
}


    public function getkodekaryawan()
    {
        $query = $this->db->query("select max(nip) as max_code FROM karyawan");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1, 4);

        $max_nik = $max_fix + 1;

        $nip = "K" . sprintf("%04s", $max_nik);
        return $nip;
    }

    public function getkodeteknisi()
    {
        $query = $this->db->query("select max(id_teknisi) as max_code FROM teknisi");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1, 4);

        $max_id_teknisi = $max_fix + 1;

        $id_teknisi = "T" . sprintf("%04s", $max_id_teknisi);
        return $id_teknisi;
    }

    public function getkodeuser()
    {
        $query = $this->db->query("select max(id_user) as max_code FROM user");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1, 4);

        $max_id_user = $max_fix + 1;

        $id_user = "U" . sprintf("%04s", $max_id_user);
        return $id_user;
    }

    public function datajabatan()
    {
        $query = $this->db->query('SELECT * FROM jabatan');
        return $query->result();
    }

    public function datakaryawan()
{
    $query = $this->db->query('SELECT A.nama, A.nip, A.alamat, A.jk, C.nama_bagian_dept, B.nama_jabatan, D.nama_dept
                           FROM karyawan A LEFT JOIN jabatan B ON B.id_jabatan = A.id_jabatan
                                           LEFT JOIN bagian_departemen C ON C.id_bagian_dept = A.id_bagian_dept
                                           LEFT JOIN departemen D ON D.id_dept = C.id_dept
                           ORDER BY A.nip DESC');  // Add this line to order by nip in descending order

    return $query->result();
}

public function datalist_ticket()
{
    $query = $this->db->query("SELECT D.nama, F.nama_dept, A.status, A.id_ticket, A.tanggal, A.foto, B.nama_sub_kategori, C.nama_kategori
                               FROM ticket A 
                               LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
                               LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
                               LEFT JOIN karyawan D ON D.nip = A.reported
                               LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept
                               LEFT JOIN departemen F ON F.id_dept = E.id_dept
                               WHERE A.status IN (2,3,4,5,6)
                               ORDER BY A.tanggal DESC");
    return $query->result();
}

public function data_trackingticket($id)
{
    $query = $this->db->query("SELECT A.tanggal, A.status, A.deskripsi, B.nama
                               FROM tracking A 
                               LEFT JOIN karyawan B ON B.nip = A.id_user
                               WHERE A.id_ticket ='$id'
                               ORDER BY A.tanggal DESC");

    return $query->result();
    // The following code is unreachable, so it has been removed.
    // $query = $this->db->query("SELECT A.tanggal, A.status, A.deskripsi, B.nama, C.*
    //                            FROM tracking A 
    //                            LEFT JOIN karyawan B ON B.nip = A.id_user
    //                            LEFT JOIN ticket C ON C.id_ticket = A.id_ticket
    //                            WHERE A.id_ticket ='$id'");
    // return $query->result();
}

    public function datainformasi()
    {

        $query = $this->db->query("SELECT A.tanggal, A.subject, A.pesan, C.nama, A.id_informasi
                                   FROM informasi A 
                                   LEFT JOIN karyawan C ON C.nip =  A.id_user
                                   WHERE A.status = 1");
        return $query->result();
    }

    public function datamyticket($id)
{
    $query = $this->db->query("SELECT A.progress, A.tanggal_proses, A.tanggal_solved, A.id_teknisi, D.feedback, A.status, A.id_ticket, A.tanggal, A.foto, B.nama_sub_kategori, C.nama_kategori
                               FROM ticket A 
                               LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
                               LEFT JOIN kategori C ON C.id_kategori = B.id_kategori 
                               LEFT JOIN history_feedback D ON D.id_ticket = A.id_ticket
                               WHERE A.reported = '$id'
                               ORDER BY A.tanggal DESC");
    return $query->result();
}

    public function datamyassignment($id)
    {
        $query = $this->db->query("SELECT A.progress, A.status, A.id_ticket, A.reported, A.tanggal, A.foto, B.nama_sub_kategori, C.nama_kategori
                                FROM ticket A 
                                LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
                                LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
                                LEFT JOIN karyawan D ON D.nip = A.reported
                                LEFT JOIN teknisi E ON E.id_teknisi = A.id_teknisi
                                LEFT JOIN karyawan F ON F.nip = E.nip
                                WHERE F.nip = '$id'
                                AND A.status IN (3,4,5,6)
                                ORDER BY A.tanggal DESC");
        return $query->result();
    }


    public function dataapproval($id)
{
    $query = $this->db->query("SELECT A.status, D.nama, A.status, A.id_ticket, A.tanggal, B.nama_sub_kategori, C.nama_kategori 
        FROM ticket A 
        LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori 
        LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
        LEFT JOIN karyawan D ON D.nip = A.reported 
        LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept 
        WHERE E.id_dept = $id AND A.status IN (1, 0) 
        ORDER BY A.tanggal DESC");
    return $query->result();
}

    public function datadepartemen()
    {
        $query = $this->db->query('SELECT * FROM departemen');
        return $query->result();
    }

    public function databagiandepartemen()
    {
        $query = $this->db->query('SELECT * FROM bagian_departemen A LEFT JOIN departemen B ON B.id_dept = A.id_dept ');
        return $query->result();
    }

    public function datakondisi()
    {
        $query = $this->db->query('SELECT * FROM kondisi');
        return $query->result();
    }

    public function databarang()
    {
        $query = $this->db->query('
        SELECT b.id_barang, b.nama_barang, b.stok, j.nama_jenis,
        COALESCE(SUM(bm.jumlah_masuk), 0) AS total_masuk,
        COALESCE(SUM(bk.jumlah_keluar), 0) AS total_keluar
        FROM barang b
        LEFT JOIN jenis j ON j.id_jenis = b.id_jenis
        LEFT JOIN barang_masuk bm ON bm.id_barang = b.id_barang
        LEFT JOIN barang_keluar bk ON bk.id_barang = b.id_barang
        GROUP BY b.id_barang
    ');
        return $query->result();
    }



    public function databarangmasuk()
    {
        $query = $this->db->query('
        SELECT bm.*, b.nama_barang, j.nama_jenis
        FROM barang_masuk bm
        LEFT JOIN barang b ON b.id_barang = bm.id_barang
        LEFT JOIN jenis j ON j.id_jenis = b.id_jenis
    ');
        return $query->result();
    }

    public function databarangkeluar()
    {
        $query = $this->db->query('
        SELECT bk.*, b.nama_barang, j.nama_jenis
        FROM barang_keluar bk
        LEFT JOIN barang b ON b.id_barang = bk.id_barang
        LEFT JOIN jenis j ON j.id_jenis = b.id_jenis
    ');
        return $query->result();
    }
    public function datateknisi()
{
    $query = $this->db->query('SELECT A.point, A.id_teknisi, B.nama, B.jk, C.nama_kategori, A.status, A.point FROM teknisi A 
                                LEFT JOIN karyawan B ON B.nip = A.nip
                                LEFT JOIN kategori C ON C.id_kategori = A.id_kategori
                                ORDER BY A.id_teknisi DESC');  // Add this line to order by id_teknisi in descending order

    return $query->result();
}

    public function datareportteknisi($id)
{
    $query = $this->db->query(
        "SELECT A.progress, A.tanggal_proses, A.status, A.problem_summary, B.nama, D.nama_kategori, F.nama_dept FROM ticket A 
        LEFT JOIN karyawan B ON B.nip = A.reported
        LEFT JOIN sub_kategori C ON C.id_sub_kategori = A.id_sub_kategori
        LEFT JOIN kategori D ON D.id_kategori = C.id_kategori
        LEFT JOIN bagian_departemen E ON E.id_bagian_dept = B.id_bagian_dept
        LEFT JOIN departemen F ON F.id_dept = E.id_dept
        WHERE id_teknisi = '$id'
        ORDER BY A.tanggal_proses DESC"
    );
    return $query->result();
}

public function datauser()
{
    $query = $this->db->query('
        SELECT A.username, A.level, A.id_user, B.nip, B.nama, A.password, C.id_dept, D.nama_dept 
        FROM user A 
        LEFT JOIN karyawan B ON B.nip = A.username 
        LEFT JOIN bagian_departemen C ON C.id_bagian_dept = B.id_bagian_dept 
        LEFT JOIN departemen D ON D.id_dept = C.id_dept
        ORDER BY A.username DESC
    ');

    return $query->result();
}

    public function datakategori()
    {
        $query = $this->db->query('SELECT * FROM kategori');
        return $query->result();
    }

    public function dataassigment($id)
{
    $query = $this->db->query("SELECT A.status, D.nama, C.id_kategori, A.id_ticket, A.tanggal, B.nama_sub_kategori, C.nama_kategori
            FROM ticket A 
            LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
            LEFT JOIN kategori C ON C.id_kategori = B.id_kategori 
            LEFT JOIN karyawan D ON D.nip = A.reported 
            WHERE A.id_teknisi = '$id'
            ORDER BY A.tanggal DESC");
    return $query->result();
}


    public function datasubkategori()
    {
        $query = $this->db->query('SELECT * FROM sub_kategori A LEFT JOIN kategori B ON B.id_kategori = A.id_kategori ');
        return $query->result();
    }


    public function dropdown_departemen()
    {
        $sql = "SELECT * FROM Departemen ORDER BY nama_dept";
        $query = $this->db->query($sql);

        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row) {
            $value[$row->id_dept] = $row->nama_dept;
        }
        return $value;
    }

    public function dropdown_kategori()
    {
        $sql = "SELECT * FROM kategori ORDER BY nama_kategori";
        $query = $this->db->query($sql);

        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row) {
            $value[$row->id_kategori] = $row->nama_kategori;
        }
        return $value;
    }

    public function dropdown_karyawan()
    {
        $sql = "SELECT A.nama, A.nip FROM karyawan A 
                LEFT JOIN bagian_departemen B ON B.id_bagian_dept = A.id_bagian_dept
                LEFT JOIN departemen C ON C.id_dept = b.id_dept 
                ORDER BY nama";
        $query = $this->db->query($sql);

        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row) {
            $value[$row->nip] = $row->nama;
        }
        return $value;
    }

    public function dropdown_jabatan()
    {
        $sql = "SELECT * FROM jabatan ORDER BY nama_jabatan";
        $query = $this->db->query($sql);

        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row) {
            $value[$row->id_jabatan] = $row->nama_jabatan;
        }
        return $value;
    }

    public function dropdown_kondisi()
    {
        $sql = "SELECT * FROM kondisi ORDER BY nama_kondisi";
        $query = $this->db->query($sql);

        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row) {
            $value[$row->id_kondisi] = $row->nama_kondisi . "  -  (TARGET PROSES " . $row->waktu_respon . " " . "HARI)";
        }
        return $value;
    }

    public function dropdown_bagian_departemen($id_departemen)
    {
        $sql = "SELECT * FROM bagian_departemen where id_dept ='$id_departemen' ORDER BY nama_bagian_dept";
        $query = $this->db->query($sql);

        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row) {
            $value[$row->id_bagian_dept] = $row->nama_bagian_dept;
        }
        return $value;
    }

    public function dropdown_sub_kategori($id_kategori)
    {
        $sql = "SELECT * FROM sub_kategori where id_kategori ='$id_kategori' ORDER BY nama_sub_kategori";
        $query = $this->db->query($sql);

        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row) {
            $value[$row->id_sub_kategori] = $row->nama_sub_kategori;
        }
        return $value;
    }

    function dropdown_teknisi($id_kategori)
    {

        $sql = "SELECT A.id_teknisi, B.nama, B.jk, C.nama_kategori, A.status, A.point FROM teknisi A 
                                LEFT JOIN karyawan B ON B.nip = A.nip
                                LEFT JOIN kategori C ON C.id_kategori = A.id_kategori
                                WHERE A.id_kategori ='$id_kategori'";
        $query = $this->db->query($sql);

        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row) {
            $value[$row->id_teknisi] = $row->nama;
        }
        return $value;
    }


    public function dropdown_jk()
    {
        $value[''] = '--PILIH--';
        $value['LAKI-LAKI'] = 'LAKI-LAKI';
        $value['PEREMPUAN'] = 'PEREMPUAN';

        return $value;
    }

    public function dropdown_level()
    {
        $value[''] = '--PILIH--';
        $value['ADMIN'] = 'ADMIN';
        $value['TEKNISI'] = 'TEKNISI';
        $value['CUSTOMER'] = 'CUSTOMER';
        $value['KEPALAUNIT'] = 'KEPALA UNIT';
        $value['KASUBAG'] = 'KASUBAG';
        $value['MANAJEMEN'] = 'MANAJEMEN';

        return $value;
    }
}
