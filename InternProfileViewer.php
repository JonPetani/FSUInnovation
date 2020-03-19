<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
if(isset($_GET['key']) or isset($_GET['name'])) {
	if(isset($_GET['key'])) {
		if($_GET['key'] == 'locked') {
			
		}
	}
}
else {
	header("Location: AccessDenied.php");
}
?>