<!DOCTYPE html>
<html>
<head>
<title>Account is Verified</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='css/Intern.css' rel='stylesheet'/>
</head>
<body>
<?php
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
$sql = $con -> query("UPDATE AccountVerified");
?>
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>FSU Innovation Internship Website</h1>
<div class='txt'>
<h2 align=center>Successful Verification of Account</h2>
<p>Your account has been verified. This means that you can now log in to your new account.</p>
<div class='select'>
<h3 align=center>What to do next</h3>
<ul type=none>
<li style='margin-left:-8%;float:left;text-align:center;'><a href='Login.php'>Try Logging in to your new account</a></li>
<li style='margin-left:-3%;float:left;text-align:center;'><a href='Home.php'>Otherwise, Return to Homepage</a></li>
</ul>
<br clear=both>
</div>
</div>
</html>