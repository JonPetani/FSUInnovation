<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
if($_SESSION['UserType'] == "")
	header("location: MemberLogin.php");
if($_SESSION['UserType'] == "Intern")
	header("location: AccessDenied.html");
$sql = $con -> query("SELECT * FROM applications WHERE JobId = '$_GET[app]'");
$results = $sql -> fetchall(PDO::FETCH_ASSOC);
$sql2 = $con -> query("SELECT * FROM jobs WHERE JobId = '$_GET[app]'");
$results2 = $sql -> fetchall(PDO::FETCH_ASSOC);
$Needed = $results[0]['InternsNeeded'] - 1; 
$sql3 = $con -> query("INSERT INTO jobmemberlist (JobId, JobName, JobDesc, InternName, InternId)

VALUES

('$results[0][JobId]','$results2[0][JobName]','$results2[JobDesc]','$results[0][StudentName]','$results[0][InternId]')");
$Status = 'Accepted/Current';
$sql4 = $con -> query("UPDATE internstasks SET Status = '$Status' WHERE InternId = '$results[0][InternId]' AND JobId = '$results[0][JobId]'");
$sql4 = $con -> query("UPDATE jobs SET InternsNeeded = '$Needed' WHERE JobId = '$results2[0][InternId]'");
$sql5 = $con -> query("DELETE FROM applications WHERE JobId = '$_GET[app]'");
header("location: ApplicantStatusChanged.php");
?>