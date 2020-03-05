<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');

try {
	if(!isset($_FILES['UploadFile'])) {
		header("Location: Success.php?error=ResumeFail");
		die;
	}
	$sql2 = $con -> query("SELECT * FROM intern WHERE EmailAddress = '$_SESSION[Identifier]'");
	$fields = $sql2 -> fetch(PDO::FETCH_ASSOC);
	$timeout = 50;
	$dropbox_token = $fields['DropboxToken'];
	if(!Empty($fields['Resume'])) {
		$dropbox_url_delete = "https://api.dropboxapi.com/2/files/delete_v2";
		$d3curl = curl_init();
		curl_setopt_array($d3curl,
			CURLOPT_URL => $dropbox_url_delete,
			CURLOPT_TIMEOUT => $timeout,
			CURLOPT_HTTPHEADER => array(
				utf8_encode("Authorization: Bearer " . $dropbox_token),
				"Content-Type: application/json"
			),
		);
		$http_request3 = curl_exec($d3curl);
		curl_close($d3curl);
	}
	$doc = $_FILES['UploadFile'];
	$filename = $doc['tmp_name'];
	$dropbox_url_upload = "https://content.dropboxapi.com/2/files/upload";
	$opendoc = fopen($filename, 'rb');
	$docsize = $doc['size'];
	$d1curl = curl_init();
	$dropbox_directory = '/'. basename($doc['name']);
	curl_setopt($d1curl, CURLOPT_URL, $dropbox_url_upload);
	curl_setopt($d1curl, CURLOPT_TIMEOUT, $timeout);
	curl_setopt($d1curl, CURLOPT_HTTPHEADER, [
		utf8_encode('Authorization: Bearer ' . $dropbox_token),
            'Content-Type: application/octet-stream',
            'Dropbox-API-Arg: '.
            json_encode(
                array(
                    "path"=> $dropbox_directory,
                    "mode" => "add",
                    "autorename" => true,
                    "mute" => false
	))]);
	curl_setopt($d1curl, CURLOPT_POST, true);
	curl_setopt($d1curl, CURLOPT_POSTFIELDS, base64_encode(fread($opendoc, $docsize)));
	curl_setopt($d1curl, CURLOPT_RETURNTRANSFER, true);
	$dropbox_upload = curl_exec($d1curl);
	$http_request = curl_getinfo($d1curl, CURLINFO_HTTP_CODE);
	echo $dropbox_upload;
	echo $http_request;
	curl_close($d1curl);
	fclose($opendoc);
	$dropbox_url_share = 'https://api.dropboxapi.com/2/sharing/create_shared_link_with_settings';
	$d2curl = curl_init();
	curl_setopt($d2curl, CURLOPT_URL, $dropbox_url_share);
	curl_setopt($d2curl, CURLOPT_TIMEOUT, $timeout);
	curl_setopt($d2curl, CURLOPT_HTTPHEADER, [
		utf8_encode('Authorization: Bearer ' . $dropbox_token),
		'Content-Type: application/json',
		json_encode(
		array(
		"path"=> $dropbox_directory
	))]);
	curl_setopt($d2curl, CURLOPT_POST, false);
	curl_Setopt($d2curl, CURLOPT_RETURNTRANSFER, true);
	$dropbox_getlink = curl_exec($d2curl);
	$http_request2 = curl_getinfo($d2curl, CURLINFO_HTTP_CODE);
	echo $dropbox_getlink;
	echo $http_request2;
	curl_close($d2curl);
}	
catch(Exception $e) {
	echo $e -> getMessage();
}
$upload_info = json_decode($dropbox_getlink);
$Download_Link = $upload_info -> url;
$sql = $con -> query("UPDATE intern SET Resume = '$Download_Link' WHERE EmailAddress = '$_SESSION[Identifier]'");
die;
session_destroy();
header("Location: Success.php?error=ok");
?>