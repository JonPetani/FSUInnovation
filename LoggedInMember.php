<html>
<head>
<title>Successful Login</title>
<link href='intern.css' rel='stylesheet'/>
<link rel="icon" type="image/png" href="images/icon.png"/>
</head>
<body>
<h1>Login Successful</h1>
<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
$Member_Name = ($con -> query("SELECT ContactName FROM member WHERE MemberId = ?")).split()[0];
echo ("<h2>Welcome Back " . $Member_Name . "!</h2>");
$id = $_GET['MemberId'];
mysql_select_db("dvddb");
$sql = "SELECT CompanyPicture FROM member WHERE MemberId=$id";
$result = mysql_query("$sql");
$row = mysql_fetch_assoc($result);
mysql_close($link);
header("Content-type: image/jpeg");
echo $row['CompanyPicture'];
?>
<div class='txt'>
<h2>New User?</h2>
<p>If you are new, we suggest you look around our site to familiarize yourself with how we help students find your positions.</p>
<p>In general, the first thing you should do is start posting your jobs so that students can find what you have to offer and if it applies to their skill set.</p>
<h2 align=center>What to do with your account</h2>
<div class='select'>
<h3 align=center>Options</h3>
<ul type='none'>
<li style='margin-left:11.75%;'><a href=''>Post a Job</a></li>
<li><a href='Nav.html'>View Services Available</a></li>
<li><a href='Home.html'>Return Home</a></li>
<li><a href='LogOut.php'>Logout</a></li>
</ul>
<br clear=both>
</div>
</div>
</body>
</html>