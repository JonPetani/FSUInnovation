<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
if($_SESSION['UserType'] == "")
	header("location: MemberLogin.php");
if($_SESSION['UserType'] == "Intern")
	header("location: AccessDenied.html");
$session_time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 1200;
if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
	header("location: SessionExpire.php");
$_SESSION['TimeLog'] = $session_time;
$Status = 'Denied';
$sql4 = $con -> query("UPDATE internstasks SET Status = '$Status' WHERE InternId = '$results[0][InternId]' AND JobId = '$results[0][JobId]'");
header("location: ApplicantStatusChanged.php");
$sql5 = $con -> query("DELETE FROM applications WHERE JobId = '$_GET[app]'");
header("location: ApplicantStatusChanged.php");
?>