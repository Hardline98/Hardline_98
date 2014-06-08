<?php

if(isset($_COOKIE["session"])){
	$sCookie = $_COOKIE["session"];
}else{
	$sCookie = "";
}
session_start();

if(isset($_COOKIE['session'])){
	$infos = "<li><a href='account.php'>Account</a></li>\n
	<li><a href='client.php'>Client Area</a></li>\n
	<li><a href='contact.php'>Contact Us</a></li>\n
	<li><a href='scripts/logout.php'>Sign Out</a></li>\n";
	$isLoggedInInfos = '<li class="divider"></li>
						<li class="name"><a href="account.php?u='.strtolower($sCookie).'">'.$sCookie.'</a></li>
						<li class="divider"></li>
						<li> </li>';
}else{
	$infos = "<li><a href='login.php'>Login</a></li>\n
	<li><a href='client.php'>Sign Up</a></li>\n";
	$isLoggedInInfos = "";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="foundation/css/foundation.css" />
	<title>Hardline98 | Home</title>
</head>
<body>

<?php include_once('inc/page_head.inc'); ?>

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
				<li class="active"><a href="index.php">Home</a></li>
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
<?php //print_r($_COOKIE); ?>

<script type="text/javascript" src="foundation/js/vendor/jquery.js"></script>
<script type="text/javascript" src="foundation/js/foundation/foundation.js"></script>
<script type="text/javascript" src="foundation/js/foundation/foundation.topbar.js"></script>
<script type="text/javascript" src="foundation/js/foundation/foundation.dropdown.js"></script>
<script>$(document).foundation();</script>
</body>
</html>