<?php

if(isset($_COOKIE["session"])){
	$sCookie = $_COOKIE["session"];
}else{
	$sCookie = "";
}

if(isset($_COOKIE['session'])){
	$infos = "<li class='active'><a href='account.php'>Account</a></li>\n
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
if(isset($_COOKIE['session'])){
	$page =
	"
	
	
	
	";
}else{
	$page =
	"
	
	<div class='contactForm'>
	<center>
		<form action='scripts/createAccount.php' method='POST'>
			<table>
				<tr>
					<td>
						Forname<span class='formRequired' title='This field is required.'>*</span>: 
					</td>
					<td>
						<input type='text' value='' class='contactFormInput' name='fname' size='50' placeholder='e.g John'/>
					</td>
				</tr>
				
				<tr>
					<td>
						Surname (Optional): 
					</td>
					<td>
						<input type='text' value='' class='contactFormInput' name='lname' size='50' placeholder='e.g Smith' />
					</td>
				</tr>
				
				<tr>
					<td>
						E-Mail Address<span class='formRequired' title='This field is required.'>*</span>: 
					</td>
					<td>
						<input type='email' value='' class='contactFormInput' name='email' size='50' placeholder='e.g example@example.com' />
					</td>
				</tr>
				
				<tr>
					<td>
						Minecraft Name<span class='formRequired' title='This field is required.'>*</span>:
					</td>
					<td>
						<input type='text' value='' class='contactFormInput' name='cid' size='50' placeholder='e.g Hardline_98' />
					</td>
				</tr>
				
				<tr>
					<td>
						Password<span class='formRequired' title='This field is required.'>*</span>:
					</td>
					<td>
						<input type='password' value='' class='contactFormInput' name='pass' size='50' placeholder='This will be securely stored' />
					</td>
				</tr>

			<table>
			<br /><input type='submit' class='submitBtn' value='Submit' style='height:25px; width:60px;' />
		</form>
	</center>
	</div>
	<div class='sideNote'>
		Already have an account? Login <a href='login.php'>here</a>!
	</div>
	
	";
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="foundation/css/foundation.css" />
	<title>Hardline98 | Client Area</title>
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

<br/>
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