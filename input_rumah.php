<!doctype html>
<html>
<head>
<!--link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"-->
<link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
function cariLokasi(kode_pos){
	$.ajax({  //Make the Ajax Request
		type: "GET",  
		url: "get_lokasi.php",  //file name
		data: "kd_pos="+ kode_pos,  //data
		//dataType : "json",
		success: function(server_response){ 
		var result= $(server_response).text().split(',|,');
			$("#klrhn").val(result[0]);
			$("#kcmtn").val(result[1]);
			$("#kota").val(result[2]);
		} 
	}); 
};
</script>
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
<center><h1>Input Data Lokasi Rumah</h1></center>
<?php
	include "koneksi.php";
	$kode_pos = mysqli_query($config, 'SELECT KodePos FROM `lokasi` ORDER BY KodePos') or die(mysqli_error($config));
	
?>
<div>
    <div class="container">
<form class="form-horizontal" id="in_rumah" name="in_rumah" method="post" action="proc_in_rumah.php">
            <div class="form-group">
                <label class="control-label col-sm-3">Kode Lokasi</label>
                <div class="col-sm-2">
                <input type="text" class="form-control" name="kd_lok">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Lokasi Rumah</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="lok_rumah">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Tipe Rumah</label>
                <div class="col-sm-2">
                  <select class="form-control" name="tp_rumah">
                    <option value="Rumah Tinggal">Rumah Tinggal</option>
                  </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Kode Pos</label>
                <div class="col-sm-2">
                  <select class="form-control" name="kode_pos" onChange="cariLokasi(this.value)">
                    <option value="">Pilih</option>
                  <?php
                    while( $data = mysqli_fetch_array($kode_pos) ){
                        echo "<option value='".$data['0']."'>".$data['0']."</option>";
                    }
                  ?>
                  </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Kelurahan</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="klrhn" name="klrhn">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Kecamatan</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="kcmtn" name="kcmtn">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Kota</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="kota" name="kota">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Kelas Konstruksi</label>
                <div class="col-sm-1" style="padding-right:10px;">
                  <select class="form-control" name="kls_kons">
                    <option value="1">1</option>
                    <option value="2">2</option>
                  </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Harga Bangunan</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="hrg_bang">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Harga isi Bangunan</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="hrg_ibang">
                </div>
            </div>
            <center><input class="btn btn-primary" type="submit"></center>
</form>
</div></div>
</body>
</html>