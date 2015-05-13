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
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/fileinput.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<div class="container">
<a href="logout.php?q=<?php echo $log?>">LOGOUT</a>
<h1> Hello <?php $user->get_fullname($uid); ?></h1>

<a class="btn btn-default" href="pemilihan.php">Vote</a>
</div>
</body>
</html>