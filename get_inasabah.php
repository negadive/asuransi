<html>
<head>
<?php
    include_once("koneksi.php");
	$q = $_GET['kode_nsbh'];
    $result = mysqli_query($config,"SELECT Nama, Alamat, KodePos FROM nasabah WHERE KodeNasabah='$q'") or die ('gagal terkoneksi'.mysqli_error($result));
	$data = mysqli_fetch_array($result);
	$hasil=$data[0].',|,'.$data[1].',|,'.$data[2];
	echo $hasil;
//echo json_encode($response);
?>	
</body>
</html>