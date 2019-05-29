<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	include "koneksi.php";
	
	$kd_agen = $_POST['kd_agen'];
	$nm_agen = $_POST['nm_agen'];
	$alm_agen = $_POST['alm_agen'];
	$jk_agen = $_POST['jk_agen'];
	$kota_agen = $_POST['kota_agen'];
	$klr_agen = $_POST['klr_agen'];
	$tlp_agen = $_POST['tlp_agen'];
	$rt_agen = $_POST['rt_agen'];
	$rw_agen = $_POST['rw_agen'];
	$kcm_agen = $_POST['kcm_agen'];
	$kdp_agen = $_POST['kdp_agen'];
	$hp_agen = $_POST['hp_agen'];
	$tl_agen = $_POST['tl_agen'];
	$tml_agen = $_POST['tml_agen'];
	
	$simpan = mysqli_query($config,
		'INSERT INTO `agen` VALUES ("'.$kd_agen.'", "'.$nm_agen.'", "'.$alm_agen.'",
									 "'.$kota_agen.'", "'.$kdp_agen.'", "'.$tlp_agen.'", 
									 "'.$hp_agen.'", "'.$tl_agen.'", "'.$tml_agen.'", "'.$jk_agen.'",
									 "'.$klr_agen.'", "'.$kcm_agen.'", "'.$rt_agen.'", 
									 "'.$rw_agen.'")')
			or die ('gagal terkoneksi'.mysqli_error($config));
	header('Location: input_agen.php');
?>
</body>
</html>