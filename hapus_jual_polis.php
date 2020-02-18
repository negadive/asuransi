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
		"DELETE FROM `polis` WHERE `no_reg` = '$kd'")
			or die ('Gagal merubah data'.mysqli_error($config));
	header('Location: home_jual_polis.php');
?>
</body>
</html>