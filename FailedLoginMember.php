<!DOCTYPE html>
<html>
	<head>
	<title>Login Failed</title>
	<link rel="icon" type="image/png" href="images/icon.png"/>
	<link rel="stylesheet" href="css/Intern1.css">
	</head>
	
	<body>
		<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo1.png" alt="FSU Logo"/></a>
		<h1>FSU Innovation Internship Website</h1>
		<div class='txt'>
			<div id='error' align=center>
			<img class = 'error' src='images/error.png' alt='error icon'/>
			<h2 style="display: inline; margin: 1.5%">Member Login Failed!</h2>
			<img class = 'error' src='images/error.png' alt='error icon'/>
			</div><br/>
			
			<center><p style='clear:both;'>Seems like there was a error logging in. This is usually caused by incorrect username and/or password input. To fix this, you should try to type these inputs correctly. Also your organization may not be registered with us yet and should create a account now using the link below.</p></center>
			
			<div class='select'>
				<h3 align=center>What would you like to do now?</h3><br/>
				<a href='MemberLogin.php'>Try Logging in Again</a>
				<a href='register_member.php'>Otherwise, Create a Account Today</a>
				<br clear=both>
			</div>
		</div>
	</body>
</html>