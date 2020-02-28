<?php
session_start();
$code = $_GET['code'];
if(Empty($code)) {
	header("Location: Success.php?error=OAuthFail");
    die;
}
$dropbox_url = "https://api.dropboxapi.com/oauth2/token";
$timeout = 40;
$app_key = "4s9vxyownku3sp2";
$app_secret = "wdx61uh10w78ix9";
try {
$d1curl = curl_init();
curl_setopt($d1curl, CURLOPT_URL, $dropbox_url);
curl_setopt($d1curl, CURLOPT_TIMEOUT, $timeout);
curl_setopt($d1curl, CURLOPT_HTTPHEADER, [ json_encode(array(
	'code' => $_GET['code'],
	'grant_type' => 'authorization_code',
	'redirect_url' => 'http://localhost:8080/FSUInnovation/FileUpload.php',)),
		utf8_encode($app_key . ":" . $app_secret)
	]);
curl_setopt($d1curl, CURLOPT_POST, true);
curl_setopt($d1curl, CURLOPT_RETURNTRANSFER, true);
$token_get = curl_exec($d1curl);
$http_request = curl_getinfo($d1curl, CURLINFO_HTTP_CODE);
echo $token_get;
echo $http_request;
curl_close();
}
catch(Exception $e) {
	echo $e -> getMessage();
}
$dropbox_token = $_GET['token'];
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