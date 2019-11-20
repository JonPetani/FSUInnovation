<!DOCTYPE html>
<html>
<head>
<title>Successful Login</title>
<link href='intern.css' rel='stylesheet'/>
<link rel="icon" type="image/png" href="images/icon.png"/>
</head>
<body>
<a href="css/Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>Login Successful</h1>
<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
$session_time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 1200;
if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
	header("location: SessionExpire.php");
$_SESSION['TimeLog'] = $session_time;
$FName = explode(' ',trim($_SESSION['InternName']));
$Name = $FName[0];
echo ("<h2>Welcome Back " . $Name . "!</h2>");
?>
<img src="<?php echo $_SESSION['InternPhoto']?>" width='250' height='300' alt='profile picture'/>
<h2>New User?</h2>
<p>As a Intern, your main usage of this platform will be to find Members who are working on projects that both interest you and are related to your field of study/career.</p>
<p>To help you find the Members that best suite you, we offer a search service that lets you search for a given Member company based on key words that you input.</p>
<p>Additionally, you should keep your information up to date such as updating your resume to the latest version where possible so the Members know what skills you have.</p>
<div style='background-color: #c6ecd9;'>
<h2 align=center>What to do with your account</h2>
<h3 align=center id='navh'>Options</h3>
<ul type='none' id='nav'>
<li><a href='AllProjects.php'>Find Projects that Suit you at the Center</a></li>
<li><a href='CompanyFind.php'>Search for Member Companies at the Center</a></li>
<li><a href=''>View Members you are Currently Working for</a></li>
<li><a href='Nav.php'>View Services Available</a></li>
<li><a href='Home.php'>Return Home</a></li>
<li><a href='LogOut.php'>Logout</a></li>
</ul>
</div>
<br clear=both>
</body>
</html>