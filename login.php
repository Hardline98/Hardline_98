<?php

if(isset($_COOKIE["session"])){
	$sCookie = $_COOKIE["session"];
}else{
	$sCookie = "";
}

if(isset($_COOKIE['session'])){
	$infos = "<li><a href='account.php?".strtolower($sCookie)."'>Account</a></li>\n
	<li><a href='client.php'>Client Area</a></li>\n
	<li><a href='contact.php'>Contact Us</a></li>\n
	<li><a href='scripts/logout.php'>Sign Out</a></li>\n";
	$isLoggedInInfos = '<li class="divider"></li>
						<li class="name"><a href="account.php?u='.strtolower($sCookie).'">'.$sCookie.'</a></li>
						<li class="divider"></li>
						<li> </li>';
}else{
	$infos = "<li class='active'><a href='login.php'>Login</a></li>\n
	<li><a href='client.php'>Sign Up</a></li>\n";
	$isLoggedInInfos = "";
}
if(isset($_COOKIE['session'])){
	$page = header("location:client.php");
}else{
	$page =
	"
	
	<br/><br/>
	<div class='contactForm'>
	<center>
		<form action='scripts/login.php' method='POST'>
			<table>
				<tr>
					<td>
						Minecraft Name:
					</td>
					<td>
						<input type='text' class='contactFormInput' name='cid' size='50' placeholder='The username you created' />
					</td>
				</tr>
				
				<tr>
					<td>
						Password:
					</td>
					<td>
						<input type='password' class='contactFormInput' name='pass' size='50' placeholder='The password you created' />
					</td>
			</table>
			<br /><input type='submit' value='Login!' class='submitBtn' style='height:25px; width:60px;' /><br/>
		</form>
	</center>
	</div>
	<br/>
	<div class='sideNote'>
		<center>Back to the register form? Click <a href='client.php'>here</a>!</center>
	</div>
	
	";
}

//Check the account
require_once('inc/db_con.php');
if(isset($_COOKIE['session'])){
	$sql = mysql_query("SELECT * FROM  `hardline`.`clients` WHERE cid LIKE '%$sCookie%'") or trigger_error(mysql_error().$sql);;
	$numrows = mysql_num_rows($sql);
	if($numrows != 0){
		while($rows = mysql_fetch_assoc($sql)){
			$db_client_id = $rows['cid'];
			$db_active = $rows['active'];
		}
		if($db_active == 0){
			$alert = '<br/><div data-alert class="alert-box warning" style="margin-left:100px;margin-right:100px;">
			You have not yet validated your account. If you did not receive your email, click <a class="specialAnchor" href="#">here</a>.
			<a href="#" onclick="closeAlertBox()" class="close">&times;</a>
			</div>';
		}
	}else{
		$alert = '<br/><div data-alert class="alert-box" style="margin-left:100px;margin-right:100px;">
		There was a serious database error, please reload and try again!
		<a href="#" onclick="closeAlertBox()" class="close">&times;</a>
		</div>';
	}
}else{
	$alert = "";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Hardline98 | Login</title>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
	<script>
		function closeAlertBox(){
			$(".alert-box").fadeOut("slow");
		}
	</script>
</head>
<body>

<?php

include_once('inc/page_head.inc');

?>

<div class="fixed">
	<nav class="top-bar" data-topbar>
		<ul class="title-area">
			<li class="name">
				<h1><a href="#"><img src="images/face.png">&nbsp;&nbsp;Hardline98's Website</a></h1>
				<li class="divider"></li>
			</li>
		</ul>
		<section class="top-bar-section">
			<ul class="right">
				<?php echo $isLoggedInInfos; ?>
				<li><a href="index.php">Home</a></li>
				<li class="divider"></li>
				<li><a href="contact.php">Contact</a></li>
				<li class="divider"></li>
				<li><a href="videos.php">Videos</a></li>
				<li class="divider"></li>
				<li><a href="about.php">About</a></li>
				<li class="divider"></li>
				<li><a href="forum.php">Forums</a></li>
				<li class="divider"></li>
				<li class="has-dropdown">
				<a href="#">Account</a>
				<ul class="dropdown">
					<?php echo $infos; ?>
				</ul>
				</li>
				<li class="divider"></li>
			</ul>
		</section>
	</nav>
</div>
<?php echo $alert; ?>

<?php

	echo $page;

?>
<script type="text/javascript" src="foundation/js/vendor/jquery.js"></script>
<script type="text/javascript" src="foundation/js/foundation/foundation.js"></script>
<script type="text/javascript" src="foundation/js/foundation/foundation.topbar.js"></script>
<script type="text/javascript" src="foundation/js/foundation/foundation.dropdown.js"></script>
<script>$(document).foundation();</script>
</body>
</html>