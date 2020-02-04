<html>
	<head>
	<title>Session Expired</title>
	<link rel="icon" type="image/png" href="images/icon.png"/>
	<link href='css/Intern1.css' rel='stylesheet'/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	</head>
	
	<body>
	<?php
		session_start();
		session_destroy();
		$_SESSION['loggedin'] = false;
		$_SESSION["UserType"] = "";
	?>	
		<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
		<h1><u style="text-decoration-color: gold">Login Expired</u></h1>
		
		<div class='txt'>
			<h2 align=center>You were logged out for being idle too long</h2>
			<p>In the future, make sure you stay active on the page as to not be logged out for inactivity.</p>
			<p>This is done for security reasons for your benefit.</p>
			<p>This feature only affects sensitive pages with content that should remain private to other users.</p>
</div>
<div class='select'>
<h3>Click the Link below to Login Again</h3>
<ul type=none>
<?php
echo"<li style='text-align:center;'><a href='Login.php?location=" . htmlspecialchars($_GET['location']) . "'>Log in</a></li>";
?>
</ul>
</div>
</html>