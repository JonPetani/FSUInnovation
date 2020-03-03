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
$http_headers = array(
	"Authorization: Basic " . base64_encode($app_key . ":" . $app_secret),
	"Content-Type: application/x-www-form-urlencoded"
	);
$parameters = array(
	'code' => $code,
	'grant_type' => 'authorization_code',
	'redirect_uri' => 'http://localhost:8080/FSUInnovation/ResumeUpload.php'	
);
curl_setopt($d1curl, CURLOPT_URL, $dropbox_url);
curl_setopt($d1curl, CURLOPT_TIMEOUT, $timeout);
curl_setopt($d1curl, CURLOPT_HTTPHEADER, $http_headers);
curl_setopt($d1curl, CURLOPT_POST, true);
curl_setopt($d1curl, CURLOPT_POSTFIELDS, http_build_query($parameters));
curl_setopt($d1curl, CURLOPT_RETURNTRANSFER, true);
$_SESSION['code'] = $_GET['code'];
$_SESSION['token'] = curl_exec($d1curl);
$http_request = curl_getinfo($d1curl, CURLINFO_HTTP_CODE);
echo $_SESSION['token'];
echo $http_request;
curl_close($d1curl);
}
catch(Exception $e) {
	echo curl_error($d1curl);
	curl_close($d1curl);
}
?>