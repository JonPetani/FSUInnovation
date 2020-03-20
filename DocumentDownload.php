<html>
<head>
<title>Successful Register</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='css/Intern1.css' rel='stylesheet'/>
<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
$file = "";
if(isset($_SESSION['loggedin']) and isset($_SESSION['UserType'])) {
	if(isset($_GET['file']) and isset($_GET['inquiry']) and isset($_GET['current']) and $_SESSION['loggedin'] == true) {
		$session_time = $_SERVER['REQUEST_TIME'];
		$timeout_duration = 1200;
		if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
			header("Location:SessionExpire.php?location=" . urlencode($_SERVER['REQUEST_URI']));
		$_SESSION['TimeLog'] = $session_time;
		$file_type = $_GET['file'];
		$pointer = $_GET['inquiry'];
		if($file_type == 'Resume') {
			if($_SESSION['UserType'] != "Member") {
				header("Location: AccessDenied.php");
				die;
			}
			try {
				$timeout = 50;
				$url = "https://content.dropboxapi.com/2/sharing/get_shared_link_file";
				$sql = $con -> query("SELECT * FROM intern WHERE InternName = '$pointer'");
				$resume = $sql -> fetch(PDO::FETCH_ASSOC);
				$filename = str_replace('%', '_', explode('?', basename($resume['Resume']))[0]);
				if(!file_exists(__DIR__ . '/Dropbox_Downloads')) {
					mkdir(__DIR__ . '/Dropbox_Downloads');
				}
				$directory = __DIR__ . $filename;
				$fp = fopen($directory , "w");
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
				fwrite($fp, $download);
				curl_close($rcurl);
				fclose($fp);
			}
			catch(Exception $e) {
				echo $e -> getMessage();
			}
			$file = $directory;
		}
		
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
</head>
<body>

<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>File Found</h1>
<div class='txt'>

<div class='select'>
<h3 align=center>Would You Like To Download It?</h3>
<ul type=none>
<li style='float:left;text-align:center;'><a href="<?php echo 'Dropbox_Downloads/' . $filename; ?>" download>Click to Download</a></li>
<li style='float:right;text-align:center;'><a href="<?php echo $_GET['current']; ?>">Return Me to Previous Page</a></li>
</ul>
<br clear=both>
</div>
</div>
</body>
</html>