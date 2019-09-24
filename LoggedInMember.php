<!DOCTYPE html>
<html>
<head>
<title>Successful Login</title>
<link href='intern.css' rel='stylesheet'/>
<link rel="icon" type="image/png" href="images/icon.png"/>
</head>
<body>
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>Login Successful</h1>
<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
$session_time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 1200;
if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
	header("location: SessionExpire.php");
$_SESSION['TimeLog'] = $session_time;
$FName = explode(' ',trim($_SESSION['ContactName']));
$Name = $FName[0];
echo ("<h2>Welcome Back " . $Name . "!</h2>");
$imagedata = $_SESSION['CompanyPicture'];
echo "<img src='data:image/jpeg;base64,<?php echo base64_encode($imagedata);?>' alt='profile image'/>"
?>
<h2>New User?</h2>
<p>If you are new, we suggest you look around our site to familiarize yourself with how we help students find your positions.</p>
<p>In general, the first thing you should do is start posting your jobs so that students can find what you have to offer and if it applies to their skill set.</p>
<div style='background-color: #c6ecd9;'>
<h2 align=center>What to do with your account</h2>
<h3 align=center id='navh'>Options</h3>
<ul type='none' id='nav'>
<li><a href='RegisterJob.php'>Post a Job</a></li>
<li><a href='AppListMember.php'>View Intern Applications for Projects</a></li>
<li><a href='Projects.php'>View and Manage Projects listed</a>
<li><a href='AddKeywords.php'>Create some keywords to make your Company easier to find</a></li>
<li><a href='Nav.php'>View Services Available</a></li>
<li><a href='Home.php'>Return Home</a></li>
<li><a href='LogOut.php'>Logout</a></li>
</ul>
</div>
<br clear=both>
</body>
</html>