<!doctype html>
<html>
<head>
<!--link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"-->
<link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function() {
    $( "#kd_nsbh" ).autocomplete({
        source: 'get_nasabah.php'
    });
});
function cariNasabah(str){
	$.ajax({  //Make the Ajax Request
		type: "GET",  
		url: "get_inasabah.php",  //file name
		data: "kode_nsbh="+ str,  //data
		//dataType : "json",
		success: function(server_response){ 
		var result= $(server_response).text().split(',|,');
			$("#nm_nsbh").val(result[0]);
			$("#alm_nsbh").val(result[1]);
			$("#kd_pos_nsbh").val(result[2]);
		} 
	}); 
};
$(function() {
    $( "#kd_nsbh" ).autocomplete({
        source: 'get_nasabah.php'
    });
});
function cariLokasi(str){
	$.ajax({  //Make the Ajax Request
		type: "GET",  
		url: "get_lok.php",  //file name
		data: "kode_lok="+ str,  //data
		//dataType : "json",
		success: function(server_response){ 
		var result= $(server_response).text().split(',|,');
			$("#lok_rumah").val(result[0]);
			$("#kd_pos_lok").val(result[1]);
		} 
	}); 
};
function hitungTang(){
	var totBang = parseInt($("#tot_bang").val());
	var totIbang = parseInt($("#tot_ibang").val());
	if(totBang!='' && totIbang!=''){
		var totTang = totBang + totIbang;
		$("#tot_tang").val(totTang);
	}
	
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
	include "koneksi.php";
	$agen = mysqli_query($config, 'SELECT KodeAgen FROM `agen` ORDER BY KodeAgen') or die(mysqli_error($config));
	
?>
<center><h1>Input Penjualan Polis</h1></center>
<div>
    <div class="container">
        <form class="form-horizontal" id="in_jual_polis" name="in_jual_polis" method="post" action="proc_in_jual_polis.php">
            <div class="form-group row">
                <label class="control-label col-sm-3">Nomor Polis</label>
                <div class="col-sm-2">
                <input type="text" class="form-control" name="no_pol">
                </div>
                <label class="control-label col-sm-2">Nomor Kwitansi</label>
                <div class="col-sm-2">
                <input type="text" class="form-control" name="no_kwit">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Tanggal polis</label>
                <div class="col-sm-2">
                <input class="form-control" type="date" name="tgl_pol">
                </div>
                <label class="control-label col-sm-2">Data Agen</label>
                <div class="col-sm-2">
                
  <select class="form-control"  name="kd_agen">
  <?php
  	while( $data = mysqli_fetch_array($agen) ){
  		echo "<option value='".$data['0']."'>".$data['0']."</option>";
	}
  ?>
  </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Periode Pertanggungan</label>
                <div class="col-sm-2">
                <input class="form-control" type="date" name="per_pola">
                </div>
                <label class="control-label col-sm-1" for="per_polb">s/d</label>
                <div class="col-sm-2">
                <input class="form-control" type="date" id="per_polb" name="per_polb">
                </div>
            </div>
  <!--div class="ui-widget"-->
            <div class="panel panel-danger">
            <div class="panel-heading">
            	Data Nasabah
            </div>
            <div class="panel-body">
            <div class="form-group row">
                <label class="control-label col-sm-3">Kode Nasabah</label>
                <div class="col-sm-2">
                <input type="text" class="form-control" id="kd_nsbh" required name="kd_nsbh" onChange="cariNasabah(this.value)">
                </div>
                <label class="control-label col-sm-1">Nama </label>
                <div class="col-sm-4">
                <input type="text" class="form-control" disabled id="nm_nsbh" name="nm_nsbh">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Alamat </label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="alm_nsbh" disabled id="alm_nsbh">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Kode Pos</label>
                <div class="col-sm-2">
                <input type="text" class="form-control" id="kd_pos_nsbh" disabled name="kd_pos_nsbh">
                </div>
            </div>
            </div>
            </div>
            <div class="panel panel-danger">
            <div class="panel-heading">
            	Data Rumah
            </div>
            <div class="panel-body">
            <div class="form-group row">
                <label class="control-label col-sm-3">Kode Lokasi</label>
                <div class="col-sm-2">
                <input type="text" class="form-control" name="kd_lok" required id="kd_lok" onChange="cariLokasi(this.value)">
                </div>
                <label class="control-label ">Kode Pos</label>
                <div class="col-sm-2">
                <input class="form-control" name="kd_pos_rmh" disabled type="text" id="kd_pos_lok">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Lokasi Rumah</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="lok_rumah" disabled id="lok_rumah">
                </div>
            </div>
            </div></div>
            <div class="panel panel-warning">
            <div class="panel-heading">
            	Kondisi Pertanggungan
            </div>
            <div class="panel-body">
            <div class="form-group">
                <label class="control-label col-sm-3">Atas Bangunan</label>
                <div class="col-sm-5">
                <textarea class="form-control" name="ats_bang"></textarea>
                </div>
                <div class="col-sm-2">
                <input class="form-control" name="tot_bang" type="text" id="tot_bang" onChange="hitungTang()">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Atas Isi Bangunan</label>
                <div class="col-sm-5">
  				<textarea class="form-control" name="ats_ibang"></textarea>
                </div>
                <div class="col-sm-2">
                <input class="form-control" name="tot_ibang" type="text" id="tot_ibang" onChange="hitungTang()">
				</div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Biaya Polis</label>
                <div class="col-sm-2">
                <input class="form-control" type="text" name="b_polis">
                </div>
                <label class="control-label">Biaya Materai</label>
                <div class="col-sm-2">
                <input class="form-control" type="text" name="b_materai">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-8">Total Pertanggungan</label>
                <div class="col-sm-2">
                <input class="form-control" name="tot_tang" readonly type="text" id="tot_tang">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Manfaat Tambahan(Tidak dijamin)</label>
                <div class="col-sm-8">
                <textarea class="form-control " name="tambahan"></textarea>
                </div>
            </div>
            </div></div>
  <center><input class="btn btn-primary" type="submit"></center>
</form>
</div></div>
</body>
</html>