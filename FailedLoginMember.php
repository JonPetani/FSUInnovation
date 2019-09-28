<!DOCTYPE html>
<html>
<head>
<title>Login Failed</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='css/Intern.css' rel='stylesheet'/>
</head>
<body>
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>FSU Innovation Internship Website</h1>
<div class='txt'>
<div id='error' align=center>
<img class = 'error' src='images/error.png' alt='error icon'/>
<h2>Member Login Failed</h2>
<img class = 'error' src='images/error.png' alt='error icon'/>
</div>
<p style='clear:both;'>Seems like there was a error logging in. This is usually caused by incorrect username and/or password input. To fix this, you should try to type these inputs correctly. Also your organization may not be registered with us yet and should create a account now using the link below.</p>
<?php
$page = "";
	if (isset($_GET['location']))
		$page = "MemberLogin.php?location=" . htmlspecialchars($_GET['location']);
	else 
		$page = "MemberLogin.php";
	unset($con);
?>
<div class='select'>
<h3 align=center>What would you like to do now?</h3>
<ul type=none>
<li style='margin-left:-2%;float:left;text-align:center;'><a href='<?php echo $page; ?>'>Try Logging in Again</a></li>
<li style='margin-left:3%;float:left;text-align:center;'><a href='register_member.php'>Otherwise, Create a Account Today</a></li>
</ul>
<br clear=both>
</div>
</div>
</html>