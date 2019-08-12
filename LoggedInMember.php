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
$FName = explode(' ',trim($_SESSION['ContactName']));
$Name = $FName[0];
echo ("<h2>Welcome Back " . $Name . "!</h2>");
$imagedata = $_SESSION['CompanyPicture'];
echo "<img src='data:image/jpeg;base64,<?php echo base64_encode($imagedata);?>' alt='profile image'/>"
?>
<h2>New User?</h2>
<p>If you are new, we suggest you look around our site to familiarize yourself with how we help students find your positions.</p>
<p>In general, the first thing you should do is start posting your jobs so that students can find what you have to offer and if it applies to their skill set.</p>
<h2 align=center>What to do with your account</h2>
<h3 align=center>Options</h3>
<ul type='none'>
<li style='margin-left:11.75%;'><a href=''>Post a Job</a></li>
<li><a href='AddKeywords.php'>Create some keywords to make your Company easier to find</a></li>
<li><a href='Nav.html'>View Services Available</a></li>
<li><a href='Home.html'>Return Home</a></li>
<li><a href='LogOut.php'>Logout</a></li>
</ul>
<br clear=both>
</body>
</html>