<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	include "koneksi.php";
	
	$kd_nsbh = $_POST['kd_nsbh'];
	$nm_nsbh = $_POST['nm_nsbh'];
	$alm_nsbh = $_POST['alm_nsbh'];
	$jk_nsbh = $_POST['jk_nsbh'];
	$kota_nsbh = $_POST['kota_nsbh'];
	$klr_nsbh = $_POST['klr_nsbh'];
	$tlp_nsbh = $_POST['tlp_nsbh'];
	$rt_nsbh = $_POST['rt_nsbh'];
	$rw_nsbh = $_POST['rw_nsbh'];
	$kcm_nsbh = $_POST['kcm_nsbh'];
	$kdp_nsbh = $_POST['kdp_nsbh'];
	$hp_nsbh = $_POST['hp_nsbh'];
	$tl_nsbh = $_POST['tl_nsbh'];
	$tml_nsbh = $_POST['tml_nsbh'];
	$ku_nsbh = $_POST['ku_nsbh'];
	$almku_nsbh = $_POST['almku_nsbh'];
	$jbt_nsbh = $_POST['jbt_nsbh'];
	$ppb_nsbh = $_POST['ppb_nsbh'];
	$npwp_nsbh = $_POST['npwp_nsbh'];
	$ni_nsbh = $_POST['ni_nsbh'];
	
	$simpan = mysqli_query($config,
		'INSERT INTO `nasabah` VALUES ("'.$kd_nsbh.'", "'.$nm_nsbh.'", "'.$alm_nsbh.'",
									 "'.$kota_nsbh.'", "'.$kdp_nsbh.'", "'.$tlp_nsbh.'", 
									 "'.$hp_nsbh.'", "'.$tl_nsbh.'", "'.$tml_nsbh.'", "'.$jk_nsbh.'",
									 "'.$ku_nsbh.'", "'.$almku_nsbh.'","'.$jbt_nsbh.'","'.$ppb_nsbh.'",
									 "'.$npwp_nsbh.'","'.$ni_nsbh.'",
									 "'.$klr_nsbh.'", "'.$kcm_nsbh.'", "'.$rt_nsbh.'", 
									 "'.$rw_nsbh.'")')
			or die ('gagal terkoneksi'.mysqli_error($config));
	header('Location: input_nasabah.php');
?>
</body>
</html>