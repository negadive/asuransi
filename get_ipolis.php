<html>
<head>
<?php
    include_once("koneksi.php");
	$q = $_GET['no_pol'];
    $result = mysqli_query($config,"SELECT A.Tanggal, A.Awal, A.Akhir, A.KodeNasabah, B.Nama, B.Alamat, A.KodeLokasi, C.Lokasi FROM polis A JOIN nasabah B on A.KodeNasabah = B.KodeNasabah JOIN rumah C on A.KodeLokasi = C.KodeLokasi WHERE A.NomorPolis='$q'") or die ('gagal terkoneksi'.mysqli_error($result));
	$data = mysqli_fetch_array($result);
	$hasil='asd,|,'.$data[0].',|,'.$data[1].',|,'.$data[2].',|,'.$data[3].',|,'.$data[4].',|,'.$data[5].',|,'.$data[6].',|,'.$data[7];
	echo $hasil;
//echo json_encode($response);
?>	
</body>
</html>