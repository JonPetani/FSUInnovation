<!--Member Login Page, enter username + password>
<!--Main Developer: Jonathan Petani, Brian Perel Co-Collaborators: Jessica Grady, Simone McHugh-->
<!DOCTYPE html>
<html>
<head>
<title>Intern Login Page</title>
<link href='css/Intern1.css' rel='stylesheet'/>
<link href='css/member_page.css' rel='stylesheet'/>
<link rel="icon" type="image/png" href="images/icon.png"/>
</head>
<body>
		<div id='links'>
			<a href='Home.php'>Home</a>
			<a href="https://www.framingham.edu" target="_blank" style="margin-left: 30px">Framingham.edu</a>
			<a href='Login.php' style="margin-right: 30px;float: right;" id = 'si'>Sign In</a>
			<a href='RegisterHub.php' style="margin-right: 30px;float: right;"id = 'su'>Sign Up</a>
			</div>
<?php
session_start();
   $con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
   $con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: LoggedInIntern.php");
    exit;
    }
	$page = "";
	if (isset($_GET['location']))
		$page = "InternCheck.php?location=" . htmlspecialchars($_GET['location']);
	else 
		$page = "InternCheck.php";
	unset($con);
?>
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>Login</h1>
<div class='select'>
<h2 align=center>Log in as a Student Intern</h3>
<div class="container">
			<form action="<?php echo $page; ?>" method="post">
				<div class="row">
					<div class="col-25">
						<label for="Username">Username: </label>
					</div>
					<div class="col-75">
						<input type="text" name="Username" placeholder="Enter Username" autocomplete="off" required autofocus>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="Password">Password: </label>
					</div>
					<div class="col-75">
						<input style='width:100%;height:6.5%;'type="password" placeholder="Enter Password" name="Password" autocomplete="off" required>
					</div>
					<div class="row">
					<div class="col-25">
						<a href='EmailEntry.php'><label>I Forgot my Username/Password</label></a>
					</div>
					<input id="submitButton" type="submit" value="Submit">
				</div>
				</div>
<br clear=both>
</div>
<footer>
<hr>
<address><strong>&copy;	Framingham State University Entreperenuer Innovation Center</strong></address>
</footer>
</body>
</html>