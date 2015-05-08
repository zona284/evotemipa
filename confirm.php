<?php
include 'db_connect.php';
$db = new DB_Connect();
        $db->connect();
session_start();
$nim= $_SESSION['login'];
if(!ISSET($_SESSION['login'])){
			header("location:login.php");
		}
//$id = $_SESSION['id'];
error_reporting(0);		
$pilihan = $_POST['pilih'];
$query = mysql_query("select * from users where nim = '$nim'");
$data = mysql_fetch_array($query);

if(isset($data['nim'])){			
	if($data['status'] == "sudah"){
		echo "<meta http-equiv=refresh content='0; url=logout.php'/>";
	}
	else{
		if ($pilihan == null) { ?><script>alert("Anda belum memilih, silahkan pilih salah satu");document.location.href="pilih.php"</script> <?php }
		//echo $pilihan;
		else { echo "Suara Anda sedang dikirim ...";
		
			$query = mysql_query("select * from calon where id=$pilihan");
					$data = mysql_fetch_array($query);
					   $data[suara]++;
					   mysql_query("update calon set suara=$data[suara] where id=$pilihan");
					   mysql_query("update users set status='sudah' where nim='$nim'");
					
			/*session_start();
			unset($_SESSION['user']);
			unset($_SESSION['pass']);
			unset($_SESSION['id']);
			//echo $_SESSION[user];
			*/
			//session_destroy();
			echo "<meta http-equiv=refresh content='5; url=logout.php'/>";
						
		}          
	
			}
		}	
	
else {
	?><script>alert("NRP Tidak Ditemukan");document.location.href="index.php"</script> <?php
	session_destroy();
}
?>