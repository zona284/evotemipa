<?php
session_start();
include_once 'Users.php';
$user = new Users();
$uid = $_SESSION['unique_id'];
$log = uniqid('rakha',true);
if (!ISSET($_SESSION['login']))
{
header("location:login.php");
}
echo $_SESSION['login'];
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
<a href="logout.php?q=<?php echo $log?>">LOGOUT</a>
<h1> Hello <?php $user->get_fullname($uid); ?></h1>
<h2>Last Loged in at <?php $user->get_lastLogin($uid); ?></h2> 
<a href="pemilihan.php">Vote</a>
</body>
</html>