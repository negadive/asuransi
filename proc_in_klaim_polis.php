<?php
	include "koneksi.php";
	
	$no_klaim = $_POST['no_klaim'];
	$no_polis = $_POST['no_pol'];
	$tgl_kejadian = date('Y-m-d');
	$total_klaim = $_POST['total_klaim'];
	$terbilang = $_POST['terbilang'];
	
	
	$bayar = mysqli_query($config,
		'INSERT INTO `klaim` VALUES ("'.$no_klaim.'", "'.$no_polis.'", "'.$tgl_kejadian.'",
									 "'.$total_klaim.'", "'.$terbilang.'")')
			or die ('gagal memasukkan data'.mysqli_error($config));
	
	header('Location: input_klaim_polis.php');
?>