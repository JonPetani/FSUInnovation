<?php
if(isset($_GET['filename'])) {
	if(!Empty($_GET['filename'])) {
try {
	$dropbox_url = "https//content.dropboxapi.com/2/files/download";
	$dropbox_token = "Xe6PaJwneZAAAAAAAAAAH67SSXlTCim-U5uEUmem1tuO2KUTSrA5YijAnk2rEddV";
	$dropbox_api_headers = array('Authorization: Bearer ' . $dropbox_token,
								 'Dropbox-API-Arg: ' . json_encode(array(
								 "path" => '/' . basename($_GET['filename'])
								 )));
	$d1curl = curl_init($dropbox_url);
	$timeout = 50;
	curl_setopt($d1curl, CURLOPT_HEADER, $dropbox_api_headers);
	curl_setopt($d1curl, CURLOPT_POST, false);
	curl_setopt($d1curl, CURLOPT_TIMEOUT, $timeout);
	curl_setopt($d1curl, CURLOPT_RETURNTRANSFER, true);
	$dropbox_upload = curl_exec(d1curl);
	$http_request = curl_setopt($d1curl, CURLINFO_HTTP_CODE);
	echo $dropbox_upload;
	echo $http_request;
	curl_close($d1curl);
	fclose($opendoc);
}	
catch(Exception $e) {
	echo $e -> getMessage();
}

}
}
$backpage = $_GET['prev'];
header("location: " . $backpage);
?>