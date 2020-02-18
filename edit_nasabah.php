<?php
	session_start();
	require "koneksi.php";
	$id_nas = $_GET['id'];
	$get_nas = mysqli_query ($config, "SELECT * FROM `nasabah` WHERE `kode_nas` = '".$id_nas."'");
	$data = mysqli_fetch_row($get_nas);

if(isset($_REQUEST['submit'])){
	if($_POST['nm_nsbh'] != "" && $_POST['alm_nsbh'] != "" && $_POST['jk_nsbh'] != "" && 
		$_POST['kota_nsbh'] != "" && $_POST['klr_nsbh'] != "" && $_POST['tlp_nsbh'] != "" && $_POST['rt_nsbh'] != "" && 
		$_POST['rw_nsbh'] != "" && $_POST['kcm_nsbh'] != "" && $_POST['kdp_nsbh'] != "" && $_POST['tl_nsbh'] != "" && 
		$_POST['tml_nsbh'] != "" && $_POST['ku_nsbh'] != "" && $_POST['ppb_nsbh'] != "" && $_POST['ni_nsbh']){
		

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
		$almku_nsbh = $_POST['almku_nsbh'];
		$jbt_nsbh = $_POST['jbt_nsbh'];
		$ppb_nsbh = $_POST['ppb_nsbh'];
		//$npwp_nsbh = $_POST['npwp_nsbh'];
		$ni_nsbh = $_POST['ni_nsbh'];
		
		if(!preg_match("/^[a-zA-Z., ]*$/", $nm_nsbh)){
			$_SESSION['errMes'] .= '<li>Nama nasabah hanya boleh mengandung huruf, titik(.) dan koma(,)</li>';
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
				"UPDATE `nasabah` SET	`nama_nas` = '".$nm_nsbh."', 
										`alamat_nas` = '".$alm_nsbh."',
										`kota` = '".$kota_nsbh."', 
										`kdpos` = '".$kdp_nsbh."', 
										`telp` = '".$tlp_nsbh."', 
										`tgl_lah` = '".$tl_nsbh."', 
										`tmpt_lah` = '".$tml_nsbh."', 
										`jen_kel` = '".$jk_nsbh."',
										`pekerjaan` = '".$ku_nsbh."', 
										`pendapatan` = '".$ppb_nsbh."',
										`identitas` = '".$ni_nsbh."',
										`kelurahan` = '".$klr_nsbh."', 
										`kecamatan` = '".$kcm_nsbh."', 
										`rt` = '".$rt_nsbh."', 
										`rw` = '".$rw_nsbh."' WHERE `kode_nas` = '".$id_nas."'");
			if($simpan){
				$_SESSION['Succ'] = true;
				header('Location: inasabah.php?id='.$id_nas);
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

<meta charset="utf-8">
<title>Ubah Data Nasabah</title>
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
		<h1 class="page-header">Data Nasabah</h1>
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
            <div class="form-group">
                <label class="control-label col-sm-3">Nama</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" 
					value="<?php echo $data[1];?>" name="nm_nsbh">
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
					value="<?php echo $data[3];?>" name="alm_nsbh">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Kelurahan</label>
                <div class="col-sm-3">
                <input type="text" class="form-control"  
					value="<?php echo $data[4];?>" name="klr_nsbh">
                </div>
                <label class="control-label col-sm-1">RT</label>
                <div class="col-sm-1">
                <input type="text" class="form-control"  
					value="<?php echo $data[5];?>" name="rt_nsbh">
                </div>
                <label class="control-label col-sm-1">RW</label>
                <div class="col-sm-1">
                <input type="text" class="form-control"  
					value="<?php echo $data[6];?>" name="rw_nsbh">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Kota</label>
                <div class="col-sm-3">
                <input type="text" class="form-control"  
					value="<?php echo $data[7];?>" name="kota_nsbh">
                </div>
                <label class="control-label col-sm-1">Kecamatan</label>
                <div class="col-sm-3">
                <input type="text" class="form-control"  
					value="<?php echo $data[8];?>" name="kcm_nsbh">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Telepon</label>
                <div class="col-sm-3">
                <input type="text" class="form-control"  
					value="<?php echo $data[9];?>" name="tlp_nsbh">
                </div>
                <label class="control-label col-sm-1">Kode Pos</label>
                <div class="col-sm-3">
                <input type="text" class="form-control"  
					value="<?php echo $data[10];?>" name="kdp_nsbh">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Tanggal lahir</label>
                <div class="col-sm-2">
                <input type="date" class="form-control" 
					value="<?php echo $data[11];?>" name="tl_nsbh">
                </div>
                <label class="control-label col-sm-2">Tempat Lahir</label>
                <div class="col-sm-3">
                <input type="text" class="form-control"  
					value="<?php echo $data[12];?>" name="tml_nsbh">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Pekerjaan</label>
                <div class="col-sm-3">
                <input type="text" class="form-control"  
					value="<?php echo $data[13];?>" name="ku_nsbh">
                </div>
                <label class="control-label col-sm-2">Pendapatan Per Bulan</label>
              <div class="col-sm-2">
                <input type="text" class="form-control"  
					value="<?php echo $data[14];?>" name="ppb_nsbh">
                </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-sm-3">No Identitas</label>
              <div class="col-sm-3">
                <input type="text" class="form-control"  
					value="<?php echo $data[15];?>" name="ni_nsbh">
                </div>
            </div>
			
			<center><input type="submit" name="submit" class="btn btn-primary" value="Simpan"></center>
			
		</form>
	</div>
</div>
</div>
</body>
</html>