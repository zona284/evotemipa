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

?>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/fileinput.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- <script type="text/javascript">
        if(localStorage.getItem("counter")){
      if(localStorage.getItem("counter") >= 30){
        var value = 0;
		//window.location.replace("../index.php");
      }else{
        var value = localStorage.getItem("counter");
      }
    }else{
      var value = 0;
	  //window.location.replace("../index.php");
    }
    document.getElementById('divCounter').innerHTML = value;

    var counter = function (){
      if(value >= 30){
        localStorage.setItem("counter", 0);
		//window.location.replace("../index.php");
        value = 0;
		
      }else{
        value = parseInt(value)+1;
        localStorage.setItem("counter", value);
      }
      document.getElementById('divCounter').innerHTML = value;
    };

    var interval = setInterval(function (){counter();}, 1000);
    </script> -->
    <script>
function clearCount(){
    sessionStorage.clickcount = -1;
}   
        
function clickCounter() {
    if(typeof(Storage) !== "undefined") {
        if (sessionStorage.clickcount <20) {
            sessionStorage.clickcount = Number(sessionStorage.clickcount)+1;
        }
        else if (sessionStorage.clickcount == 20){
            document.getElementById("counter").innerHTML = "Waktu anda Habis, Silakan hubungi administrator";
            
            sessionStorage.clickcount = -1;            
            window.location.replace("logout.php"); //ntar ganti ama logout
        }
        else {
            sessionStorage.clickcount = 1;            
        }
        if(sessionStorage.clickcount > 0){
            document.getElementById("counter").innerHTML = "Waktu yang tersisa adalah " +                           sessionStorage.clickcount + " detik";
            }
    } else {
        document.getElementById("counter").innerHTML = "Hmm, nampaknya browser anda tidak mendukung HTML5.. Hmm...";
    }
}
var interval = setInterval(function (){clickCounter();}, 1000);
</script>
</head>
<body>
<div class="container">
<div id="counter"></div>
<a href="logout.php?q=<?php echo $log?>" onclick="clearCount()">LOGOUT</a>
<h1> Hello <?php $user->get_fullname($uid); ?></h1>
    <?php //require 'pemilihan.php'; ?>
<a class="btn btn-default" href="pemilihan.php">Vote</a>
</div>
</body>
</html>