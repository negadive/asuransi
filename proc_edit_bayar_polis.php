<?php
	include "koneksi.php";
	
	$no_kwit = $_POST['no_kwit'];
	$no_polis = $_POST['no_pol'];
	//$tgl_bayar = date('Y-m-d');
	$total_bayar = $_POST['total_bayar'];
	$terbilang = $_POST['terbilang'];
	
	
	$bayar = mysqli_query($config,
		'UPDATE `bayar` SET `Total` = "'.$total_bayar.'", 
							`Terbilang` = "'.$terbilang.'"
						WHERE `NomorBayar`="'.$no_kwit.'" and `NomorPolis`="'.$no_polis.'"')
			or die ('gagal memasukkan data'.mysqli_error($config));
	
	header('Location: home_pembayaran_polis.php');
?>