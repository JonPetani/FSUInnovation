<!DOCTYPE html>
<html>
<head>
<title>Results</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='css/Intern.css' rel='stylesheet'/>
</head>
<body>
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>Results</h1>
<div class='txt'>
<h2 align=center>Companies found starting with the letter <?php echo $_GET['by'];?> are</h2>
<p>To visit a Member's Page to find what kind of work their looking for, click a button to the right side of each row to visit it</p>
<div style='overflow-x:auto;'>
<?php
	$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
	$SearchLetter = $_GET['by'];
	$sql = $con -> query("SELECT * FROM member WHERE CompanyName LIKE '" . $SearchLetter . "%'");
    $results = $sql -> fetchAll(PDO::FETCH_ASSOC);
	if ($results == 0) {
		header("location: NoResults.html");
	}
	echo "<table align='center' width='150%' height='120%'>";
	echo"<tr><th>Logo<th>Company Name<th>Member Name<th>Company Location<th>Contact Info<th>Link to Member's Page</tr>";
	for($i=0; $i<sizeof($results); $i++) {
		echo'<tr>';
		echo'<td>' . '<img src="' . $results[$i]['CompanyPicture'] . '" class="TableImg" alt="profile picture"/></td>';
		echo'<td>' . $results[$i]['CompanyName'] . '</td>';
		echo'<td>' . $results[$i]['ContactName'] . '</td>';
		echo'<td>' . $results[$i]['CompanyCity'] . ", " . $results[$i]['CompanyState'] . '</td>';
		echo'<td>' . '&#9990;: '. $results[$i]['PhoneNumber'] . '<br>&#9993;: ' . $results[$i]['ContactEmail'] . '</td>';
		$Company = $results[$i]['CompanyName'];
		echo'<td><a href="CompanyPage.php?comp=' . $Company . '"><img src="images/ToPage.jpg" class="TableImg" alt="To Next Page"/></a></td>';
		echo'</tr>';
		}
		echo"</table>";
?>
</div>
<br>
<div class='select'>
<h3 align=center>Didn't find what you were looking for?</h3>
<ul type=none>
<li style='float:left;text-align:center;'><a href='CompanyFind.php'>Try a different letter</a></li>
<li style='margin-left:50%;float:left;text-align:center;'><a href='Home.php'>Return Home</a></li>
</ul>
<br clear=both>
</div>
</div>
</html>