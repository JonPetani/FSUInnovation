<?php
session_start();
$code = $_GET['Code'];
if(Empty($code)) {
	header("Location: Success.php?error=AuthFail");
    die;
}
$dropbox_url = "https://api.dropboxapi.com/oauth2/token";
$timeout = 40;
$d1curl = curl_init();
curl_setopt();
//curl for
try {

curl_close();
}
catch(Exception $e) {
	echo $e -> getMessage();
}
$dropbox_token = $_GET['Token'];
$sql = $sql = $con -> query("UPDATE intern SET DropboxToken = '$dropbox_token' WHERE EmailAddress = '$_SESSION[Identifier]'");
?>
<!DOCTYPE html>
<html>
<head>
<title>Enter Your Email</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='css/Intern1.css' rel='stylesheet'/>
<link href='css/member_page.css' rel='stylesheet'/>
</head>
<body>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>Login</h1>
<div class='select'>
<h2 align=center>Email Verification</h2>
<p>We want to make sure you are not a bot.</p>
<div class="container">
			<form action="FileUpload.php" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-25">
					<label>Resume:</label>
					</div>
					<div class="col-75">
					<input type="file" name="UploadFile" accept='application/octet-stream' autocomplete="off"><br>					</div>
					</div>
					<div class="row">
					<input id="submitButton" type="submit" value="Submit">
				</div>
				</div>
<br clear=both>
</div>
<footer>
<hr>
<address><strong>&copy;	Framingham State University Entreperenuer Innovation Center</strong></address>
</footer>
</body>
</html>