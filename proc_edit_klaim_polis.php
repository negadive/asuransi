<?php
	include "koneksi.php";
	
	$no_klaim = $_POST['no_klaim'];
	$no_polis = $_POST['no_pol'];
	$tgl_kejadian = date('Y-m-d');
	$total_klaim = $_POST['total_klaim'];
	$terbilang = $_POST['terbilang'];
	
	
	$bayar = mysqli_query($config,
		'UPDATE `klaim` SET `NomorPolis` = "'.$no_polis.'", 
							`Total` = "'.$total_klaim.'", 
							`Terbilang` = "'.$terbilang.'"
						WHERE `NomorKlaim` = "'.$no_klaim.'" and `NomorPolis` = "'.$no_polis.'"')
			or die ('gagal memasukkan data'.mysqli_error($config));
	
	header('Location: home_klaim_polis.php');
?>