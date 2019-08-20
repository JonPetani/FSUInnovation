<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');

if (!$con)

  {

  die('Connection has failed: ' . mysql_error());

  }

$sql = $con -> query("SELECT * FROM jobs WHERE JobId = '$_GET[job]'");
$results = $sql -> fetchall(PDO::FETCH_ASSOC);
$_SESSION['InternName'];
$_SESSION['InternId'];
	
$sql= $con -> query("INSERT INTO applications (CompanyName, InternId, JobId, StudentName)

VALUES

('$results[0][CompanyName]','$_SESSION[InternId]','$_GET[job]','$_SESSION[InternName]')");

 
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