<!doctype html>
<html>
<head>
<!--link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"-->
<link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
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
            <li><a href="#">Laporan Nasabah</a></li>
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
<div>
    <center><h1>Input Data Agen</h1></center>
    <div class="container">
        <form class="form-horizontal" id="in_agen" name="in_agen" method="post" action="proc_in_agen.php">
            <div class="form-group">
                <label class="control-label col-sm-3" for="kd_agen">Kode Agen</label>
                <div class="col-sm-2">
                <input type="text" class="form-control" id="kd_agen" name="kd_agen">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="nm_agen">Nama</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="nm_agen">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="alm_agen">Alamat</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="alm_agen">
                </div>
            </div>
          <div class="form-group row">
                <label class="control-label col-sm-3" for="jk_agen">Jenis Kelamin</label>
                <div class="col-sm-3">
                    <select name="jk_agen" id="jk_agen" class="form-control" style="height: 34px;">
                    <option value="Laki laki">Laki Laki</option>
                    <option value=""Perempuan>Perempuan</option>
                    </select>
                </div>
                <label class="control-label col-sm-1" for="nm_agen">RT</label>
                <div class="col-sm-1">
                <input type="text" class="form-control" name="rt_agen">
                </div>
                  <label class="control-label col-sm-1" for="nm_agen">RW</label>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="rw_agen">
            </div>
          </div>
            <div class="form-group row">
                <label class="control-label col-sm-3" for="nm_agen">Kelurahan</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="klr_agen">
                </div>
                <label class="control-label col-sm-1" for="nm_agen">Kecamatan</label>
                <div class="col-xs-3">
                <input type="text" class="form-control" name="kcm_agen">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3" for="nm_agen">Kota</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="kota_agen">
                </div>
                <label class="control-label col-sm-1" for="nm_agen">Kode Pos</label>
                <div class="col-xs-3">
                <input type="text" class="form-control" name="kdp_agen">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3" for="nm_agen">Telepon</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="tlp_agen">
                </div>
                <label class="control-label col-sm-1" for="nm_agen">HP</label>
                <div class="col-xs-3">
                <input type="text" class="form-control" name="hp_agen">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3" for="nm_agen">Tempat Lahir</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="tml_agen">
                </div>
                <label class="control-label col-sm-2" for="nm_agen">Tanggal lahir</label>
                <div class="col-xs-2">
                <input type="date" class="form-control" name="tl_agen">
                </div>
            </div>
            <center><input class="btn btn-primary" type="submit"></center>
        </form>
  </div>
    </div>
</body>
</html>