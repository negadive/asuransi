<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	include "koneksi.php";
	
	$kd = $_GET['kode'];
	
	$simpan = mysqli_query($config,
		"DELETE FROM `nasabah` WHERE `KodeNasabah` = '$kd'")
			or die ('Gagal merubah data'.mysqli_error($config));
	header('Location: home_nasabah.php');
?>
</body>
</html>