<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	include "koneksi.php";
	
	$noKlm = $_GET['klm'];
	$noPol = $_GET['pol'];
	
	$simpan = mysqli_query($config,
		"DELETE FROM `klaim` WHERE `NomorKlaim` = '$noKlm' and 
									`NomorPolis` = '$noPol'")
			or die ('Gagal merubah data'.mysqli_error($config));
	header('Location: home_klaim_polis.php');
?>
</body>
</html>