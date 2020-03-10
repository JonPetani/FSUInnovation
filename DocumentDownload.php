<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
if(isset($_SESSION['loggedin'] and $_SESSION['UserType']))) {
	if(isset($_GET['file'] and isset($_GET['inquiry']) and isset($_GET['current']) and $_SESSION['loggedin'] == true) {
		$session_time = $_SERVER['REQUEST_TIME'];
		$timeout_duration = 1200;
		if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
			header("Location:SessionExpire.php?location=" . urlencode($_SERVER['REQUEST_URI']));
		$_SESSION['TimeLog'] = $session_time;
		$file_type = $_GET['file'];
		$pointer = $_GET['inquiry'];
		if($_GET['file'] == 'Resume') {
			if($_SESSION['UserType'] != "Member") {
				header("Location: AccessDenied.php");
				die;
			}
			try {
				$timeout = 50;
				$url = "https://content.dropboxapi.com/2/sharing/get_shared_link_file";
				$sql = $con -> query("SELECT * FROM intern WHERE InternName = '$_GET[inquiry]'");
				$resume = $sql -> fetch(PDO::FETCH_ASSOC);
				$rcurl = curl_init();
				$params = array(
				utf8_encode("Authorization: Bearer " . $resume['DropboxToken']),
				"Dropbox-API-Arg: " . json_encode(array(
				"url" => $resume['Resume']
				)));
				curl_setopt($rcurl, CURLOPT_URL, $url);
				curl_setopt($rcurl, CURLOPT_HTTPHEADER, $params);
				curl_setopt($rcurl, CURLOPT_TIMEOUT, $timeout);
				curl_setopt($rcurl, CURLOPT_POST, false);
				curl_setopt($rcurl, CURLOPT_RETURNTRANSFER, true);
				$download = curl_exec($rcurl);
			}
			catch(Exception $e) {
				echo $e -> getMessage();
			}
		}
	$backpage = $_GET['current'];
	header("location: " . $backpage);
	}
	else {
		header("Location: AccessDenied.php");
		die;
	}
}
else {
	header("Location: AccessDenied.php");
	die;
}
?>