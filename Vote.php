<?php
include_once 'db_connect.php';

class Vote {

	public function __construct(){
		
	}
	
	public function __destruct(){	
		
	}
		
	public function voting($count, $idcalon){
		//$count = $count + 1;
		
		$check = mysql_query("SELECT count from calon where id='$idcalon'");
		$checkdata = mysql_fetch_array($check);
		$countdata = $checkdata['count'] + 1;
		$res=mysql_query("UPDATE calon SET count=$countdata WHERE id = '$id' ") or die(mysql_error());

		return $res;
	}
		
	public function getCalon(){
		$que = mysql_query("SELECT gambar from calon");
		while($quedata = mysql_fetch_array($que)){
			$calon=array($quedata['gambar']);
		}
		
		return $calon;
		
	}

	
}

?>