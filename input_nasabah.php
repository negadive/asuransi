<?php
session_start();

if(isset($_REQUEST['submit'])){
	require "koneksi.php";
	if($_POST['kd_nsbh'] != "" && $_POST['nm_nsbh'] != "" && $_POST['alm_nsbh'] != "" && $_POST['jk_nsbh'] != "" && 
		$_POST['kota_nsbh'] != "" && $_POST['klr_nsbh'] != "" && $_POST['tlp_nsbh'] != "" && $_POST['rt_nsbh'] != "" && 
		$_POST['rw_nsbh'] != "" && $_POST['kcm_nsbh'] != "" && $_POST['kdp_nsbh'] != "" && $_POST['tl_nsbh'] != "" && 
		$_POST['tml_nsbh'] != "" && $_POST['ku_nsbh'] != "" && $_POST['ppb_nsbh'] != "" && $_POST['ni_nsbh']){
		

		$kd_nsbh = $_POST['kd_nsbh'];
		$nm_nsbh = $_POST['nm_nsbh'];
		$alm_nsbh = $_POST['alm_nsbh'];
		$jk_nsbh = $_POST['jk_nsbh'];
		$kota_nsbh = $_POST['kota_nsbh'];
		$klr_nsbh = $_POST['klr_nsbh'];
		$tlp_nsbh = $_POST['tlp_nsbh'];
		$rt_nsbh = $_POST['rt_nsbh'];
		$rw_nsbh = $_POST['rw_nsbh'];
		$kcm_nsbh = $_POST['kcm_nsbh'];
		$kdp_nsbh = $_POST['kdp_nsbh'];
		//$hp_nsbh = $_POST['hp_nsbh'];
		$tl_nsbh = $_POST['tl_nsbh'];
		$tml_nsbh = $_POST['tml_nsbh'];
		$ku_nsbh = $_POST['ku_nsbh'];
		$ppb_nsbh = $_POST['ppb_nsbh'];
		//$npwp_nsbh = $_POST['npwp_nsbh'];
		$ni_nsbh = $_POST['ni_nsbh'];

		if(!preg_match("/^[a-zA-Z0-9.-]*$/", $kd_nsbh)){
			$_SESSION['errMes'] .= '<li>Kode nasabah hanya boleh mengandung huruf, angka, titik(.) dan minus(-)</li>';
			//$_SESSION['error'] = true;
		}
		if(!preg_match("/^[a-zA-Z .,]*$/", $nm_nsbh)){
			$_SESSION['errMes'] .= '<li>Nama nasabah hanya boleh mengandung huruf, titik(.), koma(,) dan spasi</li>';
			//$_SESSION['error'] = true;
		}
		if(!preg_match("/^[0-9.-]*$/", $tlp_nsbh)){
			$_SESSION['errMes'] .= '<li>No telpon hanya boleh mengandung angka, titik(.) dan koma(,)</li>';
			//$_SESSION['error'] = true;
		} 

		if($_SESSION['errMes']){
			//echo '<script language ="javascript">window.history.back();</script>';
		}else {
			$simpan = mysqli_query($config,
				'INSERT INTO `nasabah` VALUES ("'.$kd_nsbh.'", "'.$nm_nsbh.'", "'.$jk_nsbh.'", "'.$alm_nsbh.'",
											 "'.$klr_nsbh.'", "'.$rt_nsbh.'", "'.$rw_nsbh.'", "'.$kota_nsbh.'",
											 "'.$kcm_nsbh.'", "'.$tlp_nsbh.'", "'.$kdp_nsbh.'", "'.$tl_nsbh.'",
											 "'.$tml_nsbh.'", "'.$ku_nsbh.'", "'.$ppb_nsbh.'", "'.$ni_nsbh.'")');
					//or die ('gagal terkoneksi'.mysqli_error($config));
			if($simpan){
				$_SESSION['Succ'] = true;
			} else {
				$_SESSION['errMes'] .=  '<li>'.mysqli_error($config).'</li>';
				//$_SESSION['error'] = true;
			}
			//header('Location: input_nasabah.php');
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
<!--link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"-->
<script src="js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
<script src="js/w3.js"></script>
<link rel="stylesheet" type="text/css" href="css\w3.css">
<link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">
<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<meta charset="utf-8">
<title>Pendaftaran Nasabah</title>
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
		<h1 class="page-header">Pendaftaran Nasabah</h1>
	</div>
</div>
<div>
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
        <form class="form-horizontal" id="in_nasabah" name="in_nasabah" method="post" action="">
            <div class="form-group" style="">
                <label class="control-label col-sm-3">Kode Nasabah</label>
                <div class="col-sm-2">
                <input type="text" class="form-control" 
					value="<?php 
						if(isset($kd_nsbh)){
							echo $kd_nsbh;
						} ?>" name="kd_nsbh">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Nama</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" 
					value="<?php 
						if(isset($nm_nsbh)){
							echo $nm_nsbh;
						} ?>" name="nm_nsbh">
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
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Alamat</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" 
					value="<?php 
						if(isset($alm_nsbh)){
							echo $alm_nsbh;
						} ?>" name="alm_nsbh">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Kelurahan</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" 
					value="<?php 
						if(isset($klr_nsbh)){
							echo $klr_nsbh;
						} ?>" name="klr_nsbh">
                </div>
                <label class="control-label col-sm-1">RT</label>
                <div class="col-sm-1">
                <input type="text" class="form-control" 
					value="<?php 
						if(isset($rt_nsbh)){
							echo $rt_nsbh;
						} ?>" name="rt_nsbh">
                </div>
                <label class="control-label col-sm-1">RW</label>
                <div class="col-sm-1">
                <input type="text" class="form-control" 
					value="<?php 
						if(isset($rw_nsbh)){
							echo $rw_nsbh;
						} ?>" name="rw_nsbh">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Kota</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" 
					value="<?php 
						if(isset($kota_nsbh)){
							echo $kota_nsbh;
						} ?>" name="kota_nsbh">
                </div>
                <label class="control-label col-sm-1">Kecamatan</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" 
					value="<?php 
						if(isset($kcm_nsbh)){
							echo $kcm_nsbh;
						} ?>" name="kcm_nsbh">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Telepon</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" 
					value="<?php 
						if(isset($tlp_nsbh)){
							echo $tlp_nsbh;
						} ?>" name="tlp_nsbh">
                </div>
                <label class="control-label col-sm-1">Kode Pos</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" 
					value="<?php 
						if(isset($kdp_nsbh)){
							echo $kdp_nsbh;
						} ?>" name="kdp_nsbh">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Tanggal lahir</label>
                <div class="col-sm-2">
                <input type="date" class="form-control" 
					value="<?php 
						if(isset($tl_nsbh)){
							echo $tl_nsbh;
						} ?>" name="tl_nsbh">
                </div>
                <label class="control-label col-sm-2">Tempat Lahir</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" 
					value="<?php 
						if(isset($tml_nsbh)){
							echo $tml_nsbh;
						} ?>" name="tml_nsbh">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Pekerjaan</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" 
					value="<?php 
						if(isset($ku_nsbh)){
							echo $ku_nsbh;
						} ?>" name="ku_nsbh">
                </div>
                <label class="control-label col-sm-2">Pendapatan Per Bulan</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" 
					value="<?php 
						if(isset($ppb_nsbh)){
							echo $ppb_nsbh;
						} ?>" name="ppb_nsbh">
                </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-sm-3">No Identitas</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" 
					value="<?php 
						if(isset($ni_nsbh)){
							echo $ni_nsbh;
						} ?>" name="ni_nsbh">
                </div>
            </div>
  <center><input type="submit" name="submit" class="btn btn-primary" value="Simpan"></center>
</form>
</div>
</div>
</div>
</body>
</html>