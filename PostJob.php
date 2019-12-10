<?php
session_start();
$con = new PDO('mysql:host=sql208.byethost.com;dbname=b32_24537897_internsite;charset=utf8mb4','b32_24537897','Sayhello123');

if (!$con)

  {

  die('Connection has failed: ' . mysql_error());

  }
$session_time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 1200;
if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
	header("location: SessionExpire.php");
$_SESSION['TimeLog'] = $session_time;
$JobType = implode(', ', $_POST['JobType']);
	
$sql= $con -> query("INSERT INTO jobs (JobName, JobDesc, CompanyName, JobType, InternsNeeded, JobRequirements)

VALUES

('$_POST[JobName]','$_POST[JobDesc]','$_SESSION[CompanyName]','$JobType','$_POST[InternsNeeded]','$_POST[JobRequirements]')");

 
/*
if (!query($sql,$con))

  {

  die('Error: ' . mysql_error());

  }
*/
header("location: JobPosted.php");
/*echo "*Success! Welcome to our website. Hope our services will serve you and your company well.";*/

 

//$con = null;

?>

</body>

</html>