<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	include "koneksi.php";
	
	$kd_agen = $_GET['kode'];
	
	$simpan = mysqli_query($config,
		"DELETE FROM `agen` WHERE `KodeAgen` = '$kd_agen'")
			or die ('Gagal merubah data'.mysqli_error($config));
	header('Location: home_agen.php');
?>
</body>
</html>