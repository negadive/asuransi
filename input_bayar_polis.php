<?php
	session_start();
	require "koneksi.php";
	$id_pol = $_GET['id'];
	$get_pol = mysqli_query ($config, "SELECT * FROM `polis` WHERE `no_pol` = '".$id_pol."'");
	$q_pol = mysqli_fetch_array($get_pol);
	$get_nas = mysqli_query ($config, "SELECT `kode_nas`, `nama_nas`,`alamat_nas`, `kdpos` FROM `nasabah` WHERE `kode_nas` = '".$q_pol['kd_nas']."'");
	$q_nas = mysqli_fetch_row($get_nas);
	$no_kwit = "KW-" . substr(strtoupper($q_pol['no_pol']),0,3) . date("dmis");
	
	if($q_pol['total'] < 25000000){
		$total_bayar = $q_pol['total'] * 0.05;
	}else if($q_pol['total'] >= 10000000 && $q_pol['total'] < 25000000){
		$total_bayar = $q_pol['total'] * 0.1;
	}else if($q_pol['total'] >= 25000000 && $q_pol['total'] < 50000000){
		$total_bayar = $q_pol['total'] * 0.2;
	}else if($q_pol['total'] >= 50000000 && $q_pol['total'] < 100000000){
		$total_bayar = $q_pol['total'] * 0.25;
	}else if($q_pol['total'] >= 100000000){
		$total_bayar = $q_pol['total'] * 0.3;
	}else{
		$total_bayar = 0;
		$_SESSION['errMes'] .= 'Ada kesalahan dalam menghitung premi';
	}
	
	if(isset($_REQUEST['submit'])){
		if($_POST['no_kwit'] != "" && $_POST['no_pol'] != "" && $_POST['total_bayar'] != ""){

			$no_polis = $_POST['no_pol'];
			$tgl_bayar = date('Y-m-d');
			//$total_bayar = $q_pol['total'];
			//$terbilang = $_POST['terbilang'];
			
			if(!preg_match("/^[a-zA-Z0-9.-]*$/", $no_kwit)){
				$_SESSION['errMes'] .= '<li>Nomor kwitansi hanya boleh mengandung huruf, angka, titik(.) dan minus(-)</li>';
			}
			if(!preg_match("/^[a-zA-Z0-9.-]*$/", $no_polis)){
				$_SESSION['errMes'] .= '<li>Nomor polis hanya boleh mengandung huruf, angka, titik(.) dan minus(-)</li>';
			}
			
			if($_SESSION['errMes']){
			} else {
				$bayar = mysqli_query($config,
					'INSERT INTO `bayar` VALUES ("'.$no_kwit.'", "'.$no_polis.'", "'.$tgl_bayar.'",
												 "'.$total_bayar.'")');
				if($bayar){
					$_SESSION['Succ'] = true;
				} else {
					$_SESSION['errMes'] .=  '<li>'.mysqli_error($config).'</li>';
					//$_SESSION['error'] = true;
				}
				//header('Location: home_penjualan_polis.php');
			}	
		}else{
			$_SESSION['errMes'] .= '<li>Form tidak boleh ada yang kosong</li>';
			//$_SESSION['error'] = true;
		}
	}
?>
<!doctype html>
<html>
<head>
<script src="js/jquery-3.3.1.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/w3.css">
<link rel="stylesheet" type="text/css" href="css/all.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/w3.js"></script>
<script src="js/terbilang/terbilang.js"></script>
<script>

function pembilang(str){
	if(str != ""){
		var bilang = terbilang(str);
		$("#terbilang").val(bilang);
	}
};

</script>
<meta charset="utf-8">
<title>Bayar Angsuran</title>
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
		<h1 class="page-header">Bayar Angsuran</h1>
	</div>
</div>
    <div class="container">
	<?php
		if(isset($_SESSION['errMes']) || isset($_SESSION['Succ']) ){
			if($_SESSION['errMes']){
				echo"
				<div class='alert alert-danger'>
				<ul>
					".$_SESSION['errMes']."
				</ul>
				</div>";
			}else if($_SESSION['Succ']){
				echo"
				<div class='alert alert-success'>
					Sukses menambah nasabah
				</div>";
			}
		}
		//$_SESSION['error'] = false;
		$_SESSION['errMes'] = "";
		$_SESSION['Succ'] = false;
		?>
        <form class="form-horizontal" id="in_bayar_polis" name="in_bayar_polis" method="post" action="">
            <div class="form-group">
                <label class="control-label col-sm-3">Nomor Kwitansi</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" readonly name="no_kwit" value="<?php echo $no_kwit; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Nomor Polis</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" readonly name="no_pol" id="no_pol" value="<?php echo $q_pol[0]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Tanggal polis</label>
                <div class="col-sm-2">
                <input class="form-control" name="tgl_pol" readonly type="date" id="tgl_pol" value="<?php echo $q_pol[1]; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Periode polis</label>
                <div class="col-sm-2">
                <input class="form-control" name="per_pola" readonly type="date" id="per_pola" value="<?php echo $q_pol[2]; ?>">
                </div>
                <label class="control-label col-sm-1">s/d</label>
                <div class="col-sm-2">
                <input class="form-control" name="perpolb" readonly type="date" id="per_polb" value="<?php echo $q_pol[3]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Kode Nasabah</label>
                <div class="col-sm-2">
                <input class="form-control" name="kd_nsbh" readonly type="text" id="kd_nsbh" value="<?php echo $q_nas[0]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Nama Nasabah</label>
                <div class="col-sm-3">
                <input class="form-control" name="nm_nsbh" readonly type="text" id="nm_nsbh" value="<?php echo $q_nas[1]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Alamat Nasabah</label>
                <div class="col-sm-7">
                <input class="form-control" name="alm_nsbh" readonly type="text" id="alm_nsbh" value="<?php echo $q_nas[2]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Tanggal Bayar</label>
                <div class="col-sm-2">
                <input class="form-control" name="tgl_bayar" readonly type="date" id="tgl_bayar" value="<?php echo date('Y-m-d'); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Total Bayar Premi</label>
                <div class="col-sm-3">
                <input class="form-control"  type="text" readonly name="total_bayar" id="total" value="<?php echo $total_bayar; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Terbilang</label>
                <div class="col-sm-7">
                <input class="form-control" type="text" readonly name="terbilang" id="terbilang" placeholder="Klik" onclick="pembilang(<?php echo $total_bayar; ?>)">
                </div>
            </div>
            <center><input class="btn btn-primary" name="submit" type="submit"></center>
</form>
</div></div>
</body>
</html>