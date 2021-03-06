<?php
	session_start();
	require "koneksi.php";
	$id_pol = $_GET['id'];
	$get_pol = mysqli_query ($config, "SELECT p.* FROM `polis` p WHERE p.no_pol = '".$id_pol."'");
	$q_pol = mysqli_fetch_array($get_pol);
	$get_kla = mysqli_query ($config, "SELECT no_kla FROM `klaim` WHERE no_pol = '".$id_pol."'");
	$q_kla = mysqli_fetch_array($get_kla);
	if($q_kla['no_kla'] != ""){
		$_SESSION['errMes'] .= 'Polis sudah diklaim';
	}
	$get_nas = mysqli_query ($config, "SELECT `kode_nas`, `nama_nas`,`alamat_nas`, `kdpos` FROM `nasabah` WHERE `kode_nas` = '".$q_pol['kd_nas']."'");
	$q_nas = mysqli_fetch_row($get_nas);
	
	$no_klaim = "KL-" . substr(strtoupper($q_pol['no_pol']),0,3) . date("dm") . "-" . date("yis");;
	
	if(isset($_REQUEST['submit'])){
		if($no_klaim != "" && $_POST['no_pol'] != "" && $_POST['total_klaim'] != ""){

			$no_polis = $_POST['no_pol'];
			$tgl_kejadian = date('Y-m-d');
			$total_klaim = $q_pol['total'];
			
			if(!preg_match("/^[a-zA-Z0-9.-]*$/", $no_klaim)){
				$_SESSION['errMes'] .= '<li>Nomor klaim hanya boleh mengandung huruf, angka, titik(.) dan minus(-)</li>';
			}
			if(!preg_match("/^[a-zA-Z0-9.-]*$/", $no_polis)){
				$_SESSION['errMes'] .= '<li>Nomor polis hanya boleh mengandung huruf, angka, titik(.) dan minus(-)</li>';
			}
			
			if($_SESSION['errMes']){
			} else {
				$klaim = mysqli_query($config,
					'INSERT INTO `klaim` VALUES ("'.$no_klaim.'", "'.$no_polis.'", "'.$tgl_kejadian.'",
									 "'.$total_klaim.'")');
				if($klaim){
					$_SESSION['Succ'] = true;
				} else {
					$_SESSION['errMes'] .=  '<li>'.mysqli_error($config).'</li>';
				}
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
<title>Klaim Polis</title>
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
		<h1 class="page-header">Klaim Polis</h1>
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
        <form class="form-horizontal" id="klaim_pol" name="klaim_pol" method="post" action="">
            <div class="form-group">
                <label class="control-label col-sm-3">Nomor Klaim</label>
                <div class="col-sm-3">
                <input class="form-control" type="text" readonly name="no_klaim" value="<?php echo $no_klaim; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Nomor Polis</label>
                <div class="col-sm-3">
                <input class="form-control" readonly name="no_pol" type="text" id="no_pol" value="<?php echo $q_pol[0]; ?>">
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
  <label class="control-label">s/d</label>
                <div class="col-sm-2">
                <input class="form-control" name="perpolb" readonly type="date" id="per_polb" value="<?php echo $q_pol[3]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Kode Nasabah</label>
                <div class="col-sm-3">
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
                <label class="control-label col-sm-3">Tanggal Kejadian</label>
                <div class="col-sm-2">
                <input class="form-control" readonly type="text" name="tgl_jadi" value="<?php echo date('d F Y'); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Total Klaim Polis</label>
                <div class="col-sm-2">
                <input class="form-control" type="text" readonly name="total_klaim" value="<?php echo $q_pol[6]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Terbilang</label>
                <div class="col-sm-7">
                <input class="form-control" type="text" readonly name="terbilang" id="terbilang" placeholder="Klik" onclick="pembilang(<?php echo $q_pol[6]; ?>)">
                </div>
            </div>
			
            <center><input class="btn btn-primary"
					<?php if($q_kla['no_kla'] != ""){
							echo "disabled";
					}?> 
			value="Klaim" name="submit" type="submit"></center>
</form>
</div>
</div>
</body>
</html>