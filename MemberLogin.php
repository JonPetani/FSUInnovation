<!--Member Login Page, enter username + password>
<!--Main Developer: Jonathan Petani, Co-Collaborators: Jessica Grady, Simone McHugh-->
<!DOCTYPE html>
<html>
<head>
<title>Member Login Page</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='css/Intern.css' rel='stylesheet'/>
<link href='css/member_page.css' rel='stylesheet'/>
</head>
<body>

<?php
session_start();
   $con = new PDO('mysql:host=sql208.byethost.com;dbname=b32_24537897_internsite;charset=utf8mb4','b32_24537897','Sayhello123');
   $con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: LoggedInMember.php");
    exit;
    }
	unset($con);
	$page = "";
	if (isset($_GET['location']))
		$page = "MemberCheck.php?location=" . htmlspecialchars($_GET['location']);
	else 
		$page = "MemberCheck.php";
?>

<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo1.png" alt="FSU Logo"/></a>
<h1>Login</h1>
<div class='select'>
<h2 align=center>Log in as a Member Company</h3>
<div class="container">
			<form action="MemberCheck.php" method="post">
				<div class="row">
					<div class="col-25">
						<label for="Username">Username: </label>
					</div>
					<div class="col-75">
						<input type="text" name="Username" autocomplete="off" required autofocus>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="Password">Password: </label>
					</div>
					<div class="col-75">
						<input style='width:100%;height:6.5%;'type="password" name="Password" autocomplete="off" required>
					</div>					
				</div>
				
				<input id="submitButton" type="submit" value="Submit" style="float: left; margin-left: 80px; margin-top: 10px">

<br clear=both>
</div>
<footer>
<hr>
<address><strong>&copy;	Framingham State University Entreperenuer Innovation Center</strong></address>
</footer>
</body>
</html>