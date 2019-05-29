<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	include "koneksi.php";
	
	$kode_pos = $_POST['kode_pos'];
	$klrhn = $_POST['klrhn'];
	$kcmtn = $_POST['kcmtn'];
	$kota = $_POST['kota'];
	$kd_lok = $_POST['kd_lok'];
	$lok_rumah = $_POST['lok_rumah'];
	$tp_rumah = $_POST['tp_rumah'];
	$hrg_bang = $_POST['hrg_bang'];
	$hrg_ibang = $_POST['hrg_ibang'];
	$kelas_kons = $_POST['kls_kons'];

	
	$simpan = mysqli_query($config,
		"UPDATE `rumah` SET `Lokasi` = '$lok_rumah', 
							`Tipe` = '$tp_rumah',
							`Kelas` = '$kelas_kons', 
							`Kota` = '$kota',
							`Kelurahan` = '$klrhn',
							`Kecamatan` = '$kcmtn',
							`KodePos` = '$kode_pos',
							`HargaB` = '$hrg_bang', 
							`HargaIsiB` = '$hrg_ibang' WHERE `KodeLokasi` = '$kd_lok'")
			or die ('gagal terkoneksi'.mysqli_error($config));
	header('Location: home_rumah.php');
?>
</body>
</html>