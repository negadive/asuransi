<?php
session_start();
$logon_user = (isset($_SESSION['logon_user'])) ? $_SESSION['logon_user'] : NULL;
if(!$_SESSION['logon_user']){
	echo "<meta http-equiv='refresh' content='1; URL=login.php'>";	
}
else{
?>
<!DOCTYPE html>
<html>

<head>

<script src="js/jquery-3.3.1.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/w3.css">
<link rel="stylesheet" type="text/css" href="css/all.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/w3.js"></script>
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
    <h1 class="page-header">Home</h1>
  </div>
</div>
			<div class="alert alert-info"><h3>WELCOME , <?php echo $_SESSION['logon_user']; ?> , This is Administrator Page for Manage Database !</h3></div>
            <div class="alert alert-warning"> </div>

	</div>
</body>

</html>
<?php
}
?>
