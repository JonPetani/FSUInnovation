<!DOCTYPE html>
<html>
<head>
<title>All Members Working on this Project</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='Intern.css' rel='stylesheet'/>
</head>
<body>
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>Results</h1>
<div class='txt'>
<h2 align=center>Intern Memberlist</h2>
<p>Below you can view all projects you have signed up for. The color of the row determines your status for the position.</p>
<div style='overflow-x:auto;overflow-y:auto;'>
<?php
	session_start();
	$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
	$session_time = $_SERVER['REQUEST_TIME'];
	$timeout_duration = 1200;
	if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
		header("location: SessionExpire.php");
	$_SESSION['TimeLog'] = $session_time;
	$sql = $con -> query("SELECT * FROM internstasks WHERE InternId = '$_SESSION[InternId]'");
	$results = $sql -> fetchall(PDO::FETCH_ASSOC);
	echo "<table align='center' width='130%' height='110%'>";
	echo"<tr><th>Job Id<th>Job Name<th>Status</tr>";
	$status = "#ff8080";
	for($i=0; $i<sizeof($results); $i++) {
		switch($results[$i]['Status']) {
			case "Denied":
				$status = "#ff8080";
				break;
			case "Pending":
				$status = "#ccccff";
				break;
			case "Accepted/Current":
				$status = "#66ff66";
				break;
			case "Past":
				$status = "#ffdb4d";
				break;
			default:
				$status = "#f2e6ff";
		}
		echo'<tr>';
		echo'<td style="background-color:' . $status . '">' . $results[$i]['JobId'] . '</td>';
		echo'<td style="background-color:' . $status . '">' . $results[$i]['JobName'] . '</td>';
		echo'<td style="background-color:' . $status . '">' . $results[$i]['Status'] . '</td>';
		echo'</tr>';
		}
		echo"</table>";
		echo"</div>";
?>
<br>
<div class='select'>
<h3 align=center>Don't see a task that you thought was on this list?</h3>
<ul type=none>
<li style='float:left;text-align:center;'><a href='CompanyFind.php'>Search for that job now and sign up.</a></li>
<li style='margin-left:50%;float:left;text-align:center;'><a href='LoggedInIntern.php'>Otherwise, Return to your Page</a></li>
</ul>
<br clear=both>
</div>
</div>
</html>