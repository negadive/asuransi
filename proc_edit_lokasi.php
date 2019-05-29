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
	
	$simpan = mysqli_query($config,
		"UPDATE `lokasi` SET	`Kelurahan` = '$klrhn',
								`Kecamatan` = '$kcmtn',
								`Kota` = '$kota' WHERE `KodePos` = '$kode_pos'")
			or die ('gagal terkoneksi'.mysqli_error($config));
	header('Location: home_lokasi.php');
?>
</body>
</html>