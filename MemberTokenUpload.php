<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
$token_json = json_decode($_SESSION['token']);
$dropbox_token = $token_json -> access_token;
if(Empty($dropbox_token) or (isset($_GET['fix']) and $_GET['fix'] == 'yes')) {
	header("Location: Success.php?error=TokenGetFail&code=" . $_SESSION['code']);
    die;
}
$sql = $con -> query("UPDATE intern SET DropboxToken = '$dropbox_token' WHERE EmailAddress = '$_SESSION[Identifier]'");
header("Location: Success.php?error=okay");
session_destroy();
?>