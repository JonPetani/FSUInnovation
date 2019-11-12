<!DOCTYPE html>
<html>
<head>
<title>Retrieval Email Sent</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='css/Intern.css' rel='stylesheet'/>
</head>
<body>
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>FSU Innovation Internship Website</h1>
<div class='txt'>
<?php
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
if(isset($_POST['Email'])) {
$sql = $con -> query("SELECT * FROM member WHERE ContactEmail = '$_POST[Email]'");
$sql2 = $con -> query("SELECT * FROM intern WHERE EmailAddress = '$_POST[Email]'");
if($sql->rowCount() == 0 and $sql2->rowCount() == 0) {
	echo"<h2 align=center>Email Not Found</h2>";
	echo"<p>The email address provided does not match the account to be verified. Make sure you wrote the email address of the account correctly before trying again.</p>";
	echo"<div class=select>";
	echo"<h3 align=center>Best Options Next</h3>";
	echo"<ul type=none>";
	echo"<li style='margin-left:-8%;float:left;text-align:center;'><a href='EmailEntry.php'>Try Entering the Email Address Again</a></li>";
	echo"<li style='margin-left:-3%;float:left;text-align:center;'><a href=''>Contact our Platform Support Team for Help</a></li>";
}
else {	
$sql3 = $con -> query("UPDATE intern SET AccountVerified = 1 WHERE EmailAddress = '$_POST[Email]'");
$sql4 = $con -> query("UPDATE member SET AccountVerified = 1 WHERE ContactEmail = '$_POST[Email]'");
echo "<h2 align=center>Registration Successful</h2>";
echo "<p>Welcome to our Website. Now that you are now registered and verified, we hope you will find our site useful whether you are a intern or a representative of a company.</p>";
echo "<div class='select'>";
echo "<h3 align=center>What to do next</h3>";
echo "<ul type=none>";
echo "<li style='margin-left:-8%;float:left;text-align:center;'><a href='Login.php'>Try Logging in to your new account</a></li>";
echo "<li style='margin-left:-3%;float:left;text-align:center;'><a href='Home.php'>Otherwise, Return to Homepage</a></li>";
}
}
?>
</ul>
<br clear=both>
</div>
</div>
</body>
</html>