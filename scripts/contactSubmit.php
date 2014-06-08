<?php

//Form inputs
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$mob = $_POST['mob'];
$addr = $_POST['addr'];
$cid = $_POST['cid'];
$pass = $_POST['pass'];
$reas = $_POST['reas'];
$msg = $_POST['msg'];
echo "Password: ".$pass;
//Checking for empty fields
if($fname == ""){
	header('location:../contact.php');
}else if($lname == ""){
	header('location:../contact.php');
}else if($email == ""){
	header('location:../contact.php');
}else if($mob == ""){
	header('location:../contact.php');
}else if($addr == ""){
	header('location:../contact.php');
}else if($reas == ""){
	header('location:../contact.php');
}else if($msg == ""){
	header('location:../contact.php');
}else{
	//SQL injection-proofing
	$fname = mysql_real_escape_string($fname);
	$lname = mysql_real_escape_string($lname);
	$email = mysql_real_escape_string($email);
	$mob = mysql_real_escape_string($mob);
	$addr = mysql_real_escape_string($addr);
	$reas = mysql_real_escape_string($reas);
	$msg = mysql_real_escape_string($msg);
	echo "<br />Password: ".$pass;
	
	
	//Inserting into the database
	require_once('../inc/db_con.php');
	if(!$con){
		die('Could not connect '.mysql_error());
	}else{
		$sql = "INSERT INTO `site`.`contact` (`fname`,`lname`,`mobile`,`email`,`address`,`reas`,`msg`)
		VALUES
		('$fname','$lname','$email','$mob','$addr','$reas','$msg')";
		echo "<br/>Done!";
	}
	$result = mysql_query($sql,$con);
	header('location:../index.php');
}
?>
