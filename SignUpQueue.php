<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');

if (!$con)

  {

  die('Connection has failed: ' . mysql_error());

  }

$sql = $con -> query("SELECT * FROM jobs WHERE JobId = '$_GET[job]'");
$results = $sql -> fetchall(PDO::FETCH_ASSOC);
$Application = fopen("StudentApp.txt", "w");
$heading = "Application for " . $results[0]['JobName'] . " task\n";
fwrite($Application, $heading);
$name = "Intern's Name: " . $_SESSION['InternName'] . "\n";
fwrite($Application, $name);
$heading2 = "Intern's Answers to the Questions\n";
$break = "--------------------------------------\n";
fwrite($Application, $heading2);
fwrite($Application, $break);
$Q1 = "Q1: Did the Student read the Job requirements listed? " . $_POST['Read'] . "\n";
$Q2 = "Q2: Does the Student have confidence in his/her ability to complete the task? " . $_POST['Able'] . "\n";
$Q3 = "Q3: Will the Student Provide you with Account information to aid in the application process? " . $_POST['Share'] . " If not, send a private message to the intern to ask a few questions relevant to their ability to serve you when in doubt.\n";
$Q4 = "Q4: This is the amount of hours in a given week the intern will have to complete this task: " . $_POST['Time'] . "\n";
$Q5 = "Q5: This rating is how interested the intern is in the project. 10 is highest while 1 is lowest: " . $_POST['Rate'] . "\n";
$Q6 = "Q6: Of all the aspects included in your project, the student likes this/these parts of the project and why:\n	" . $_POST['Interest'] . "\n";
fwrite($Application, $Q1);
fwrite($Application, $heading);
fwrite($Application, $Q2);
fwrite($Application, $heading);
fwrite($Application, $Q3);
fwrite($Application, $heading);
fwrite($Application, $Q4);
fwrite($Application, $heading);
fwrite($Application, $Q5);
fwrite($Application, $heading);
fwrite($Application, $Q6);
fwrite($Application, $heading);
$sql= $con -> query("INSERT INTO applications (CompanyName, InternId, JobId, StudentName, InternApplication, Permission)

VALUES

('$results[0][CompanyName]','$_SESSION[InternId]','$_GET[job]','$_SESSION[InternName]','$Application','$_POST[Share]')");
fclose($Application);
$status = "Pending";
$sql= $con -> query("INSERT INTO internstasks (InternName, JobName, JobId, InternId, Status)

VALUES

('$_SESSION[CompanyName]','$results[0][JobName]','$_GET[job]','$_SESSION[InternId]','$Status')");
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