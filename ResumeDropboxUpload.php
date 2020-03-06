<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');

try {
	if(!isset($_FILES['UploadFile'])) {
		header("Location: Success.php?error=ResumeFail");
		die;
	}
	if(isset($_SESSION['EmailAddress']))
		$sql2 = $con -> query("SELECT * FROM intern WHERE EmailAddress = '$_SESSION[EmailAddress]'");
	else
		$sql2 = $con -> query("SELECT * FROM intern WHERE EmailAddress = '$_SESSION[Identifier]'");
	$fields = $sql2 -> fetch(PDO::FETCH_ASSOC);
	$dropbox_token = $fields['DropboxToken'];
	$timeout = 50;
	$Folder = "InternResumes";
	$dropbox_url_foldercreate = "https://api.dropboxapi.com/2/files/create_folder_v2";
	$d4curl = curl_init();
	curl_setopt($d4curl, CURLOPT_URL, $dropbox_url_foldercreate);
	curl_setopt($d4curl, CURLOPT_TIMEOUT, $timeout);
	curl_setopt($d4curl, CURLOPT_HTTPHEADER, [
	utf8_encode("Authorization: Bearer " . $dropbox_token),
	"Content-Type: application/json"
	]);
	curl_setopt($d4curl, CURLOPT_POST, true);
	$resume_directory = json_encode(array(
	"path" => "/" . $Folder
	));
	curl_setopt($d4curl, CURLOPT_POSTFIELDS, $resume_directory);
	curl_setopt($d4curl, CURLOPT_RETURNTRANSFER, true);
	$dropbox_foldermake = curl_exec($d4curl);
	$http_request4 = curl_getinfo($d4curl, CURLINFO_HTTP_CODE);
	echo $dropbox_foldermake;
	echo $http_request4;
	$doc = $_FILES['UploadFile'];
	$dropbox_directory = '/'. $Folder . '/' . basename($doc['name']);
	$directory = json_encode(array(
	"path" => $dropbox_directory
	));
	if(!Empty($fields['Resume'])) {
		$dropbox_url_delete = "https://api.dropboxapi.com/2/files/delete_v2";
		$d3curl = curl_init();
		curl_setopt_array($d3curl, array(
			CURLOPT_URL => $dropbox_url_delete,
			CURLOPT_TIMEOUT => $timeout,
			CURLOPT_HTTPHEADER => array(
				utf8_encode("Authorization: Bearer " . $dropbox_token),
				"Content-Type: application/json"
			),
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $directory,
			CURLOPT_RETURNTRANSFER => true
			));
		$dropbox_delete = curl_exec($d3curl);
		$http_request3 = curl_getinfo($d3curl, CURLINFO_HTTP_CODE);
		echo $http_request3;
		echo $dropbox_delete;
		curl_close($d3curl);
	}
	$filename = $doc['tmp_name'];
	$dropbox_url_upload = "https://content.dropboxapi.com/2/files/upload";
	$opendoc = fopen($filename, 'rb');
	$docsize = $doc['size'];
	$d1curl = curl_init();
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
	curl_setopt($d1curl, CURLOPT_POSTFIELDS, fread($opendoc, $docsize));
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
		'Content-Type: application/json'
		]);
	curl_setopt($d2curl, CURLOPT_POST, true);
	curl_setopt($d2curl, CURLOPT_POSTFIELDS, $directory);
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
if(isset($_SESSION['EmailAddress'])) {
	unset($_SESSION['HasToken']);
	unset($_SESSION['token']);
	unset($_SESSION['code']);
}
else {
session_destroy();
header("Location: Success.php?error=ok");
die;
}
?>