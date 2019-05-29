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
        <li class="dropdown active"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Master<span class="caret"></span></a>
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
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Laporan<span class="caret"></span></a>
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
<center><h1>Input Data Nasabah</h1></center>
<div>
    <div class="container">
        <form class="form-horizontal" id="in_nasabah" name="in_nasabah" method="post" action="proc_in_nasabah.php">
            <div class="form-group">
                <label class="control-label col-sm-3">Kode Nasabah</label>
                <div class="col-sm-2">
                <input type="text" class="form-control" name="kd_nsbh">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Nama</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="nm_nsbh">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Alamat</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="alm_nsbh">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Jenis Kelamin</label>
                <div class="col-sm-2">
                  <select name="jk_nsbh" class="form-control" >
                    <option>Laki Laki</option>
                    <option>Perempuan</option>
                  </select>
                </div>
                <label class="control-label col-sm-2">RT</label>
                <div class="col-sm-1">
                <input type="text" class="form-control" name="rt_nsbh">
                </div>
                <label class="control-label col-sm-1">RW</label>
                <div class="col-sm-1">
                <input type="text" class="form-control" name="rw_nsbh">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Kelurahan</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="klr_nsbh">
                </div>
                <label class="control-label col-sm-1">Kecamatan</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="kcm_nsbh">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Kota</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="kota_nsbh">
                </div>
                <label class="control-label col-sm-1">Kode Pos</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="kdp_nsbh">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Telepon</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="tlp_nsbh">
                </div>
              <label class="control-label col-sm-1">HP</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="hp_nsbh">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Tempat Lahir</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="tml_nsbh">
                </div>
                <label class="control-label col-sm-2">Tanggal lahir</label>
                <div class="col-sm-2">
                <input type="date" class="form-control" name="tl_nsbh">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Kantor/Usaha</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="ku_nsbh">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Alamat Kantor/Usaha</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="almku_nsbh">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Jabatan</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="jbt_nsbh">
                </div>
                <label class="control-label col-sm-2">Pendapatan Per Bulan</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="ppb_nsbh">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">NPWP</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="npwp_nsbh">
                </div>
              <label class="control-label col-sm-2">No Identitas</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="ni_nsbh">
                </div>
            </div>
  <center><input type="submit" class="btn btn-primary" value="Simpan"></center>
</form>
</div>
</div>
</body>
</html>