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
		'INSERT INTO `lokasi` VALUES ("'.$kode_pos.'", "'.$klrhn.'", "'.$kcmtn.'",
									 "'.$kota.'")')
			or die ('gagal terkoneksi'.mysqli_error($config));
	header('Location: input_lokasi.php');
?>
</body>
</html>