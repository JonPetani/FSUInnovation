<!DOCTYPE html>
<html>
<head>
<title><?php echo $_GET['comp']; ?></title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='Intern.css' rel='stylesheet'/>
</head>
<body>
<a href="Home.html"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1><?php echo $_GET['comp']; ?></h1>
<img src='data:image/jpeg;base64,<?php echo base64_encode($imagedata);?>' alt='profile image'/>
<div class='txt'>
<h2>This Page Has All Information Pertaining to the Company named above</h2>
<?php
	$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
	$CompanyName = $_GET['comp'];
	$sql = $con -> query("SELECT * FROM member WHERE CompanyName = '$CompanyName'");
    $results = $sql -> fetchAll(PDO::FETCH_ASSOC);
	echo "<h3>Contact Information</h3>";
	echo "<div class='select>'"
	echo "<dl>";
	echo "<dt>Contact's Name</dt>";
	echo "<dd>" . $results[0]['ContactName'] . "</dd>"
	echo "<dt>&#9990;:</dt>";
	echo "<dd>" . $results[0]['PhoneNumber'] . "</dd>";
	echo "<dt>&#9993;:</dt>";
	echo "<dd>" . $results[0]['ContactEmail'] . "</dd>"
	echo "<dl></div><br>";
	echo "<h3>Main Location</h3>";
	echo "<div class='select>'"
	echo "<dl>";
	echo "<dt>City</dt>";
	echo "<dd>" . $results[0]['CompanyCity'] . "</dd>"
	echo "<dt>State</dt>";
	echo "<dd>" . $results[0]['CompanyState'] . "</dd>";
	echo "<dl></div><br>";
	echo "<div style='overflow-x:auto;'>";
	echo "<table align='center' width='150%' height='120%'>";
	echo"<tr><th>Logo<th>Company Name<th>Member Name<th>Company Location<th>Contact Info<th>Link to Member's Page</tr>";
	for($i=0; $i<sizeof($results); $i++) {
		echo'<tr>';
		echo'<td>' . $results[$i]['CompanyPicture'] . '</td>';
		echo'<td>' . $results[$i]['CompanyName'] . '</td>';
		echo'<td>' . $results[$i]['ContactName'] . '</td>';
		echo'<td>' . $results[$i]['CompanyCity'] . ", " . $results[$i]['CompanyState'] . '</td>';
		echo'<td>' . '&#9990;: '. $results[$i]['PhoneNumber'] . '<br>&#9993;: ' . $results[$i]['ContactEmail'] . '</td>';
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
<li style='float:left;text-align:center;'><a href='CompanyFind.php'>Try a different letter</a></li>
<li style='margin-left:50%;float:left;text-align:center;'><a href='Home.html'>Return Home</a></li>
</ul>
<br clear=both>
</div>
</div>
</html>