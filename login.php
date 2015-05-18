<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="js/jquery-2.1.1.min.js"></script>
        <script src="js/fileinput.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <style>
    .form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}
.form-signin .checkbox
{
    font-weight: normal;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}
.form-signin input[type="text"]
{
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{
    margin-top: 20px;
    padding: 40px 0px 20px 0px;
    background-color: #f7f7f7;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.need-help
{
    margin-top: 10px;
}
.new-account
{
    display: block;
    margin-top: 10px;
}
    </style>
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
        if($_POST['nim'] == 'dpmadmin'){
            $_SESSION['loginadm']='adminzz';
            header("location:admin/admin.php");
        }
		else {
            $_SESSION['login']=$nim;
            //echo $_SESSION['login'];
            header("location:login.php");
        }
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

    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Login to Evote FMIPA</h1>
            <div class="account-wall">
                <div class="form-header">
                    <i class="fa fa-user"></i>
                </div>
                <form method="POST" action="" class="form-signin" name="login" role="form" >
                <input type="text" name="nim" class="form-control" placeholder="NIM/NRP" required autofocus>
                <input type="password" name="password"class="form-control" placeholder="Password" required autofocus>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in</button>
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>