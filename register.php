<?php
include_once 'Users.php';
$user = new Users();
// Checking for user logged in or not
if (ISSET($_SESSION['login']))
{
header("location:index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$register = $user->storeUser($_POST['nim'], $_POST['password']);
	if ($register){
		// Registration Success
		echo 'Registration successful <a href="login.php">Click here</a> to login';
	} else{
		// Registration Failed
		echo 'Registration failed. Email or Username already exits please try again';
	}
}
?>
<form method="POST" action="" name='reg' >
NIM
<input type="text" name="nim"/>
Password
<input type="password" name="password"/>
<input type="submit" value="Register"/>
</form> 