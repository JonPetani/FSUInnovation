<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Private Message Board</title>
		<link rel="icon" type="image/png" href="images/icon.png"/>
		<!-- <link href='css/Intern.css' rel='stylesheet'/>  -->
		<link href='css/Intern1.css' rel='stylesheet'/>
		<link href='css/member_page.css' rel='stylesheet'/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
	</head>
		<body>
		<?php
		session_start();
		$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
		$views = $con -> query("SELECT * FROM privateconversations WHERE ConversationId = '$_GET[pm]'");
		$v = $views -> fetch(PDO::FETCH_ASSOC);
		$viewnum = (int)$v['Views'] + 1;
		$incr = $con -> query("UPDATE privateconversations SET Views = '$viewnum' WHERE ConversationId = '$_GET[pm]'");
		?>
		<p id="top"></p>
		<div id='links'>
			<a href='Home.php'>Home</a>
			<a href="https://www.framingham.edu" target="_blank" style="margin-left: 30px">Framingham.edu</a>
			<a href='Login.php' style="margin-right: 30px;float: right;" id = 'si'>Sign In</a>
			<a href='RegisterHub.php' style="margin-right: 30px;float: right;"id = 'su'>Sign Up</a>
			<h1>Private Message Room</h1>
			<hr color="#FFC400" clear=both>
		<br><a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
		<h1>Messages &nbsp;<img src="images/Logo.jpg" height="60px" width="100px" style="border: solid; margin-top: 2%"></img></h1>
		<form action="PostPM.php" method="post">
		<label for="PMPost"></label>
		<input type="text" name="PMPost" autocomplete="off" required />
		</form>
		</body>
		</html>