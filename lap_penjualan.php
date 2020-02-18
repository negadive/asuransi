<!doctype html>
<html>
<head>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="css/w3.css">
<link rel="stylesheet" type="text/css" href="css/all.css">


<script src="js/bootstrap.min.js"></script>
<script src="js/w3.js"></script>
<meta charset="utf-8">
<title>Laporan Penjualan Polis</title>

</head>

<body>
<?php
	require 'sidebar.php';
?>
<div class="main" id="main">
<div class="w3-white">
  <button id="openNav" class="w3-button w3-white w3-large" style="position:fixed;" onclick="w3_open()">&#9776;</button>
  <image src="images/Logo.png" style="position: absolute; top:16px; right: 20px;;" width="20%" class="w3-right">
  <div class="w3-container">
    <h1 class="page-header">Laporan Penjualan Polis</h1>
  </div>
</div>
<script>
$(document).ready(function() {
    $('#table_id').DataTable();
} );
</script>
<div class="container-fluid">
<table class="table table-bordered table-hover table-striped">
  <tbody>
    <tr>
      <th scope="col">Nomor Polis</th>
      <th scope="col"><center>Tanggal Polis</center></th>
      <th scope="col"><center>Tanggal J Tempo</center></th>
      <th scope="col">Nama Nasabah</th>
      <th scope="col"><center>Total Tanggungan</center></th>
      <th scope="col"><center>Total</center></th>
      <th scope="col">Bayar</th>
    </tr>
    <?php
		require "koneksi.php";
		$laporan = mysqli_query($config, "SELECT p.no_pol,  p.tanggal, p.akhir, n.nama_nas, p.tot_tang,  p.total FROM polis p JOIN nasabah n ON p.kd_nas = n.kode_nas") or die('Gagal mencari'.mysqli_error($config));
		$sum = mysqli_fetch_row( mysqli_query($config, "SELECT SUM(p.total) FROM polis p JOIN nasabah n ON p.kd_nas = n.kode_nas") );
		
		while($data = mysqli_fetch_row($laporan)){
    echo"
	<tr>
      <td>$data[0]</td>
      <td><center>".date('d F Y',strtotime($data[1]))."</center></td>
      <td><center>".date('d F Y',strtotime($data[2]))."</center></td>
      <td>$data[3]</td>
      <td>$data[4]</td>
      <td align='right'>$data[5]</td>
      <td>";
	$bayar = mysqli_query($config, "SELECT bayar.no_pol FROM bayar WHERE no_pol ='$data[0]'") or die('Gagal mencari'.mysqli_error($config));
	if(mysqli_fetch_row($bayar) > 1){
		echo "Sudah";
	}else{
		echo "Belum";
	}
	
	echo "</td>
    </tr>";
		}
	echo "
	<tr>
		<td colspan='5' align='right'><b>Total</b></td>
		<td align='right'>$sum[0]</td>
		<td>";
	?>
	</td>
	<tr>
  </tbody>
</table>
<!--/div-->
</div>


</body>
</html>