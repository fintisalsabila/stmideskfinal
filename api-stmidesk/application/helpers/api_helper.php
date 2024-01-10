<?php
function tgl_indo($tgl, $replace_with = '-')
{
	if (date_is_empty($tgl)) {
		return $replace_with;
	}
	$tanggal = substr($tgl, 8, 2);
	$bulan = getBulan(substr($tgl, 5, 2));
	$tahun = substr($tgl, 0, 4);
	// return $tanggal . ' ' . $bulan . ' ' . $tahun;
	return $tanggal . ' ' . $bulan;
}
function tgl_indo2($tgl, $replace_with = '-')
{
	if (date_is_empty($tgl)) {
		return $replace_with;
	}
	$tanggal = substr($tgl, 8, 2);
	$jam = substr($tgl, 11, 8);
	$bulan = getBulan(substr($tgl, 5, 2));
	$tahun = substr($tgl, 0, 4);
	return $tanggal . ' ' . $bulan . ' ' . $tahun . ' ' . $jam;
}
function tgl_indo_in($tgl, $replace_with = '-')
{
	if (date_is_empty($tgl)) {
		return $replace_with;
	}
	$tanggal = substr($tgl, 0, 2);
	$bulan = substr($tgl, 3, 2);
	$tahun = substr($tgl, 6, 4);
	$jam = substr($tgl, 11);
	$jam = empty($jam) ? '' : ' ' . $jam;
	return $tahun . '-' . $bulan . '-' . $tanggal . $jam;
}

function date_is_empty($tgl)
{
	return (is_null($tgl) || substr($tgl, 0, 10) == '0000-00-00');
}

function getBulan($bln)
{
	switch ($bln) {
		case 1:
			return "Jan";
			break;
		case 2:
			return "Feb";
			break;
		case 3:
			return "Mar";
			break;
		case 4:
			return "Apr";
			break;
		case 5:
			return "Mei";
			break;
		case 6:
			return "Jun";
			break;
		case 7:
			return "Jul";
			break;
		case 8:
			return "Ags";
			break;
		case 9:
			return "Sep";
			break;
		case 10:
			return "Okt";
			break;
		case 11:
			return "Nov";
			break;
		case 12:
			return "Des";
			break;
	}
}

function getHari($tgl)
{
	$daftar_hari = array(
		'Sunday' => 'Minggu',
		'Monday' => 'Senin',
		'Tuesday' => 'Selasa',
		'Wednesday' => 'Rabu',
		'Thursday' => 'Kamis',
		'Friday' => 'Jumat',
		'Saturday' => 'Sabtu'
	);
	$namahari = date('l', strtotime($tgl));
	return $daftar_hari[$namahari];
}

function getStatus($status)
{
	if ($status == 1) {
		$st = "MENUNGGU DISETUJUI KEPALA UNIT";
	} elseif ($status == 2) {
		$st = "DISETUJUI KEPALA UNIT";
	} elseif ($status == 0) {
		$st = "TICKET DITOLAK";
	} elseif ($status == 3) {
		$st = "MENUNGGU APRROVAL KASUBAG";
	} elseif ($status == 4) {
		$st = "SEDANG MENENTUKAN TEKNISI";
	} elseif ($status == 5) {
		$st = "DIKERJAKAN TEKNISI";
	} elseif ($status == 6) {
		$st = "SOLVED";
	}

	return $st;
}

function getFeedback($status = "", $feedback = "") {
	if ($status == 6 &&  $feedback == 1) {
		$st = "ANDA MEMBERIKAN FEEDBACK POSITIF";
	} else if ($status == 6 && $feedback == 0) {
		$st = "ANDA MEMBERIKAN FEEDBACK NEGATIF";
	} else if ($status == 2) {
		$st = "MENUNGGU PERSETUJUAN KASUBAG";
	} else if ($status == 3) {
		$st = "SEDANG DIPROSES TEKNISI";
	} else if ($status == 4) {
		$st = "SEDANG DIKERJAKAN TEKNISI";
	} else if ($status == 5) {
		$st = "SEDANG DIKERJAKAN TEKNISI";
	} else if ($status == 1) {
		$st = "SEDANG DIAJUKAN KEPADA KEPALA UNIT SETEMPAT";
	} else {
		$st = "TIKET DITOLAK";
	}

	return $st;
}

function getProgress($progress) {
	if ($progress == 0) {
		$st = 'Pending';
	} elseif ($progress == 50) {
		$st = 'On Progress';
	} elseif ($progress == 100) {
		$st = 'Done';
	} else {
		$st = $progress; // Tampilkan nilai aslinya jika tidak sesuai kondisi di atas
	}

	return $st;
}

function timeAgo($time_ago)
{
	$time_ago = strtotime($time_ago);
	$cur_time   = time();
	$time_elapsed   = $cur_time - $time_ago;
	$seconds    = $time_elapsed;
	$minutes    = round($time_elapsed / 60);
	$hours      = round($time_elapsed / 3600);
	$days       = round($time_elapsed / 86400);
	$weeks      = round($time_elapsed / 604800);
	$months     = round($time_elapsed / 2600640);
	$years      = round($time_elapsed / 31207680);
	// Seconds
	if ($seconds <= 60) {
		return "Baru Saja";
	}
	//Minutes
	else if ($minutes <= 60) {
		if ($minutes == 1) {
			return "1 menit yang lalu";
		} else {
			return "$minutes menit yang lalu";
		}
	}
	//Hours
	else if ($hours <= 24) {
		if ($hours == 1) {
			return "1 jam yang lalu";
		} else {
			return "$hours jam yang lalu";
		}
	}
	//Days
	else if ($days <= 7) {
		if ($days == 1) {
			return "kemarin";
		} else {
			return "$days hari yang lalu";
		}
	}
	//Weeks
	else if ($weeks <= 4.3) {
		if ($weeks == 1) {
			return "1 minggu yang lalu";
		} else {
			return "$weeks minggu yang lalu";
		}
	}
	//Months
	else if ($months <= 12) {
		if ($months == 1) {
			return "1 bulan yang lalu";
		} else {
			return "$months bulan yang lalu";
		}
	}
	//Years
	else {
		if ($years == 1) {
			return "1 tahun yang lalu";
		} else {
			return "$years yang lalu";
		}
	}
}

function getRupiah($harga = 0)
{
	if ($harga != null) {
		return "Rp " . number_format($harga, 0, ",", ".");
	} else {
		return "Rp 0";
	}
}
