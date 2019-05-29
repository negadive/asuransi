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
		"DELETE FROM `polis` WHERE `NomorPolis` = '$kd'")
			or die ('Gagal merubah data'.mysqli_error($config));
	header('Location: home_penjualan_polis.php');
?>
</body>
</html>