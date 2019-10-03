<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Private Message Board</title>
		<link rel="icon" type="image/png" href="images/icon.png"/>
		<!-- <link href='css/Intern.css' rel='stylesheet'/>  -->
		<link href='css/Intern1.css' rel='stylesheet'/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
	</head>
		<body>
		<p id="top"></p>
		<div id='links'>
			<a href='Home.php'>Home</a>
			<a href="https://www.framingham.edu" target="_blank" style="margin-left: 30px">Framingham.edu</a>
			<a href='Login.php' style="margin-right: 30px;float: right;" id = 'si'>Sign In</a>
			<a href='RegisterHub.php' style="margin-right: 30px;float: right;"id = 'su'>Sign Up</a>
		<?php
		session_start();
		if(isset($_SESSION['loggedin'])) {
			if($_SESSION['loggedin'] == true) {
				$session_time = $_SERVER['REQUEST_TIME'];
				$timeout_duration = 1200;
				if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
					header("Location:SessionExpire.php?location=" . urlencode($_SERVER['REQUEST_URI']));
				$_SESSION['TimeLog'] = $session_time;
				if($_SESSION['UserType'] == "Member") {
					echo "<script>";
					echo "var parent = document.getElementById('links');";
					echo "var child1 = document.getElementById('su');";
					echo "var child2 = document.getElementById('si');";
					echo "parent.removeChild(child1);";
					echo "parent.removeChild(child2);";
					echo "</script>";
					echo "<img src='images/PowerOpen.png' class='accounts' onmouseover='this.src=\"images/PowerPressed.png\";' onmouseout='this.src=\"images/PowerOpen.png\";' alt='Account Tab'/>";
					echo "<a href='PrivateMessageBoard.php'><img src='images/PM.png' class='accounts' onmouseover='this.src=\"images/PMOpen.png\";' onmouseout='this.src=\"images/PM.png\";' alt='Private Messages'/></a>";
					}
				else if($_SESSION['UserType'] == "Intern") {
					echo "<script>";
					echo "var parent = document.getElementById('links');";
					echo "var child1 = document.getElementById('su');";
					echo "var child2 = document.getElementById('si');";
					echo "parent.removeChild(child1);";
					echo "parent.removeChild(child2);";
					echo "</script>";
					echo "<img src='images/PowerOpen.png' class='accounts' onmouseover='this.src=\"images/PowerPressed.png\";' onmouseout='this.src=\"images/PowerOpen.png\";' alt='Account Tab'/>";
					echo "<a href='PrivateMessageBoard.php'><img src='images/PM.png' class='accounts' onmouseover='this.src=\"images/PMOpen.png\";' onmouseout='this.src=\"images/PM.png\";' alt='Private Messages'/></a>";
					}
			}
		}
		
?>
</div>
		<hr color="#FFC400" clear=both>

		<br><a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
		<h1>Private Message Board &nbsp;<img src="images/Logo.jpg" height="60px" width="100px" style="border: solid; margin-top: 2%"></img></h1>
		<div class='txt'>
		<h2>View and Create Private Conversations Here</h2>
		<p>Private Messages will only be seen by you and recipients.</p>
		<p>Members of the conversation may invite other users.</p>
		<h2>Below are all private messages you are a part of</h2>
		<?php
		$email = "";
		if(isset($_SESSION['UserType'])) {
			if ($_SESSION['UserType'] == "Intern")
					$email = $_SESSION['EmailAddress'];
			else if($_SESSION['UserType'] == "Member")
					$email = $_SESSION['ContactEmail'];
		    else
					header("Location: Login.php?location=" . urlencode($_SERVER['REQUEST_URI']));
		}
		$sql = query("SELECT * FROM privatemessageboards WHERE Email = $email AND Username = '$_SESSION[Username]'");
		
		?>
		<h2>Don't can't find a conversation? Create a New One Here</h2>
		<form action='PrivateMessageCreate.php'>
		</form>
		</div>