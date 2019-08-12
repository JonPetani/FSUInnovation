<!DOCTYPE html>
<html>
<head>
<title>Results</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='Intern.css' rel='stylesheet'/>
</head>
<body>
<a href="Home.html"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>Results</h1>
<div class='txt'>
<h2 align=center>These are the results for the keyword <?php echo $_POST['Keyword'];?></h2>
<p>To visit a Member's Page to find what kind of work their looking for, click a button to the right side of each row to visit it</p>
<div style='overflow-x:auto;'>
<?php
	$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
	$sql = $con -> query("SELECT * FROM keywords WHERE Keyword = '$_POST[Keyword]'");
    $results = $sql -> fetchAll(PDO::FETCH_ASSOC);
	if ($results == 0) {
		header("location: NoResults.html");
	}
	echo "<table align='center' width='150%' height='120%'>";
	echo"<tr><th>Logo<th>Company Name<th>Member Name<th>Company Location<th>Contact Info<th>Link to Member's Page</tr>";
	for($i=0; $i<sizeof($results); $i++) {
		$CompanyResult = $results[$i]['CompanyName'];
		echo'<tr>';
		$sql2 = $con -> query("SELECT * FROM member WHERE CompanyName = '$CompanyResult'");
		$CompanyInfo = $sql2 -> fetchAll(PDO::FETCH_ASSOC);
		echo'<td>' . $CompanyInfo[0]['CompanyPicture'] . '</td>';
		echo'<td>' . $CompanyInfo[0]['CompanyName'] . '</td>';
		echo'<td>' . $CompanyInfo[0]['ContactName'] . '</td>';
		echo'<td>' . $CompanyInfo[0]['CompanyCity'] . ", " . $CompanyInfo[0]['CompanyState'] . '</td>';
		echo'<td>' . '&#9990;: '. $CompanyInfo[0]['PhoneNumber'] . '<br>&#9993;: ' . $CompanyInfo[0]['ContactEmail'] . '</td>';
		echo'<td><a href=""><img src="images/ToPage.jpg" class="TableImg" alt="To Next Page"/></a></td>';
		echo'</tr>';
		}
		echo"</table>";
?>
</div>
<br>
<div class='select'>
<h3 align=center>Didn't find what you were looking for?</h3>
<ul type=none>
<li style='float:left;text-align:center;'><a href='CompanyFind.php'>Try Again</a></li>
<li style='margin-left:50%;float:left;text-align:center;'><a href='Home.html'>Return Home</a></li>
</ul>
<br clear=both>
</div>
</div>
</html>