<!DOCTYPE html>
<html>
<head>
<title>Successful Register</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='css/Intern.css' rel='stylesheet'/>
</head>
<body>
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>FSU Innovation Internship Website</h1>
<div class='txt'>
<?php
if(isset($_GET['error'])) {
	switch($_GET['error']) {
		case "0AuthFail":
		echo "<div align=center style='font-family:Perpetua;background-color:yellow;border: red 2px dashed'>";
		echo "<img class = 'error' style='padding-top: 5px;' src='images/error.png' alt='error icon'/>";
		echo "<h2 align=center>Error</h2>";
		echo "<p>Your Dropbox Authentication Failed, You Will Need to Verify Your Dropbox Account Again</p>";
		echo "<a href='https://www.dropbox.com/oauth2/authorize?client_id=4s9vxyownku3sp2&response_type=code&redirect_uri=http://localhost:8080/FSUInnovation/TokenAndResumeUpload.php'>Click This Link To Try Again</a>";
		echo "</div>";
		break;
		
		case "TokenGetFail":
		echo "<div align=center style='font-family:Perpetua;background-color:yellow;border: red 2px dashed'>";
		echo "<img class = 'error' style='padding-top: 5px;' src='images/error.png' alt='error icon'/>";
		echo "<h2 align=center>Error</h2>";
		echo "<p>Your Dropbox Authentication Was OK, but we were not able to get the needed code from them permitting you to actually send and recieve files</p>";
		echo "<a href='ResumeUpload.php?fix=yes'>Go To This Link So We Can Resolve This</a>";
		echo "</div>";
		break;
		
		case "ResumeFail":
		echo "<div align=center style='font-family:Perpetua;background-color:yellow;border: red 2px dashed'>";
		echo "<img class = 'error' style='padding-top: 5px;' src='images/error.png' alt='error icon'/>";
		echo "<h2 align=center style='float-left;'>Error</h2>";
		echo"<br clear=both>";
		echo "<p>For Some Reason The File You Uploaded Failed To Be Added</p>";
		echo "</div>";
		break;
		
		default:
		echo "<div align=center style='font-family:Perpetua;background-color:#9bf542;>'";
		echo "<h2>Successful File Upload</h2>";
		echo "<p>Dropbox Authentication and/or Resume Upload were a Success</p>";
		echo "</div>";
		break;
	}
}
?>
<h2 align=center>Registration Successful</h2>
<p>There is just one more step to using your new account. A Email has been sent to your inbox to ensure that you are not a bot. Read the Email and follow the instructions provided.</p>
<p>Until you do this, you will not be able to log into your account. If you do not complete this in the next 5 days, the account will be terminated to save on storage space.</p>
<div class='select'>
<h3 align=center>What to do next</h3>
<ul type=none>
<li style='margin-left:-8%;float:left;text-align:center;'><a href='Login.php'>Try Logging in to your new account after verifying</a></li>
<li style='margin-left:-3%;float:left;text-align:center;'><a href='Home.php'>Otherwise, Return to Homepage</a></li>
</ul>
<br clear=both>
</div>
</div>
</html>
