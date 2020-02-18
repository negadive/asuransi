<?php
session_start();
	require "koneksi.php";
	$id_nas = $_GET['id'];
	$get_nas = mysqli_query ($config, "SELECT * FROM `nasabah` WHERE `kode_nas` = '".$id_nas."'");
	$data = mysqli_fetch_row($get_nas);

if(isset($_REQUEST['submit'])){
	if( $_POST['no_pol'] != "" && $_POST['tgl_pol'] != "" && $_POST['per_pola'] != "" && 
		$_POST['per_polb'] != "" && $_POST['kd_nsbh'] != "" && $_POST['tot_tang'] != "" && 
		$_POST['b_polis'] != "" && $_POST['b_materai']){
	
		//$no_kwit = $_POST['no_kwit'];
		$no_polis = $_POST['no_pol'];
		$tgl_pol = $_POST['tgl_pol'];
		//$kd_agen = $_POST['kd_agen'];
		$per_pola = $_POST['per_pola'];
		$per_polb = $_POST['per_polb'];
		
		$kd_nsbh = $_POST['kd_nsbh'];
		
		//$kd_lok = $_POST['kd_lok'];
		
		//$bang = $_POST['ats_bang'];
		//$isi_bang = $_POST['ats_ibang'];
		$tot_tang = $_POST['tot_tang'];
		$bpolis = $_POST['b_polis'];
		$bmaterai = $_POST['b_materai'];
		$total = $tot_tang + $bpolis + $bmaterai;
		
		//$no_reg = substr(strtoupper($data[1]),0,3) . date("dmyHis");
		
		//$tambahan = $_POST['tambahan'];
		
		/*
		if(!preg_match("/^[0-9.-\/]*$/", $tgl_pol)){
			$_SESSION['errMes'] .= '<li>Format tanggal salah</li>';
		}
		if(!preg_match("/^[0-9.-\/]*$/", $per_pola)){
			$_SESSION['errMes'] .= '<li>Format periode awal salah</li>';
		}
		if(!preg_match("/^[0-9.-]*$/", $per_polb)){
			$_SESSION['errMes'] .= '<li>Format periode akhir salah</li>';
		}
		*/
		if(!preg_match("/^[a-zA-Z0-9.-]*$/", $no_polis)){
			$_SESSION['errMes'] .= '<li>Nomor polis hanya boleh mengandung huruf, angka, titik(.) dan minus(-)</li>';
			//$_SESSION['error'] = true;
		}
		if(!preg_match("/^[0-9]*$/", $tot_tang)){
			$_SESSION['errMes'] .= '<li>Total bangunan nasabah hanya boleh mengandung angka</li>';
		}
		if(!preg_match("/^[0-9]*$/", $bpolis)){
			$_SESSION['errMes'] .= '<li>Biaya polis nasabah hanya boleh mengandung angka</li>';
		}
		if(!preg_match("/^[0-9]*$/", $bmaterai)){
			$_SESSION['errMes'] .= '<li>Biaya materai nasabah hanya boleh mengandung angka</li>';
		}
			
		if($_SESSION['errMes']){
		} else {
			$polis = mysqli_query($config,
				'INSERT INTO `polis` VALUES ("'.$no_polis.'", "'.$tgl_pol.'", "'.$per_pola.'", "'.$per_polb.'",
											 "'.$kd_nsbh.'", "'.$tot_tang.'", "'.$total.'",
											 "'.$bpolis.'", "'.$bmaterai.'")');
					//or die ('gagal terkoneksi'.mysqli_error($config));
			if($polis){
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

<script type="text/javascript">


function pembilang(str){
	if(str != ""){
		var bilang = terbilang(str);
		$("#terbilang").val(bilang);
	}
};

function hitungTotal(){
	if(($("#tot_tang").val()) != '' && ($("#b_polis").val()) != '' && ($("#b_materai").val()) != ''){
		var totTang = parseInt($("#tot_tang").val());
		var bPol = parseInt($("#b_polis").val());
		var bMat = parseInt($("#b_materai").val());
			var total = totTang + bPol + bMat;
			$("#total").val(total);
		pembilang(total);
	}
	
};
</script>
<meta charset="utf-8">
<title>Jual Polis</title>
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
		<h1 class="page-header">Jual Polis</h1>
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
					Sukses menjual polis
				</div>";
			}
		}
		//$_SESSION['error'] = false;
		$_SESSION['errMes'] = "";
		$_SESSION['Succ'] = false;
		?>
        <form class="form-horizontal" id="in_jual_polis" name="in_jual_polis" method="post" action="">
            <div class="form-group row">
                <label class="control-label col-sm-3">Nomor Polis</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="no_pol">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Tanggal polis</label>
                <div class="col-sm-3">
                <input class="form-control" type="date" name="tgl_pol">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Periode Pertanggungan</label>
                <div class="col-sm-3">
                <input class="form-control" type="date" name="per_pola">
                </div>
                <label class="control-label col-sm-1" for="per_polb">s/d</label>
                <div class="col-sm-3">
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
                <div class="col-sm-3">
                <input type="text" class="form-control" id="kd_nsbh" readonly required name="kd_nsbh" value="<?php echo $data[0];?>">
                </div>
                <label class="control-label col-sm-1">Nama </label>
                <div class="col-sm-4">
                <input type="text" class="form-control" disabled id="nm_nsbh" name="nm_nsbh" value="<?php echo $data[1];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Alamat </label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="alm_nsbh" disabled id="alm_nsbh" value="<?php echo $data[3];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Kode Pos</label>
                <div class="col-sm-2">
                <input type="text" class="form-control" id="kd_pos_nsbh" disabled name="kd_pos_nsbh" value="<?php echo $data[10];?>">
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
						<input class="form-control" name="tot_tang" type="text" id="tot_tang" onChange="hitungTotal()">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-6">Biaya Polis</label>
						<div class="col-sm-6">
						<input class="form-control" type="text" name="b_polis" id="b_polis" onChange="hitungTotal()">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="b_materai" class="col-sm-4 control-label">Biaya Materai</label>
						<div class="col-sm-6">
						<input class="form-control" type="text" name="b_materai" id="b_materai" onChange="hitungTotal()">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Total</label>
						<div class="col-sm-6">
						<input class="form-control" name="total" readonly type="text" id="total" onChange="">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Terbilang</label>
					<div class="col-sm-7">
					<input class="form-control" type="text" readonly name="terbilang" id="terbilang">
					</div>
				</div>
			</div>
            <!-- <div class="form-group">
                <label class="control-label col-sm-3">Manfaat Tambahan(Tidak dijamin)</label>
                <div class="col-sm-8">
                <textarea class="form-control " name="tambahan"></textarea>
                </div>
            </div> -->
            </div>
			</div>
	<center><input class="btn btn-primary" name="submit" type="submit"></center>
	</form>
</div></div>
</body>
</html>