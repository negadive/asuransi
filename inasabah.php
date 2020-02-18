<?php
session_start();
require "koneksi.php";
$id_nas = $_GET['id'];
$get_nas = mysqli_query ($config, "SELECT * FROM `nasabah` WHERE `kode_nas` = '".$id_nas."'");
$data = mysqli_fetch_row($get_nas);
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
<title>Data Nasabah</title>
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
            <div class="form-group" style="">
                <label class="control-label col-sm-3">Kode Nasabah</label>
                <div class="col-sm-2">
                <input type="text" readonly class="form-control" 
					value="<?php echo $data[0];?>" name="kd_nsbh">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Nama</label>
                <div class="col-sm-3">
                <input type="text" readonly class="form-control" 
					value="<?php echo $data[1];?>" name="nm_nsbh">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Jenis Kelamin</label>
                <div class="col-sm-2">
                <input type="text" readonly class="form-control" 
					value="<?php echo $data[2];?>" name="jk_nsbh">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Alamat</label>
                <div class="col-sm-7">
                <input type="text" readonly class="form-control" 
					value="<?php echo $data[3];?>" name="alm_nsbh">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Kelurahan</label>
                <div class="col-sm-3">
                <input type="text" readonly class="form-control"  
					value="<?php echo $data[4];?>" name="klr_nsbh">
                </div>
                <label class="control-label col-sm-1">RT</label>
                <div class="col-sm-1">
                <input type="text" readonly class="form-control"  
					value="<?php echo $data[5];?>" name="rt_nsbh">
                </div>
                <label class="control-label col-sm-1">RW</label>
                <div class="col-sm-1">
                <input type="text" readonly class="form-control"  
					value="<?php echo $data[6];?>" name="rw_nsbh">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Kota</label>
                <div class="col-sm-3">
                <input type="text" readonly class="form-control"  
					value="<?php echo $data[7];?>" name="kota_nsbh">
                </div>
                <label class="control-label col-sm-1">Kecamatan</label>
                <div class="col-sm-3">
                <input type="text" readonly class="form-control"  
					value="<?php echo $data[8];?>" name="kcm_nsbh">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Telepon</label>
                <div class="col-sm-3">
                <input type="text" readonly class="form-control"  
					value="<?php echo $data[9];?>" name="tlp_nsbh">
                </div>
                <label class="control-label col-sm-1">Kode Pos</label>
                <div class="col-sm-3">
                <input type="text" readonly class="form-control"  
					value="<?php echo $data[10];?>" name="kdp_nsbh">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Tanggal lahir</label>
                <div class="col-sm-2">
                <input type="date" readonly class="form-control" 
					value="<?php echo $data[11];?>" name="tl_nsbh">
                </div>
                <label class="control-label col-sm-2">Tempat Lahir</label>
                <div class="col-sm-3">
                <input type="text" readonly class="form-control"  
					value="<?php echo $data[12];?>" name="tml_nsbh">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Pekerjaan</label>
                <div class="col-sm-3">
                <input type="text" readonly class="form-control"  
					value="<?php echo $data[13];?>" name="ku_nsbh">
                </div>
                <label class="control-label col-sm-2">Pendapatan Per Bulan</label>
              <div class="col-sm-2">
                <input type="text" readonly class="form-control"  
					value="<?php echo $data[14];?>" name="ppb_nsbh">
                </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-sm-3">No Identitas</label>
              <div class="col-sm-3">
                <input type="text" readonly class="form-control"  
					value="<?php echo $data[15];?>" name="ni_nsbh">
                </div>
            </div>
			
			
		</form>
		<a href="edit_nasabah.php?id=<?php echo $id_nas; ?>"  name="edit" class="btn btn-primary" >Edit</a>
		<a href="hapus_nasabah.php?id=<?php echo $id_nas; ?>"  name="hapus" class="btn btn-primary">Hapus</a>
		<a href="input_jual_polis.php?id=<?php echo $id_nas; ?>"  name="jual" class="btn btn-primary">Jual Polis</a>
	</div>
</div>
</div>
</body>
</html>