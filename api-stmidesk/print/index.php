<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
error_reporting(0);
ob_start();

$conn = mysqli_connect("localhost", "root", "") or die("koneksi bermasalah");
mysqli_select_db($conn, "perusahaan") or die("database tidak bisa dibuka");

// $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
// echo $uriSegments[4]; 
// die();

// $transaksi = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaki'"));
// $transaksi_detail = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM transaksi_detail WHERE id_transaksi = '$id_transaki'"));
// $company = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM company WHERE id_company = '1'"));
// $lapangan = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM lapangan WHERE id_lapangan = '$transaksi_detail[lapangan_id]'"));

?>

<style>
    #tabless {
        display: block;
        max-width: -moz-fit-content;
        max-width: fit-content;
        border: #ccc 1px solid;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;

        margin: 0 auto;
        overflow-x: auto;
        white-space: nowrap;
    }
</style>

<html>

<head>
    <title>Download</title>
    <link href="assets/report.css" rel="stylesheet" type="text/css">
    <style>
        td,
        th {
            font-size: 6.5pt;
            mso-number-format: "\@";
        }
    </style>
</head>

<body>
<div id="container">
        <!-- Print Body -->
        <div id="body" style="margin-left: -1%;">
            <div style="height: 1px;" class="header" align="left">
                <h4> Laporan Ticket  <br>
                </h4>
            </div>
            <br>
            
            <br>
            <table class="border thick" id="tabless" style="width: 100%;">
                <thead>
                    
                    <tr>
                        <td width="20" style="background-color: #39B54A; color: white; text-align: center;"><br>No</td>
                        <td width="100" style="background-color: #39B54A; color: white; text-align: center;"><br>ID Ticket</td>
                        <td width="70" style="background-color: #39B54A; color: white; text-align: center;"><br>Tanggal Ticket</td>
                        <td width="70" style="background-color: #39B54A; color: white; text-align: center;"><br>Nama Kategori</td>
                        <td width="30" style="background-color: #39B54A; color: white; text-align: center;"><br>Nama Sub Kategor</td>
                        <td width="70" style="background-color: #39B54A; color: white; text-align: center;"><br>Progress</td>
                        <td width="200" style="background-color: #39B54A; color: white; text-align: center;"><br>Status</td>
                        <td width="280" style="background-color: #39B54A; color: white; text-align: center;"><br>Feedback</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $sql = mysqli_query($conn, "SELECT A.progress, A.tanggal_proses, A.tanggal_solved, A.id_teknisi, D.feedback, A.status, A.id_ticket, A.tanggal, A.foto, B.nama_sub_kategori, C.nama_kategori
                                   FROM ticket A 
                                   LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
                                   LEFT JOIN kategori C ON C.id_kategori = B.id_kategori 
                                   LEFT JOIN history_feedback D ON D.id_ticket = A.id_ticket");
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <td align="center"><?= $i++ ?></td>
                            <td align="center"><?php echo $row["id_ticket"]; ?></td>
                            <td><?php echo $row["tanggal"]; ?></td>
                            <td align="center"><?php echo $row["nama_kategori"]; ?></td>
                            <td align="center"><?php echo $row["nama_sub_kategori"]; ?></td>
                            <td align="center">
                            <?php
									// Ubah nilai angka menjadi teks sesuai dengan kondisi yang diinginkan
									if ($row["progress"] == 0) {
										echo 'Pending';
									} elseif ($row["progress"] == 50) {
										echo 'On Progress';
									} elseif ($row["progress"] == 100) {
										echo 'Done';
									} else {
										echo $row["progress"]; // Tampilkan nilai aslinya jika tidak sesuai kondisi di atas
									}
									?>
                            </td>
                            <td align="center">
                            <?php
									if ($row["status"] == 1) {
										echo "MENUNGGU DISETUJUI KEPALA UNIT";
									} elseif ($row["status"] == 2) {
										echo "DISETUJUI KEPALA UNIT";
									} elseif ($row["status"] == 0) {
										echo "TICKET DITOLAK";
									} elseif ($row["status"] == 3) {
										echo "MENUNGGU APRROVAL KASUBAG";
									} elseif ($row["status"] == 4) {
										echo "SEDANG MENENTUKAN TEKNISI";
									} elseif ($row["status"] == 5) {
										echo "DIKERJAKAN TEKNISI";
									} elseif ($row["status"] == 6) {
										echo "SOLVED";
									}
									?>
                            </td>
                            <td align="center">
                            <?php if ($row["status"] == 6 and $row["feedback"] == "") { ?>
										
									<?php } else if ($row["status"] == 6 and  $row["feedback"] == 1) {
										echo "ANDA MEMBERIKAN FEEDBACK POSITIF";
									} else if ($row["status"] == 6 and $row["feedback"] == 0) {
										echo "ANDA MEMBERIKAN FEEDBACK NEGATIF";
									} else if ($row["status"] == 2) {
										echo "MENUNGGU PERSETUJUAN KASUBAG";
									} else if ($row["status"] == 3) {
										echo "SEDANG DIPROSES TEKNISI";
									} else if ($row["status"] == 4) {
										echo "SEDANG DIKERJAKAN TEKNISI";
									} else if ($row["status"] == 5) {
										echo "SEDANG DIKERJAKAN TEKNISI";
									} else if ($row["status"] == 1) {
										echo "SEDANG DIAJUKAN KEPADA KEPALA UNIT SETEMPAT";
									} else {
										echo "TIKET DITOLAK";
									}
									?>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>

</body>

</html>

<?php


//cetak pdf
$content = ob_get_clean();
require 'assets/html2pdf/autoload.php';
$pdf = new Spipu\Html2Pdf\Html2Pdf('L', 'A4', 'en');
// $bootstrap = file_get_contents('./assets/report.css');
// $pdf->WriteHTML($bootstrap, 1);
$pdf->WriteHTML($content, 2);
$pdf->Output("Data.pdf", 'I');
?>