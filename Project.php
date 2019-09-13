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
<div style='overflow-x:auto;overflow-y:auto;'>
<?php
	$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
	$sql = $con -> query("SELECT * FROM jobmemberlist WHERE ProjectId = '$_GET[project]'");
	$results = $sql -> fetchall(PDO::FETCH_ASSOC);
	echo "<table align='center' width='160%' height='130%'>";
	echo"<tr><th>Intern Id<th>Intern Name<th>Intern Role</tr>";
	for($i=0; $i<sizeof($results); $i++) {
		echo'<tr>';
		echo'<td>' . $results[$i]['InternId'] . '</td>';
		echo'<td>' . $results[$i]['InternName'] . '</td>';
		echo'<td>' . $results[$i]['InternRole'] . '</td>';
		echo'</tr>';
		}
		echo"</table>";
		echo"</div>";
?>
<br>
<div class='select'>
<h3 align=center>Want to look at the interns who are working on a different project you have?</h3>
<ul type=none>
<li style='float:left;text-align:center;'><a href='Projects.php'>Select a New Job to view the interns assigned to it</a></li>
<li style='margin-left:50%;float:left;text-align:center;'><a href='LoggedInMember.php'>Otherwise, Return to your Page</a></li>
</ul>
<br clear=both>
</div>
</div>
</html>