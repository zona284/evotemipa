<?php
session_start();
//include_once 'Users.php';
//include_once 'Vote.php';
include 'db_connect.php';
$db = new DB_Connect();
        $db->connect();
if(!ISSET($_SESSION['login'])){
			header("location:login.php");
		}
$nim = $_SESSION['login'];
$query = mysql_query("select * from users where nim = '$nim'");
$data = mysql_fetch_array($query);
if(isset($data['nim'])){			
	if($data['status'] == "sudah"){
		echo "ENTE DAH NGEVOTE CUY";
		echo "<meta http-equiv=refresh content='5; url=logout.php'/>";
	}
	else{		
//$pilih = new Vote();
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
<form action="confirm.php" method="POST" onsubmit="return confirm('Apakah anda sudah yakin dengan pilihan anda?')">
    <p><input type="radio" name="pilih" id="pilih" value="1"> Nuno</p>
	<p><input type="radio" name="pilih" id="pilih" value="2" > Gema</p>
	<p><input type="radio" name="pilih" id="pilih" value="3" > Rakha</p>
    <input type="submit" class="btn btn-primary" value="Pilih">
	</form>
</body>
</html>
	<?php }
		
	}?>