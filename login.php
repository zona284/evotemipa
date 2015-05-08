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
		$msg= 'Username / password wrong';
	}
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
<form method="POST" action="" name="login">
NIM
<input type="text" name="nim"/>
Password
<input type="password" name="password"/>
<input type="submit" value="Login" class="btn btn-primary"/>
</form>

</body>
</html>