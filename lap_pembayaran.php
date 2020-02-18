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
<table class="table table-bordered table-hover table-striped">
  <tbody>
    <tr>
      <th scope="col">Nomor Bayar</th>
      <th scope="col">Nomor Polis</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Nama Nasabah</th>
      <th scope="col">Tanggal Bayar</th>
      <th scope="col">Jumlah</th>
    </tr>
    <?php
		require "koneksi.php";
		$laporan = mysqli_query($config, "SELECT b.no_bay, b.no_pol, p.tanggal, n.nama_nas, b.tanggal, b.total FROM bayar b JOIN polis p ON b.no_pol = p.no_pol JOIN nasabah n ON p.kd_nas = n.kode_nas") or die('Gagal mencari'.mysqli_error($config));

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
		<td colspan='5' align='right'><b>Total</b></td>";
		$data2 = mysqli_fetch_row(mysqli_query($config, "SELECT SUM(b.total) FROM bayar b JOIN polis p ON b.no_pol = p.no_pol JOIN nasabah n ON p.kd_nas = n.kode_nas "));
	echo "
		<td align='right'>$data2[0]</td>
	<tr>";
	?>
  </tbody>
</table>
</div>
</div>


</body>
</html>