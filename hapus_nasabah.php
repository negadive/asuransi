<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	include "koneksi.php";
	
	$kd = $_GET['id'];
	
	$simpan = mysqli_query($config,
		"DELETE FROM `nasabah` WHERE `kode_nas` = '$kd'")
			or die ('Gagal merubah data'.mysqli_error($config));
	if($simpan){
		header('Location: home_nasabah.php');
	}else{
		header('Location: inasabah.php?id=$kd.php');
	}
?>
</body>
</html>