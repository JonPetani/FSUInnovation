<!DOCTYPE html>
<html>
<head>
<title>Intern Applications</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='Intern.css' rel='stylesheet'/>
</head>
<body>
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>Intern Applications</h1>
<div class='txt'>
<h2 align=center>On this page you can view all Intern Applications for your various projects. You can choose to accept the intern on a team or deny them.</h2>
<p>To visit a Member's Page to find what kind of work their looking for, click a button to the right side of each row to visit it</p>
<div style='overflow-x:auto;'>
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
$sql = $con -> query("SELECT * FROM applicants WHERE CompanyName = '$_SESSION[CompanyName]'");
$applicants = $sql -> fetchall(PDO::FETCH_ASSOC);
echo"<table>";
echo"<tr><th>Job Name<th>Intern Applying<th>Profile Info, If Allowed by Applicant<th>Resume (if they have one)<th>Intern's Application<th cellspan='2'>Accept/Deny Applicant</tr>";
for ($i = 0; $i < sizeof($applicants); $i++) {
	$sql2 = $con -> query("SELECT * FROM intern WHERE InternName = '$applicants[$i][StudentName]'");
	$sql3 = $con -> query("SELECT * FROM jobs WHERE JobId = '$applicants[$i][JobId]'");
	$InternInfo = $sql2 -> fetchall(PDO::FETCH_ASSOC);
	$JobInfo = $sql3 -> fetchall(PDO::FETCH_ASSOC);
	echo"<tr>";
	echo "<td>" . $JobInfo[0]['JobName'] . "</td>";
	echo "<td>" . $applicants[$i]['StudentName'] . "</td>";
	if ($results[$i]['Permission'] == 'Yes') {
		echo '<td><a href="InternProfileViewer.php?name=' . $applicants[$i]['StudentName'] . '"><img src="images/clickhere.png" width="90%" height="90%" alt="To Intern Profile"/></a><br></td>';
	}
	else {
		echo "<td><a href=\"InternProfileViewer.php?key='locked'\"><img src='images/Blocked.png' width='90%' height='90%' alt='Access Denied to Information' title = 'No Permission'/></a></td>";
	}
	echo "<td><a href='DocumentDownload.php?file=Resume&inquiry=" . $applicants[$i]['StudentName'] . "&current=AppListMember.php'><img src='images/FileDownload.png' width='95%' height='95%' title='Download Intern's Resume Here' alt='Resume Link'/></a></td>";
	echo "<td>" . $results[$i]['InternApplication'] . "</td>";
	echo "<td cellspan='2'>" . '<a href="Accept.php?app=' . $results[$i]['AppId'] . '"><img src="images/Accept.jpg" style="width:45%;height:45%;float:left;" alt="Accept Applicant"/></a>' . '<a href="Deny.php?app=' . $results[$i]['AppId'] . '"><img src="images/Delete.jpg" style="width:45%;height:45%;float:right;" alt="Deny Applicant"/></a><br clear=both>';
	echo"</tr>";
	echo"</table>";
}
?>
</div>
<br>
<div class='select'>
<h3 align=center>What Now?</h3>
<ul type=none>
<li style='float:left;text-align:center;'><a href='LoggedInMember.php'>Return to Main Page</a></li>
<li style='margin-left:50%;float:left;text-align:center;'><a href='Home.php'>Return Home</a></li>
</ul>
<br clear=both>
</div>
</div>
</html>