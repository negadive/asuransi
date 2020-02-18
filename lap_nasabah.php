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
<title>Laporan Nasabah</title>
</head>

<body>
<?php
	require 'sidebar.php';
?>
<?php
	require "koneksi.php";
	$laporan = mysqli_query($config, "SELECT `kode_nas`, `identitas`, `nama_nas`, `alamat_nas`, `kota`, `telp`, `pekerjaan` from `nasabah`") or die('Gagal mencari'.mysqli_error($config));
?>
<div class="main" id="main">
<div class="w3-white">
  <button id="openNav" class="w3-button w3-white w3-large" style="position:fixed;" onclick="w3_open()">&#9776;</button>
  <image src="images/Logo.png" style="position: absolute; top:16px; right: 20px;;" width="20%" class="w3-right">
  <div class="w3-container">
    <h1 class="page-header">Laporan Nasabah</h1>
  </div>
</div>
<script>
$(document).ready(function() {
    $('#table_id').DataTable();
} );
</script>

<div class="container-fluid">
<!--div class="container-fluid"-->
<table class="table table-bordered table-hover table-striped">
  <tbody>
    <tr>
      <th scope="col">Kode Nasabah</th>
      <th scope="col">No. Identitas</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Kota</th>
      <th scope="col">Telepon</th>
      <th scope="col">Pekerjaan</th>
    </tr>
    <?php
		while($data = mysqli_fetch_row($laporan)){
    echo"
	<tr>
      <td>$data[0]</td>
      <td>$data[1]</td>
      <td>$data[2]</td>
      <td>$data[3]</td>
      <td>$data[4]</td>
      <td>$data[5]</td>
      <td>$data[6]</td>
    </tr>";
		}
	?>
  </tbody>
</table>
<!--/div-->
</div>
</div>


</body>
</html>