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
$sql = $con -> query("SELECT * FROM emailtemp WHERE EmailAddress = '$_POST[EmailNew]' AND WHERE OriginalEmail = '$_POST[EmailOld]'");
if($sql->rowCount() == 0) {
	echo"<h2 align=center>Email Doesn't Match</h2>";
	echo"<p>The email address provided does not match the one you requested. Make sure you wrote the email address of the account correctly before trying again.</p>";
	echo"<div class=select>";
	echo"<h3 align=center>Best Options Next</h3>";
	echo"<ul type=none>";
	echo"<li style='margin-left:-8%;float:left;text-align:center;'><a href='BotCheckEmail.php'>Try Entering the Email Address Again</a></li>";
	echo"<li style='margin-left:-3%;float:left;text-align:center;'><a href=''>Contact our Platform Support Team for Help</a></li>";
}
else {	
$sql2 = $con -> query("UPDATE intern SET EmailAddress = '$_POST[EmailNew]' WHERE EmailAddress = '$_POST[EmailOld]'");
$sql3 = $con -> query("UPDATE member SET ContactEmail = '$_POST[EmailNew]' WHERE ContactEmail = '$_POST[EmailOld]'");
$sql4 = $con -> query("DELETE FROM emailtemp WHERE EmailAddress = '$_POST[EmailNew]'");
echo "<h2 align=center>Email Address Change Successful</h2>";
echo "<p>Your New Email Address is now Verified and is ready to use for communicating with Interns and Members.</p>";
echo "<div class='select'>";
echo "<h3 align=center>What to do next</h3>";
echo "<ul type=none>";
echo "<li style='margin-left:-8%;float:left;text-align:center;'><a href='UserControlPanel.php'>Return to Your User Control Panel</a></li>";
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