<!--Member Login Page, enter username + password>
<!--Main Developer: Jonathan Petani, Co-Collaborators: Jessica Grady, Simone McHugh-->
<!DOCTYPE html>
<html>
<head>
<title>Keyword Creator</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='Intern.css' rel='stylesheet'/>
<link href='member_page.css' rel='stylesheet'/>
</head>
<body>
<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
$con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$session_time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 1200;
if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
	header("location: SessionExpire.php");
$_SESSION['TimeLog'] = $session_time;
?>
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>Keyword Creator</h1>
<div class='select'>
<h2 align=center>Create New Keywords Related to Your Company</h2>
<p>This tool allows you to create your own keywords to help interns find your company. The process is simple. You write up several keywords below and it will be stored in our database. From then on, interns can type these in our search engine and your company will appear in a listing that interns can click on.</p>
<p>One thing to keep in mind is that a keyword is something that really related to what your company does and should not be arbitrary. Keywords that seem confusing and akward for students to make use of may be deleted to help save storage space.
<h3>Enter keywords in the field below for them to be added to the database.</h3>
<p>Seperate keywords/phrases with a slash (/) for the system to treat it as a seperate item.</p>
<div class="container">
			<form action="KeywordCreation.php" method="post">
				<div class="row">
					<div class="col-25">
						<label for="Keyword">Keyword(s)/Phrase(s): </label>
					</div>
					<div class="col-75">
						<textarea name="Keyword" style="height:100px" autocomplete="off" required></textarea>
					</div>
				</div>
					<div class="row">
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