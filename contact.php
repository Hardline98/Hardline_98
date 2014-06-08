<?php

if(isset($_COOKIE["session"])){
	$sCookie = $_COOKIE["session"];
}else{
	$sCookie = "";
}

if(isset($_COOKIE['session'])){
	$infos = "<li><a href='account.php?u=".strtolower($sCookie)."'>Account</a></li>\n
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
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="foundation/css/foundation.css" />
	<title>Hardline98 | Contact</title>
	<script>
		function closeAlertBox(){
			$(".alert-box").fadeOut("slow");
		}
	</script>
</head>
<body>

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
				<li class="active"><a href="contact.php">Contact</a></li>
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

<br/>
<center>
<form class="contactForm" action="scripts/contactSubmit.php" method="POST">
<table>
	<tr>
		<td class="tdRow">
			Forename:
		</td>
		<td class="tdRow">
			<input type="text" name="fname" class="contactFormInput" size="50" placeholder="e.g John" />
		</td>
	</tr>
	
	<tr>
		<td class="tdRow">
			<input type="hidden">
		</td>
		<td class="tdRow">
			<input type="hidden">
		</td>
	</tr>
	
	<tr>
		<td class="tdRow">
			Surname: 
		</td>
		<td class="tdRow">
			<input type="text" name="lname" class="contactFormInput" size="50" placeholder="e.g Smith" />
		</td>
	</tr>
	
	<tr>
		<td class="tdRow">
			<input type="hidden">
		</td>
		<td class="tdRow">
			<input type="hidden">
		</td>
	</tr>
	
	<tr>
		<td class="tdRow">
			E-Mail Address: 
		</td>
		<td class="tdRow">
			<input type="email" name="email" class="contactFormInput" size="50" placeholder="e.g example@example.com" />
		</td>
	</tr>
	
	<tr>
		<td class="tdRow">
			<input type="hidden">
		</td>
		<td class="tdRow">
			<input type="hidden">
		</td>
	</tr>
	
	<tr>
		<td class="tdRow">
			Mobile Number: 
		</td>
		<td class="tdRow">
			<input type="text" name="mob" class="contactFormInput" size="50" placeholder="e.g 07485618362" maxlength="11" />
		</td>
	</tr>
	
	<tr>
		<td class="tdRow">
			<input type="hidden">
		</td>
		<td class="tdRow">
			<input type="hidden">
		</td>
	</tr>
	
	<tr>
		<td class="tdRow">
			Home Address: 
		</td>
		<td class="tdRow">
			<input type="text" name="addr" class="contactFormInput" size="50" placeholder="e.g 27 Till Grove" />
		</td>
	</tr>
	
	<tr>
		<td class="tdRow">
			<input type="hidden">
		</td>
		<td class="tdRow">
			<input type="hidden">
		</td>
	</tr>
	
	<tr>
		<td>
			Reason:
		</td>
		<td>
			<select class="contactFormInputSelect" name="reas">
				<option value="">Select</option>
				<option value="GeneralInquiry">General Inquiry</option>
				<option value="Feedback">Feedback</option>
				<option value="Pre-Sales">Pre Sales</option>
				<option value="Technical">Technical</option>
			</select>
		</td>
	</tr>
	
	<tr>
		<td class="tdRow">
			<input type="hidden">
		</td>
		<td class="tdRow">
			<input type="hidden">
		</td>
	</tr>
	
	<tr>
		<td>
			Message: 
		</td>
		<td>
			<textarea name="msg" class="contactFormInputLarge" style="resize:none;" cols="50" rows="3" placeholder="Type your message here (500 Characters Max.)" maxlength="500"></textarea>
		</td>
	</tr>
</table>
<br />
	<input type="submit" class="submitBtn" style="height:25px; width:60px;" />
</form>
</center>
<script type="text/javascript" src="foundation/js/vendor/jquery.js"></script>
<script type="text/javascript" src="foundation/js/foundation/foundation.js"></script>
<script type="text/javascript" src="foundation/js/foundation/foundation.topbar.js"></script>
<script type="text/javascript" src="foundation/js/foundation/foundation.dropdown.js"></script>
<script>$(document).foundation();</script>

</body>
</html>