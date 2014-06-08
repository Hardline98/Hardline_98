<?php

//Start the session
session_start();

//Form fields
$cid = $_POST['cid'];
$pass = $_POST['pass'];
$cid_lower = strtolower($cid);

//Sql injection prevention
$cid = mysql_real_escape_string($cid);
$pass = mysql_real_escape_string($pass);

//Hashing
$enc = "sha512";
$pass = hash($enc,$pass);

require_once('../inc/db_con.php');

//Check the details
if(isset($cid) && isset($pass)){
	$sql = mysql_query("SELECT * FROM  `hardline`.`clients` WHERE cid =  '$cid'") or trigger_error(mysql_error().$sql);;
	$numrows = mysql_num_rows($sql);
	if($numrows != 0){
		while($rows = mysql_fetch_assoc($sql)){
			$db_client_id = $rows['cid'];
			$db_client_id_lower = strtolower($db_client_id);
			$db_password = $rows['password'];
			$fname = $rows['fname'];
			$lname = $rows['lname'];
		}
		if($cid_lower == $db_client_id_lower && $pass == $db_password){
			$cName = "session";
			$cExpire = time()+3600*24*7;
			setcookie("session",$db_client_id,$cExpire,"/");
			//print_r($_COOKIE);
			header('location:../index.php');
		}else{
			header('location:../error.php?err=1');
		}
	}else{
		header('location:../error.php?err=2');
	}
}else{
	header('location:../error.php?err=3');
}

?>