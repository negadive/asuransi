<?php
session_start();
$logon_user = (!isset($_SESSION['logon_user'])) ? NULL : $_SESSION['logon_user']  ;
include 'koneksi.php';
$today = date("Y-m-d H:i:s");
if(isset($_GET['act'])) {
	if($_GET['act']=="login") {
		$username = mysqli_real_escape_string($config, stripslashes(($_POST['user'])));
		$password = mysqli_real_escape_string($config, stripslashes(($_POST['password'])));
		
		if($username == "" || $password == ""){
			echo '<div align="center" class="alert alert-danger">Username and Password cannot be empty!</div>';
		}
		else{
			$query = mysqli_query($config, "SELECT * FROM user WHERE user = '$username' AND password = md5('$password')");
			
			if(mysqli_num_rows($query) > 0){				
				while($q = mysqli_fetch_assoc($query)){
					$uid = $q['user'];
					$usr = $q['nama'];
				
					$_SESSION['logon_id'] = $uid;
					$_SESSION['logon_user'] = $usr;
				}
			$msg = '[User Login] ID : '.$usr.' !';
			//$query_logs = mysql_query("INSERT INTO db_manage.log_adm (username, action, date) VALUES ('".$_SESSION['logon_user']."', '".$msg."', '".$today."')",$connect_adm) or die (mysql_error());
			echo '<div align="center" class="alert alert-success">Login Success !</div>';
			echo "<meta http-equiv='refresh' content='2; URL=index.php'>";
			}
			else{
				echo '<div align="center" class="alert alert-danger">Username or Password Wrong !</div>';				
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Asei Administrator</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Admin Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" role="form" action="?act=login">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="user" type="user" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

</body>

</html>
