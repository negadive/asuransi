<!doctype html>
<html>
<head>
<!--link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"-->
<link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<meta charset="utf-8">
<title>Untitled Document</title>

</head>

<body style="padding-top: 70px">
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topFixedNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="#">Brand</a></div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="topFixedNavbar1">
      <ul class="nav navbar-nav">
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Master<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="home_agen.php">Agen</a></li>
            <li class="divider"></li>
            <li><a href="home_nasabah.php" >Data Nasabah</a></li>
            <li><a href="home_rumah.php">Data Rumah</a></li>
            <li><a href="home_lokasi.php">Lokasi</a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Transaksi<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="home_penjualan_polis.php">Penjualan Polis</a></li>
            <li class="divider"></li>
            <li><a href="home_pembayaran_polis.php">Pembayaran Polis</a></li>
            <li><a href="home_klaim_polis.php">Klaim Polis</a></li>
          </ul>
        </li>
        <li class="dropdown active"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Laporan<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="lap_nasabah.php">Laporan Nasabah</a></li>
            <li><a href="lap_rumah.php">Laporan Rumah</a></li>
            <li class="divider"></li>
            <li><a href="lap_penjualan.php">Laporan Penjualan</a></li>
            <li><a href="lap_pembayaran.php">Laporan Pembayaran</a></li>
            <li><a href="lap_klaim.php">Laporan Klaim</a></li>
          </ul>
        </li>
      </ul>
  
      
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
<?php
	require "koneksi.php";
	$laporan = mysqli_query($config, "SELECT `KodeLokasi`, `Lokasi`, `Tipe`, `Kelas`, `KodePos`, `HargaIsiB`, `HargaB`, `Kota`, `Kelurahan`, `Kecamatan` from `rumah`") or die('Gagal mencari'.mysqli_error($config));
?>
<div class="container-fluid">
<div class="row">
    <div class="col-sm-2">
      <img src="images/Logo.png" class="img-responsive" alt=""/> </div>
    <div class="col-sm-10">
    <center>
    <h1>PT. Asuransi Central Asia</h1>
    <h3>Perlindungan Kami adalah Kenyamanan Anda</h3>
    <h2>Laporan Data Rumah</h2></center>
    </div>
</div> 
<table class="table table-bordered table-hover table-striped">
  <tbody>
    <tr>
      <th scope="col">Kode Lokasi</th>
      <th scope="col">Lokasi Rumah</th>
      <th scope="col"><center>Tipe Rumah</center></th>
      <th scope="col" width="5%"><center>Kelas Konstruksi</center></th>
      <th scope="col"><center>Kode Pos</center></th>
      <th scope="col"><center>HargaIsiB</center></th>
      <th scope="col"><center>HargaB</center></th>
      <th scope="col">Kota</th>
      <th scope="col">Kelurahan</th>
      <th scope="col">Kecamatan</th>
    </tr>
    <?php
		while($data = mysqli_fetch_row($laporan)){
    echo"
	<tr>
      <td>$data[0]</td>
      <td>$data[1]</td>
      <td><center>$data[2]</center></td>
      <td><center>$data[3]</center></td>
      <td><center>$data[4]</center></td>
      <td align='right'>$data[5]</td>
      <td align='right'>$data[6]</td>
      <td>$data[7]</td>
      <td>$data[8]</td>
      <td>$data[9]</td>
    </tr>";
		}
	?>
  </tbody>
</table>
<!--/div-->
</div>


</body>
</html>