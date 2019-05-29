<html>
<head>
<?php
    include_once("koneksi.php");
	$q = $_GET['kode_lok'];
    $result = mysqli_query($config, "SELECT Lokasi, KodePos FROM rumah WHERE KodeLokasi='$q'") or die ('gagal mencari'.mysqli_error($result));
	$data = mysqli_fetch_array($result);
	$hasil=$data['Lokasi'].',|,'.$data['KodePos'];
	echo $hasil;
//echo json_encode($response);
?>	
</body>
</html>