<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');

if (!$con)

  {

  die('Connection has failed: ' . mysql_error());

  }
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