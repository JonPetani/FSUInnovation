<!--The Navagation Page of the Intern Webiste. Provides links to all pages on the website.-->
<!--Main Developer: Jonathan Petani, Co-Collaborators: Jessica Grady, Simone McHugh-->
<!DOCTYPE html>
<html>
<head>
<title>User Control Panel</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='css/Intern1.css' rel='stylesheet'/>
</head>
<body align=center>
<p id="top"></p>
		<div id='links'>
			<a href='Home.php'>Home</a>
			<a href="https://www.framingham.edu" target="_blank" style="margin-left: 30px">Framingham.edu</a>
			<a href='Login.php' id="su" style="margin-right: 30px;float: right;">Sign In</a>
			<a href='RegisterHub.php' id="si" style="margin-right: 30px;float: right;">Sign Up</a>
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
					echo "<a href='LogOut.php'><img src='images/PowerOpen.png' class='accounts' onmouseover='this.src=\"images/PowerPressed.png\";' onmouseout='this.src=\"images/PowerOpen.png\";' alt='Log Out Tab'/>";
					echo "<a href='UserControlPanel.php'><img src='images/GearOff.png' class='accounts' onmouseover='this.src=\"images/GearOn.png\";' onmouseout='this.src=\"images/GearOff.png\";' alt='Account Tab'/>";
					echo "<a href='PrivateMessageBoard.php'><img src='images/PM.png' class='accounts' onmouseover='this.src=\"images/PMOpen.png\";' onmouseout='this.src=\"images/PM.png\";' onclick='' alt='Private Messages'/></a>";
					}
				else if($_SESSION['UserType'] == "Intern") {
					echo "<script>";
					echo "var parent = document.getElementById('links');";
					echo "var child1 = document.getElementById('su');";
					echo "var child2 = document.getElementById('si');";
					echo "parent.removeChild(child1);";
					echo "parent.removeChild(child2);";
					echo "</script>";
					echo "<a href='LogOut.php'><img src='images/PowerOpen.png' class='accounts' onmouseover='this.src=\"images/PowerPressed.png\";' onmouseout='this.src=\"images/PowerOpen.png\";' alt='Log Out Tab'/>";
					echo "<a href='UserControlPanel.php'><img src='images/GearOff.png' class='accounts' onmouseover='this.src=\"images/GearOn.png\";' onmouseout='this.src=\"images/GearOff.png\";' alt='Account Tab'/>";
					echo "<a href='PrivateMessageBoard.php'><img src='images/PM.png' class='accounts' onmouseover='this.src=\"images/PMOpen.png\";' onmouseout='this.src=\"images/PM.png\";' onclick='' alt='Private Messages'/></a>";
					}
			}
		}
		$logged_in_page;
		$photo;
		$email;
		$name;
		if (!isset($_SESSION['UserType'])) {
			header("Location: AccessDenied.php");
		}
		else {
			if ($_SESSION['UserType'] == "Member") {
				$logged_in_page = "LoggedInMember.php";
				$photo = $_SESSION['CompanyPicture'];
				$email = $_SESSION['ContactEmail'];
				$name = $_SESSION['ContactName'];
			}
			else if ($_SESSION['UserType'] == "Intern") {
				$logged_in_page = "LoggedInIntern.php";
				$photo = $_SESSION['InternPhoto'];
				$email = $_SESSION['EmailAddress'];
				$name = $_SESSION['InternName'];
			}
		}
		$username = $_SESSION['Username'];
?>
		</div>
		<hr color="#FFC400">
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>User Control Panel</h1>
<div class='txt'>
<h2 align=center >Account Overview</h2>
<?php
echo "<h3 align=center >" . $name . "</h3>";
echo "<div align=center >";
echo "<img src='" . $photo . "' alt='Comp Pic' />";
echo "</div>";
echo "<h3 align=center >" . $username . "</h3>";
echo "<h3 align=center >" . $email . "</h3>";
?>
</div>
<h2>Account Info</h2>
<ul type=none id='nav'>
<li><a href='<?php echo $logged_in_page; ?>'>User Page</a></li>
<li><a href='EditProfile.php'>Edit Your Profile</a></li>
<li><a href='Contacts.php'>View and Edit Contacts You Have Added</li>
</ul>
<footer>
<hr>
<address><strong>&copy;	Framingham State University Entreperenuer Innovation Center</strong></address>
</footer>
</body>
</html>