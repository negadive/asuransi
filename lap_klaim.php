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
<title>Laporan Pembayaran Polis</title>

</head>

<body>
<?php
	require 'sidebar.php';
?>
<?php
?>
<div class="main" id="main">
<div class="w3-white">
  <button id="openNav" class="w3-button w3-white w3-large" style="position:fixed;" onclick="w3_open()">&#9776;</button>
  <image src="images/Logo.png" style="position: absolute; top:16px; right: 20px;;" width="20%" class="w3-right">
  <div class="w3-container">
    <h1 class="page-header">Laporan Pembayaran Polis</h1>
  </div>
</div>
<div class="container-fluid">
<!--div class="container-fluid"-->
<table class="table table-bordered table-hover table-striped">
  <tbody>
    <tr>
      <th scope="col">NomorKlaim</th>
      <th scope="col">NomorPolis</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Nama</th>
      <th scope="col">Tanggal Klaim</th>
      <th scope="col">Total</th>
    </tr>
    <?php	
	require "koneksi.php";
	$laporan = mysqli_query($config, "SELECT k.no_kla, p.no_pol,  p.tanggal, n.nama_nas, k.tanggal as tanggal_k, k.total FROM klaim k JOIN polis p ON k.no_pol = p.no_pol JOIN nasabah n ON p.kd_nas = n.kode_nas") or die('Gagal mencari'.mysqli_error($config));
	$sum = mysqli_fetch_row(mysqli_query($config, "SELECT SUM(k.total) FROM klaim k JOIN polis p ON k.no_pol = p.no_pol JOIN nasabah n ON p.kd_nas = n.kode_nas"));
		while($data = mysqli_fetch_row($laporan)){
    echo"
	<tr>
      <td>$data[0]</td>
      <td>$data[1]</td>
      <td>".date('d F Y',strtotime($data[2]))."</td>
      <td>$data[3]</td>
      <td>".date('d F Y',strtotime($data[4]))."</td>
      <td align='right'>$data[5]</td>
    </tr>";
		}
	echo "
	<tr>
		<td colspan='5' align='right'><b>Total</b></td>
		<td align='right'>$sum[0]</td>
	<tr>";
	?>
  </tbody>
</table>
<!--/div-->
</div>


</body>
</html>