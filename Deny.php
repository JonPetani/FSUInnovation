<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
if($_SESSION['UserType'] == "")
	header("location: MemberLogin.php");
if($_SESSION['UserType'] == "Intern")
	header("location: AccessDenied.html");
$Status = 'Denied';
$sql4 = $con -> query("UPDATE internstasks SET Status = '$Status' WHERE InternId = '$results[0][InternId]' AND JobId = '$results[0][JobId]'");
header("location: ApplicantStatusChanged.php");
$sql5 = $con -> query("DELETE FROM applications WHERE JobId = '$_GET[app]'");
header("location: ApplicantStatusChanged.php");
?>