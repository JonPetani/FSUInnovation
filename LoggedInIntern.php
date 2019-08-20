<!DOCTYPE html>
<html>
<head>
<title>Successful Login</title>
<link href='intern.css' rel='stylesheet'/>
<link rel="icon" type="image/png" href="images/icon.png"/>
</head>
<body>
<a href="Home.html"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>Login Successful</h1>
<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
$FName = explode(' ',trim($_SESSION['InternName']));
$Name = $FName[0];
echo ("<h2>Welcome Back " . $Name . "!</h2>");
header ("Content-typeL image/jpg");
echo $_SESSION['InternPhoto'];
?>
<h2>New User?</h2>
<p>As a Intern, your main usage of this platform will be to find Members who are working on projects that both interest you and are related to your field of study/career.</p>
<p>To help you find the Members that best suite you, we offer a search service that lets you search for a given Member company based on key words that you input.</p>
<p>Additionally, you should keep your information up to date such as updating your resume to the latest version where possible so the Members know what skills you have.</p>
<div style='background-color: #c6ecd9;'>
<h2 align=center>What to do with your account</h2>
<h3 align=center id='navh'>Options</h3>
<ul type='none' id='nav'>
<li><a href='CompanyFind.php'>Search for Member Company to Work for</a></li>
<li><a href=''>View Members you are Currently Working for</a></li>
<li><a href='Nav.html'>View Services Available</a></li>
<li><a href='Home.html'>Return Home</a></li>
<li><a href='LogOut.php'>Logout</a></li>
</ul>
</div>
<br clear=both>
</body>
</html>