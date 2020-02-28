<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
$token_json = json_decode($_SESSION['token']);
$dropbox_token = $token_json -> access_token;
if(Empty($dropbox_token) or (isset($_GET['fix']) and $_GET['fix'] == 'yes')) {
	header("Location: Success.php?error=TokenGetFail&code=" . $_GET['code']);
    die;
}
$sql = $con -> query("UPDATE intern SET DropboxToken = '$dropbox_token' WHERE EmailAddress = '$_SESSION[Identifier]'");
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
<h1>Resume Upload</h1>
<div class='select'>
<h2 align=center>Successful Dropbox Verification</h2>
<p>Your Dropbox Authorization process was a success. Now, you will be able to upload and download files from our dropbox app on our platform.</p>
<div class="container">
			<form action="FileUpload.php" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-25">
					<label for="UploadFile">Now, Upload Your Resume File:</label>
					</div>
					<div class="col-75">
					<input type="file" name="UploadFile" accept='application/octet-stream' autocomplete="off"><br></div>
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