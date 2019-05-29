<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	include "koneksi.php";
	
	$no_kwit = $_POST['no_kwit'];
	$no_polis = $_POST['no_pol'];
	$tgl_pol = $_POST['tgl_pol'];
	$kd_agen = $_POST['kd_agen'];
	$per_pola = $_POST['per_pola'];
	$per_polb = $_POST['per_polb'];
	
	$kd_nsbh = $_POST['kd_nsbh'];
	
	$kd_lok = $_POST['kd_lok'];
	
	$bang = $_POST['ats_bang'];
	$isi_bang = $_POST['ats_ibang'];
	$tot_bang = $_POST['tot_bang'];
	$tot_ibang = $_POST['tot_ibang'];
	$bpolis = $_POST['b_polis'];
	$bmaterai = $_POST['b_materai'];
	$total_tang = $tot_bang + $totibang;
	$terbilang = "";//$_POST['terbilang'];
	
	$no_reg = "";//$_POST['no_reg'];
	
	$tambahan = $_POST['tambahan'];
	
	
	$polis = mysqli_query($config,
		"UPDATE `polis` SET	`Tanggal` = '".$tgl_pol."',
							`NomorRegis` = '".$no_reg."',
							`Awal` = '".$per_pola."',
							`Akhir` = '".$per_polb."',
							`KodeNasabah` = '".$kd_nsbh."',
							`KodeLokasi` = '".$kd_lok."',
							`Bangunan` = '".$bang."',
							`Isi` = '".$isi_bang."',
							`TotalBangunan` = '".$tot_bang."',
							`TotalIsi` = '".$tot_ibang."',
							`Total` = '".$total_tang."',
							`Terbilang` = '".$terbilang."',
							`Tambahan` = '".$tambahan."',
							`KodeAgen` = '".$kd_agen."',
							`BPolis` = '".$bpolis."',
							`BMaterai` = '".$bmaterai."' WHERE `NomorPolis`='".$no_polis."'")
			or die ('gagal mengedit'.mysqli_error($config));
	header('Location: home_penjualan_polis.php');
?>
</body>
</html>