<?php
//Form inputs
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$cid = $_POST['cid'];
$pass = $_POST['pass'];

//Checking for empty fields
if($fname == ""){
	header('location:../client.php');
	die('Forename field empty');
}else if($lname == ""){
	header('location:../client.php');
	die('Surname field empty');
}else if($email == ""){
	header('location:../client.php');
	die('E-Mail field empty');
}else if($cid == ""){
	header('location:../client.php');
	die('Client ID field empty');
}else if($pass == ""){
	header('location:../client.php');
	die('Password field empty');
}else{
	//SQL injection-proofing
	$fname = mysql_real_escape_string($fname);
	$lname = mysql_real_escape_string($lname);
	$email = mysql_real_escape_string($email);
	$cid = mysql_real_escape_string($cid);
	$pass = mysql_real_escape_string($pass);
	
	//Hashing
	$enc = "sha512";
	$pass = $pass;
	$pass = hash($enc,$pass);
	
	//Inserting into the database
	require_once('../inc/db_con.php');
	if(!$con){
		die('Could not connect '.mysql_error());
	}else{
		$sql = "INSERT INTO `hardline`.`clients` (`id`, `fname`, `lname`, `email`, `cid`, `password`) 
		VALUES
		(NULL, '".$fname."', '".$lname."', '".$email."', '".$cid."', '".$pass."')";
		echo "<br/>Done!";
	}
	$result = mysql_query($sql,$con);
	header('location:../index.php');
}
?>