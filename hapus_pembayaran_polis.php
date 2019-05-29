<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	include "koneksi.php";
	
	$noBay = $_GET['bay'];
	$noPol = $_GET['pol'];
	
	$simpan = mysqli_query($config,
		"DELETE FROM `bayar` WHERE `NomorBayar` = '$noBay' and 
									`NomorPolis` = '$noPol'")
			or die ('Gagal merubah data'.mysqli_error($config));
	header('Location: home_pembayaran_polis.php');
?>
</body>
</html>