<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="js/jquery-2.1.1.min.js"></script>
        <script src="js/fileinput.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>

<div class="container">
<h1>E-vote FMIPA</h1>
<?php
session_start();
include_once 'Users.php';
$user = new Users();
// if user has sesssionnns
if (ISSET($_SESSION['login'])){
	header("location:index.php");
}
// checking user
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$nim = $_POST['nim'];
	$login = $user->getUser($_POST['nim'], $_POST['password']);
	if ($login){
		// Login Success
		//echo $nim;
		$_SESSION['login']=$nim;
		//echo $_SESSION['login'];
		header("location:login.php");
	}
	else{
		// Login Failed
		echo '<div class="alert alert-danger fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error!</strong> Periksa kembali nim dan password anda
</div>';
	}
}
?>

<div class="login-form">
<div class="form-header">
	<i class="fa fa-user"></i>
	</div>
<form method="POST" action="" class="form-signin" name="login" role="form">
NIM
<input type="text" name="nim" class="form-control" placeholder="NIM/NRP" autofocus=""/><br/>
Password
<input type="password" name="password"class="form-control" placeholder="Password" autofocus=""/>
<br/>
<input type="submit" value="Login" class="btn btn-primary"/>
</form>
</div>
</div>
</body>
</html>