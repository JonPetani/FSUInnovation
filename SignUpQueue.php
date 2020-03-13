<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495', array(PDO::ATTR_TIMEOUT => 30, PDO::ATTR_ERRMODE => ERRMODE_EXCEPTION));

if (!$con)

  {

  die('Connection has failed: ' . mysql_error());

  }
$session_time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 1200;
if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
	header("location: SessionExpire.php");
$_SESSION['TimeLog'] = $session_time;
$sql = $con -> query("SELECT * FROM jobs WHERE JobName = '$_GET[job]'");
$results = $sql -> fetch(PDO::FETCH_ASSOC);
$project = (int)$results['JobId'];
$Read = (bool)$_POST['Read'];
$Able = (bool)$_POST['Able'];
$Share = (bool)$_POST['Share'];
$Rate = (int)$_POST['Rate'];
$application = $con -> query("INSERT INTO applications (ReadRequirements, Prereqs, FullAccess, TimeAvailable, Rating, Interest) VALUES  ('$Read','$Able','$Share','$_POST[Time]','$Rate','$_POST[Interest]')");
$getId = $con -> query("SELECT * FROM applications WHERE Interest = '$_POST[Interest]'");
$id = $getId -> fetch(PDO::FETCH_ASSOC);
$applicant= $con -> query("INSERT INTO applicants (CompanyName, InternId, JobId, StudentName, InternApplicationId)

VALUES

('$results[CompanyName]','$_SESSION[InternId]','$project','$_SESSION[InternName]','$id[ApplicationId]')");
$status = "Pending";
$sql= $con -> query("INSERT INTO internstasks (InternName, JobName, JobId, InternId, Status)

VALUES

('$_SESSION[InternName]','$results[JobName]','$project','$_SESSION[InternId]','$status')");
/*
if (!query($sql,$con))

  {

  die('Error: ' . mysql_error());

  }
*/
header("location: ApplSent.php");
/*echo "*Success! Welcome to our website. Hope our services will serve you and your company well.";*/

 

//$con = null;

?>

</body>

</html>