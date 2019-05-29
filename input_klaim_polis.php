<!doctype html>
<html>
<head>
<!--link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"-->
<link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>	
$(function() {
    $( "#no_pol" ).autocomplete({
        source: 'get_no_pol.php'
    });
});
function cariPolis(str){
	$.ajax({  //Make the Ajax Request
		type: "GET",  
		url: "get_ipolis.php",  //file name
		data: "no_pol="+ str,  //data
		//dataType : "json",
		success: function(server_response){ 
		var result= $(server_response).text().split(',|,');
			$("#tgl_pol").val(result[1]);
			$("#per_pola").val(result[2]);
			$("#per_polb").val(result[3]);
			$("#kd_nsbh").val(result[4]);
			$("#nm_nsbh").val(result[5]);
			$("#alm_nsbh").val(result[6]);
			$("#kd_lok").val(result[7]);
			$("#lok_rumah").val(result[8]);
			
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
        <li class="dropdown "><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Master<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="home_agen.php">Agen</a></li>
            <li class="divider"></li>
            <li><a href="home_nasabah.php" >Data Nasabah</a></li>
            <li><a href="home_rumah.php">Data Rumah</a></li>
            <li><a href="home_lokasi.php">Lokasi</a></li>
          </ul>
        </li>
        <li class="dropdown active"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Transaksi<span class="caret"></span></a>
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
<center><h1>Input Klaim Polis</h1></center>
<div>
    <div class="container">
        <form class="form-horizontal" id="klaim_pol" name="klaim_pol" method="post" action="proc_klaim_polis.php">
            <div class="form-group">
                <label class="control-label col-sm-3">Nomor Klaim</label>
                <div class="col-sm-2">
                <input class="form-control" type="text" name="no_klaim">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Nomor Polis</label>
                <div class="col-sm-2">
                <input class="form-control" name="no_pol" type="text" id="no_pol" onChange="cariPolis(this.value)">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Tanggal polis</label>
                <div class="col-sm-2">
                <input class="form-control" name="tgl_pol" readonly type="date" id="tgl_pol">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Periode polis</label>
                <div class="col-sm-2">
                <input class="form-control" name="per_pola" readonly type="date" id="per_pola">
                </div>
  <label class="control-label">s/d</label>
                <div class="col-sm-2">
                <input class="form-control" name="perpolb" readonly type="date" id="per_polb">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Kode Nasabah</label>
                <div class="col-sm-2">
                <input class="form-control" name="kd_nsbh" readonly type="text" id="kd_nsbh">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Nama Nasabah</label>
                <div class="col-sm-3">
                <input class="form-control" name="nm_nsbh" readonly type="text" id="nm_nsbh">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Alamat Nasabah</label>
                <div class="col-sm-7">
                <input class="form-control" name="alm_nsbh" readonly type="text" id="alm_nsbh">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Kode Lokasi</label>
                <div class="col-sm-2">
                <input class="form-control" name="kd_lok" readonly type="text" id="kd_lok">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Lokasi Rumah</label>
                <div class="col-sm-7">
                <input class="form-control" name="lok_rumah" readonly type="text" id="lok_rumah">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Tanggal Kejadian</label>
                <div class="col-sm-2">
                <input class="form-control" readonly type="date" name="tgl_jadi" value="<?php echo date('Y-m-d'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Kondisi Rumah</label>
                <div class="col-sm-2">
                    <select class="form-control">
						<?php
                        for($x=0;$x<=100;$x++){
                        echo "<option value='$x'>$x</option>";
                        }
                        ?>
                    </select>
                </div>
                <label class="control-label">Rusak</label>
                <div class="col-sm-2">
                    <select class="form-control">
						<?php
                        for($y=0;$y<=100;$y++){
                        echo "<option value='$y'>$y</option>";
                        }
                        ?>
                    </select>
                </div>
                <label class="control-label">Baik</label>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Total Klaim Polis</label>
                <div class="col-sm-2">
                <input class="form-control" type="text" name="total_klaim">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Terbilang</label>
                <div class="col-sm-7">
                <input class="form-control" type="text" name="terbilang">
                </div>
            </div>
            <center><input class="btn btn-primary" value="Simpan" type="submit"></center>
</form>
</div>
</div>
</body>
</html>