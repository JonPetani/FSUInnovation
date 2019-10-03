<!DOCTYPE html>
<html>
	<head>
		<title>Login Failed</title>
		<link rel="stylesheet" href="css/Intern1.css">
		<link rel="icon" type="image/png" href="images/icon.png"/>
	</head>
	
	<body>
		<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo1.png" alt="FSU Logo"/></a>
		<h1>FSU Innovation Internship Website</h1>
		<div class='txt'>
			<div id='error' align=center>
				<img class = 'error' src='images/error.png' alt='error icon'></img>
				<h2 style="display: inline; margin: 1.5%">Intern Login Failed!</h2>
				<img class = 'error' src='images/error.png' alt='error icon'></img>
				</div><br/>
				
				<center><p>Seems like there was a error logging in. This is usually caused by incorrect username and/or password input.<br/> To fix this, you should try to type these inputs correctly. Also you may not have account with us yet and should register as a intern now using the link below.</p></center>
				<?php
				$page = "";
				if (isset($_GET['location']))
					$page = "InternLogin.php?location=" . htmlspecialchars($_GET['location']);
				else 
					$page = "InternLogin.php";
				unset($con);
				?>
				<div class='select'>
				<br/><h3 align=center>What would you like to do?</h3><br/>
				<a href='<?php echo $page; ?>'>Try Logging in Again</a>
				<a href='NewIntern.php'>Otherwise, Create an Account</a>
				<br clear=both>
			</div>
		</div>
	</body>
</html>