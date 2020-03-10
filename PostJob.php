<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');

if (!$con)

  {

  die('Connection has failed: ' . mysql_error());

  }
$session_time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 1200;
if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
	header("location: SessionExpire.php");
$_SESSION['TimeLog'] = $session_time;
$Types = implode(" ", $_POST['JobType']);
echo $Types;
$sql= $con -> query("INSERT INTO jobs (JobName, JobDesc, CompanyName, JobType, TimeNeeded, JobRequirements)

VALUES

('$_POST[JobName]','$_POST[JobDesc]','$_SESSION[CompanyName]','$Types','$_POST[TimeNeeded]','$_POST[JobRequirements]')");

 
/*
if (!query($sql,$con))

  {

  die('Error: ' . mysql_error());

  }
*/
header("location: JobPosted.php");

 

//$con = null;

?>

</body>

</html>