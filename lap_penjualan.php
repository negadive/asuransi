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
	$laporan = mysqli_query($config, "SELECT p.NomorPolis,  p.Tanggal, p.Akhir, n.Nama, r.Lokasi, p.TotalBangunan, p.TotalIsi,  p.TotalBangunan+p.TotalIsi FROM polis p JOIN nasabah n ON p.KodeNasabah = n.KodeNasabah JOIN rumah r ON p.KodeLokasi = r.KodeLokasi") or die('Gagal mencari'.mysqli_error($config));
?>
<div class="container-fluid">
<div class="row">
    <div class="col-sm-2">
      <img src="images/Logo.png" class="img-responsive" alt=""/> </div>
    <div class="col-sm-10">
    <center>
    <h1>PT. Asuransi Central Asia</h1>
    <h3>Perlindungan Kami adalah Kenyamanan Anda</h3>
    <h2>Laporan Klaim Polis</h2></center>
    </div>
</div> 
<table class="table table-bordered table-hover table-striped">
  <tbody>
    <tr>
      <th scope="col">Nomor Polis</th>
      <th scope="col"><center>Tanggal Polis</center></th>
      <th scope="col"><center>Tanggal J Tempo</center></th>
      <th scope="col">Nama Nasabah</th>
      <th scope="col">Lokasi Rumah</th>
      <th scope="col"><center>Tanggungan Bangunan</center></th>
      <th scope="col"><center>Tanggungan Isi Rumah</center></th>
      <th scope="col"><center>Total</center></th>
      <th scope="col">Bayar</th>
    </tr>
    <?php
		while($data = mysqli_fetch_row($laporan)){
    echo"
	<tr>
      <td>$data[0]</td>
      <td><center>".date('d F Y',strtotime($data[1]))."</center></td>
      <td><center>".date('d F Y',strtotime($data[2]))."</center></td>
      <td>$data[3]</td>
      <td>$data[4]</td>
      <td align='right'>$data[5]</td>
      <td align='right'>$data[6]</td>
      <td align='right'>$data[7]</td>
      <td></td>
    </tr>";
		}
	echo "
	<tr>
		<td colspan='7' align='right'><b>Total</b></td>";
		$laporan = mysqli_query($config, "SELECT SUM(p.TotalBangunan+p.TotalIsi) FROM polis p JOIN nasabah n ON p.KodeNasabah = n.KodeNasabah JOIN rumah r ON p.KodeLokasi = r.KodeLokasi") or die('Gagal mencari'.mysqli_error($config));
		$data2 = mysqli_fetch_row($laporan);
	echo "
		<td align='right'>$data2[0]</td>
		<td></td>
	<tr>";
	?>
  </tbody>
</table>
<!--/div-->
</div>


</body>
</html>