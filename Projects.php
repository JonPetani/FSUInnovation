<!DOCTYPE html>
<html>
<head>
<title>My Projects with Interns</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='Intern.css' rel='stylesheet'/>
</head>
<body>
<a href="Home.html"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>Results</h1>
<div class='txt'>
<h2 align=center>Current Projects</h2>
<p>Below is all the Projects you have registered on this site. These projects are tasks you gave to the interns that signed up to help your business in some way. Review the interns assigned to each task below.</p>
<?php
    session_start();
	$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
	$sql = $con -> query("SELECT * FROM jobs WHERE CompanyName = '$_SESSION[CompanyName]'");
    $results = $sql -> fetchAll(PDO::FETCH_ASSOC);
	echo "<div style='overflow-x:auto;overflow-y:auto;'>";
	echo "<table align='center' width='150%' height='120%'>";
	echo"<tr><th>Job Name<th>Description<th>Number of Interns Still Needed<th>View All Related Interns to the Job here</tr>";
	for($i=0; $i<sizeof($results); $i++) {
		echo'<tr>';
		echo'<td>' . $results[$i]['JobName'] . '</td>';
		echo'<td>' . $results[$i]['JobDesc'] . '</td>';
		$skills = $con -> query("SHOW COLUMNS FROM jobs WHERE JobType = '$results[$i][JobType]'");
		preg_match("/^enum\(\'(.*)\'\)$/", $skills, $res);
		$icons = explode("','", $res[1]);
		echo'<td>' . $results[$i]['InternsNeeded'] . '</td>';
		echo'<td><a href="Project.php?project=' . $results[$i]['JobId'] . '"><img src="ToPage.jpg" class="TableImg" alt="View Interns for this project"/></a></td>';
		echo'</tr>';
		}
		echo"</table>";
		echo"</div>";
?>
<br>
<div class='select'>
<h3 align=center>Can't find a Job you thought you posted?</h3>
<ul type=none>
<li style='float:left;text-align:center;'><a href='RegisterJob.php'>Post the new Job here</a></li>
<li style='margin-left:50%;float:left;text-align:center;'><a href='Home.html'>Return Home</a></li>
</ul>
<br clear=both>
</div>
</div>
</html>