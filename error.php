<!DOCTYPE html>
<html>
<head>
<title>Hardline98 | Error</title>
<link rel="stylesheet" type="text/css" href="css/house.css">
</head>
<body>

<?php

session_start();

$err = $_GET['err'];

include_once("inc/page_head.inc");

if($err == 1){
	$errMsg = "Username or password were incorrect.";
}else if($err == 2){
	$errMsg = "Username not found, click <a href='login.php'>here to try again</a>.";
}else if($err == 3){
	$errMsg = "Username or password field was left empty.";
}else if($err == 4){
	$errMsg = "You are not not logged on. Login <a href='login.php'>here</a> or register <a href='client.php'>here</a>.";
}else if($err == 5){
	$errMsg = "Could not find package details in the database, please try again. <a href='prices.php'>Click here.</a>";
}else if($err == 6){
	$errMsg = "";
}else{
	$errMsg = "Could not determine the error.";
}

?>

	<div class="wMessage">
		<?php
			echo "<br/><br/>".$errMsg;
		?>
	</div>
</body>
<script src="js/main.js"></script>
</html>