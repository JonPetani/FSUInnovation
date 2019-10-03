<!DOCTYPE html>
<html>
<head>
<title>Successful Login</title>
<link href='css/intern1.css' rel='stylesheet'/>
<link rel="icon" type="image/png" href="images/icon.png"/>
</head>
<body>
<center><a href="Home.php"><img id="fsu_logo" src="images/fsu_logo1.png" alt="FSU Logo"/></a></center>
<center>

<h1 style="font-size: 40px"><b>Login Successful</b></h1>
<?php
session_start();
$con = new PDO('mysql:host=sql208.byethost.com;dbname=b32_24537897_internsite;charset=utf8mb4','b32_24537897','Sayhello123');
$session_time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 1200;
if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
	header("location: SessionExpire.php");
$_SESSION['TimeLog'] = $session_time;
$FName = explode(' ',trim($_SESSION['InternName']));
$Name = $FName[0];
echo ("<h2>Welcome Back, " . $Name . "!</h2>");
header ("Content-typeL image/jpg");
echo $_SESSION['InternPhoto'];
?>

<h2>New User?</h2>
<p>&#8226; As a Intern, your main usage of this platform will be to find Members who are working on projects that both interest you and are related to your field of study/career</p>
<p>&#8226; To help you find the Members that best suite you, we offer a search service that lets you search for a given Member company based on key words that you input</p>
<p>&#8226; Additionally, you should keep your information up to date such as updating your resume to the latest version where possible so the Members know what skills you have</p>
<div style='background-color: #DCDCDC'><br/>
<h2 align=center>What to do with your account</h2>
<h3 align=center id='navh'>Options:</h3>
<ul type='none' id='nav'>
<li><a href='CompanyFind.php'>Search for Member Company to Work for</a></li>
<li><a href=''>View Members you are Currently Working for</a></li>
<li><a href='Nav.php'>View Services Available</a></li>
<li><a href='Home.php'>Return Home</a></li>
<li><a href='LogOut.php'>Logout</a></li><br/><br/>
</ul>
</div>
<br clear=both>
</center>
</body>
</html>