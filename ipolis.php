<?php
session_start();
	require "koneksi.php";
	$id_pol = $_GET['id'];
	$get_pol = mysqli_query ($config, "SELECT * FROM `polis` WHERE `no_pol` = '".$id_pol."'");
	$q_pol = mysqli_fetch_array($get_pol);
	$get_nas = mysqli_query ($config, "SELECT `kode_nas`, `nama_nas`,`alamat_nas`, `kdpos` FROM `nasabah` WHERE `kode_nas` = '".$q_pol['kd_nas']."'");
	$q_nas = mysqli_fetch_row($get_nas);

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

<script type="text/javascript">

function pembilang(str){
	if(str != ""){
		var bilang = terbilang(str);
		$("#terbilang").val(bilang);
	}
};

</script>
<meta charset="utf-8">
<title>Detail Polis</title>
</head>

<body >
<?php
	require 'sidebar.php';
?>

<div class="main" id="main">
<div class="w3-white">
	<button id="openNav" class="w3-button w3-white w3-large" style="position:fixed;" onclick="w3_open()">&#9776;</button>
	<image src="images/Logo.png" style="position: absolute; top:16px; right: 20px;;" width="20%" class="w3-right">
	<div class="w3-container">
		<h1 class="page-header">Detail Polis</h1>
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
		//$_SESSION['errMes'] = "";
		$_SESSION['Succ'] = false;
		?>
        <form class="form-horizontal" id="in_jual_polis" readonly name="in_jual_polis" method="post" action="">
            <div class="form-group row">
                <label class="control-label col-sm-3">Nomor Polis</label>
                <div class="col-sm-2">
                <input type="text" class="form-control" readonly name="no_pol" value="<?php echo $q_pol[0]; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Tanggal polis</label>
                <div class="col-sm-2">
                <input class="form-control" type="date" readonly name="tgl_pol" value="<?php echo $q_pol[1]; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Periode Pertanggungan</label>
                <div class="col-sm-2">
                <input class="form-control" type="date" readonly name="per_pola" value="<?php echo $q_pol[2]; ?>">
                </div>
                <label class="control-label col-sm-1" for="per_polb">s/d</label>
                <div class="col-sm-2">
                <input class="form-control" type="date" id="per_polb" readonly name="per_polb" value="<?php echo $q_pol[3]; ?>">
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
                <input type="text" class="form-control" id="kd_nsbh" readonly required name="kd_nsbh" value="<?php echo $q_nas[0];?>">
                </div>
                <label class="control-label col-sm-1">Nama </label>
                <div class="col-sm-4">
                <input type="text" class="form-control" disabled id="nm_nsbh" readonly name="nm_nsbh" value="<?php echo $q_nas[1];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Alamat </label>
                <div class="col-sm-7">
                <input type="text" class="form-control" readonly name="alm_nsbh" disabled id="alm_nsbh" value="<?php echo $q_nas[2];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Kode Pos</label>
                <div class="col-sm-2">
                <input type="text" class="form-control" id="kd_pos_nsbh" disabled name="kd_pos_nsbh" value="<?php echo $q_nas[3];?>">
                </div>
            </div>
            </div>
            </div>
            <div class="panel panel-warning">
            <div class="panel-heading">
            	Kondisi Pertanggungan
            </div>
            <div class="panel-body">
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-6">Total Pertanggungan</label>
						<!-- <div class="col-sm-5">
						<textarea class="form-control" name="ats_bang"></textarea>
						</div> -->
						<div class="col-sm-6">
						<input class="form-control" name="tot_bang" readonly type="text" id="tot_tang" onChange="hitungTang()" value="<?php echo $q_pol[5]; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-6">Biaya Polis</label>
						<div class="col-sm-6">
						<input class="form-control" type="text" readonly name="b_polis" value="<?php echo $q_pol[7]; ?>">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="b_materai" class="col-sm-4 control-label">Biaya Materai</label>
						<div class="col-sm-6">
						<input class="form-control" type="text" readonly name="b_materai" id="b_materai" value="<?php echo $q_pol[8]; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Total</label>
						<div class="col-sm-6">
						<input class="form-control" name="tot_tang" readonly type="text" id="tot_tang" value="<?php echo $q_pol[6]; ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Terbilang</label>
					<div class="col-sm-7">
					<input class="form-control" type="text" readonly name="terbilang" id="terbilang" onclick="pembilang(<?php echo $q_pol[6]; ?>)">
					</div>
				</div>
			</div>
			</div>
            <!-- <div class="form-group">
                <label class="control-label col-sm-3">Manfaat Tambahan(Tidak dijamin)</label>
                <div class="col-sm-8">
                <textarea class="form-control " readonly name="tambahan"></textarea>
                </div>
            </div> -->
            </div>
			</div>
	</form>
	
		<a href="edit_jual_polis.php?id=<?php echo $id_pol; ?>"  name="edit" class="btn btn-primary" >Edit</a>
		<a href="hapus_jual_polis.php?id=<?php echo $id_pol; ?>"  name="hapus" class="btn btn-primary">Hapus</a>
		<a href="input_bayar_polis.php?id=<?php echo $id_pol; ?>"name="bayar" class="btn btn-primary">Bayar Angsur</a>
		<a href="input_klaim_polis.php?id=<?php echo $id_pol; ?>"  name="klaim" class="btn btn-primary">Klaim</a>
</div></div>
</body>
</html>