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
<title>Nasabah</title>
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
    <h1 class="page-header">Nasabah</h1>
  </div>
</div>
<script>
$(document).ready(function() {
    $('#table_id').DataTable();
} );
</script>
<div class="container">
<a class="btn btn-primary row" href="input_nasabah.php">Tambah</a>
<table id="table_id" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Telp.</th>
        </tr>
    </thead>
    <tbody>
		<?php
			require "koneksi.php";
			$laporan = mysqli_query($config, "SELECT `kode_nas`, `nama_nas`, `alamat_nas`, `telp` from `nasabah`") or die('Gagal mencari'.mysqli_error($config));
			
			while($data = mysqli_fetch_row($laporan)){
				echo"
				<tr>
				
				  <td><a href='inasabah.php?id=$data[0]'>$data[0]</a></td>
				  <td>$data[1]</td>
				  <td>$data[2]</td>
				  <td>$data[3]</td>
				 
				</tr>";
			}
		?>
    </tbody>
</table>
</div>
</div>


</body>
</html>