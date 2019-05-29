<?php 
$servername = "localhost";
$user		= "root";
$pasword	= "";
$db			= "asuransi";

$config = mysqli_connect ($servername,$user, $pasword,$db )
			or die ('gagal terkoneksi'.mysqli_error($config));
			
//$database = mysqli_select_db ()
//			or die ('gagal terhubung ke database'.mysql_error());
?>