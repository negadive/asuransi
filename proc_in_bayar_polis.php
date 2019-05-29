<?php
	include "koneksi.php";
	
	$no_kwit = $_POST['no_kwit'];
	$no_polis = $_POST['no_pol'];
	$tgl_bayar = date('Y-m-d');
	$total_bayar = $_POST['total_bayar'];
	$terbilang = $_POST['terbilang'];
	
	
	$bayar = mysqli_query($config,
		'INSERT INTO `bayar` VALUES ("'.$no_kwit.'", "'.$no_polis.'", "'.$tgl_bayar.'",
									 "'.$total_bayar.'", "'.$terbilang.'")')
			or die ('gagal memasukkan data'.mysqli_error($config));
	
	header('Location: input_pembayaran_polis.php');
?>