<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');

try {
	if(!isset($_SESSION['Resume'])) {
		header("Location: Success.php?error=ResumeFail");
		die;
	}
	$dropbox_token = $_GET['access_token'];
	$doc = $_SESSION['Resume'];
	$filename = $doc['tmp_name'];
	$dropbox_url = "https://content.dropboxapi.com/2/files/upload";
	$opendoc = fopen($filename, 'rb');
	$docsize = $doc['size'];
	$d1curl = curl_init();
	$timeout = 50;
	curl_setopt($d1curl, CURLOPT_URL, $dropbox_url);
	curl_setopt($d1curl, CURLOPT_TIMEOUT, $timeout);
	curl_setopt($d1curl, CURLOPT_HTTPHEADER, [
		utf8_encode('Authorization: Bearer ' . $dropbox_token),
            utf8_encode('Content-Type: application/octet-stream'),
            utf8_encode('Dropbox-API-Arg: '.
            json_encode(
                array(
                    "path"=> '/'. basename($filename),
                    "mode" => "add",
                    "autorename" => true,
                    "mute" => false
	)))]);
	curl_setopt($d1curl, CURLOPT_POST, true);
	curl_setopt($d1curl, CURLOPT_POSTFIELDS, fread($opendoc, $docsize));
	curl_setopt($d1curl, CURLOPT_RETURNTRANSFER, true);
	$dropbox_upload = curl_exec($d1curl);
	$http_request = curl_getinfo($d1curl, CURLINFO_HTTP_CODE);
	echo $dropbox_upload;
	echo $http_request;
	curl_close($d1curl);
	fclose($opendoc);
}	
catch(Exception $e) {
	echo $e -> getMessage();
}
$Download_Link = "Localhost:8080/FSUInnovation/DocumentDownload.php?filename=" . $_SESSION['Resume']['name'];
$sql = $con -> query("UPDATE intern SET Resume = '$Download_Link' WHERE EmailAddress = '$_SESSION[Identifier]'");
session_destroy();
echo "bugged down here";
die;
header("Location: Success.php");
?>