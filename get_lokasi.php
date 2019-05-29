<html>
<head>
<?php
    include_once("koneksi.php");
	$q = $_GET['kd_pos'];
    $result = mysqli_query($config,"SELECT * FROM lokasi WHERE KodePos='$q'") or die ('gagal terkoneksi'.mysqli_error($result));
	$data = mysqli_fetch_array($result);
	$hasil=$data[1].',|,'.$data[2].',|,'.$data[3];
	echo $hasil;
//echo json_encode($response);
?>	
</body>
</html>