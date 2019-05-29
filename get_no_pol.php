<?php
    include_once("koneksi.php");
	
    $db = new mysqli($servername,$user,$pasword,$db);
	
    $searchTerm = $_GET['term'];
    //$q=$_REQUEST["term"]; 
  //  $result = mysqli_query($config,"SELECT KodeNasabah FROM nasabah WHERE KodeNasabah LIKE '%".$q."%'") or die ('gagal terkoneksi'.mysqli_error($result));
	$query = $db->query("SELECT NomorPolis FROM polis WHERE NomorPolis LIKE '%".$searchTerm."%'");
	
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['NomorPolis'];
    }
	/*
	$json = array();
	while($row = mysqli_fetch_array($result)){
		$json[] = $row['KodeNasabah'];
		//array_push($json, $data['KodeNasabah']);
	}
	*/
	
	//echo $hasil;
	echo json_encode($data);
?>