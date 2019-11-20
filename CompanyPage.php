<!DOCTYPE html>
<html>
<head>
<title><?php $con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495'); echo $_GET['comp']; ?></title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='css/Intern.css' rel='stylesheet'/>
</head>
<body>
<?php
	$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
	$sql = $con -> query("SELECT * FROM member WHERE CompanyName = '$_GET[comp]'");
    $results = $sql -> fetch(PDO::FETCH_ASSOC);
?>
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1><?php echo $_GET['comp']; ?></h1>
<img src="<?php echo $results['CompanyPicture'];?>" width='250' height='300' alt='profile picture'/>
<div class='txt'>
<h2>This Page Has All Information Pertaining to the Company named above</h2>
<?php
	echo $_GET['comp'];
	echo "<h3>Contact Information</h3>";
	echo "<div class='select>'";
	echo "<dl>";
	echo "<dt>Contact's Name</dt>";
	echo "<dd>" . $results[0]['ContactName'] . "</dd>";
	echo "<dt>&#9990;:</dt>";
	echo "<dd>" . $results[0]['PhoneNumber'] . "</dd>";
	echo "<dt>&#9993;:</dt>";
	echo "<dd>" . $results[0]['ContactEmail'] . "</dd>";
	echo "<dl></div><br>";
	echo "<h3>Main Location</h3>";
	echo "<div class='select>'";
	echo "<dl>";
	echo "<dt>City</dt>";
	echo "<dd>" . $results[0]['CompanyCity'] . "</dd>";
	echo "<dt>State</dt>";
	echo "<dd>" . $results[0]['CompanyState'] . "</dd>";
	echo "<dl></div><br>";
	echo "<h2>Projects available with this Member</h2>";
	echo "<div style='overflow-x:auto;overflow-y:auto;'>";
	echo "<table align='center' width='150%' height='120%'>";
	$SearchComp = $results[0]['CompanyName'];
	$sql2 = $con -> query("SELECT * FROM jobs WHERE CompanyName = '$SearchComp'");
	$results2 = $sql2 -> fetchall(PDO::FETCH_ASSOC);
	echo"<tr><th>Job Name<th>Description<th>Related Skills/Areas of Study<th>Length of Project (In Weeks)<th>Requirements/Prerequisite Knowledge<th>Apply Here</tr>";
	for($i=0; $i<sizeof($results2); $i++) {
		echo'<tr>';
		echo'<td>' . $results2[$i]['JobName'] . '</td>';
		echo'<td>' . $results2[$i]['JobDesc'] . '</td>';
		$skills = $con -> query("SHOW COLUMNS FROM jobs WHERE JobType = '$results[$i][JobType]'");
		preg_match("/^enum\(\'(.*)\'\)$/", $skills, $res);
		$icons = explode("','", $res[1]);
		echo "<td> " . $results2[$i]['TimeNeeded'] . "</td>";
		echo'<td>' . $results2[$i]['InternsNeeded'] . '</td>';
		echo'<td>' . $results2[$i]['JobRequirements'] . '</td>';
		echo'<td><a href="Apply.php?job=' . $results2[$i]['JobId'] . '"><img src="images/SignUp.png" class="TableImg" alt="To Next Page"/></a></td>';
		echo'</tr>';
		}
		echo"</table>";
		echo"</div>";
?>
<br>
<div class='select'>
<h3 align=center>Want to View Another Company's Page?</h3>
<ul type=none>
<li style='float:left;text-align:center;'><a href='CompanyFind.php'>Search for Another Company</a></li>
<li style='margin-left:50%;float:left;text-align:center;'><a href='Home.php'>Return Home</a></li>
</ul>
<br clear=both>
</div>
</div>
</html>