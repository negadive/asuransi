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
		"UPDATE `nasabah` SET	`KodeNasabah` = '".$kd_nsbh."', 
								`Nama` = '".$nm_nsbh."', 
								`Alamat` = '".$alm_nsbh."',
								`Kota` = '".$kota_nsbh."', 
								`KodePos` = '".$kdp_nsbh."', 
								`Telepon` = '".$tlp_nsbh."', 
								`HP` = '".$hp_nsbh."', 
								`Tanggal` = '".$tl_nsbh."', 
								`Tempat` = '".$tml_nsbh."', 
								`Jenis` = '".$jk_nsbh."',
								`Kantor` = '".$ku_nsbh."', 
								`Alamat1` = '".$almku_nsbh."',
								`Jabatan` = '".$jbt_nsbh."',
								`Pendapatan` = '".$ppb_nsbh."',
								`NPWP` = '".$npwp_nsbh."',
								`Identitas` = '".$ni_nsbh."',
								`Kelurahan` = '".$klr_nsbh."', 
								`Kecamatan` = '".$kcm_nsbh."', 
								`RT` = '".$rt_nsbh."', 
								`RW` = '".$rw_nsbh."' WHERE `KodeNasabah` = '".$kd_nsbh."'")
			or die ('gagal terkoneksi'.mysqli_error($config));
	header('Location: home_nasabah.php');
	
?>
</body>
</html>