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
	echo "<dd>" . $results['ContactName'] . "</dd>";
	echo "<dt>&#9990;:</dt>";
	echo "<dd>" . $results['PhoneNumber'] . "</dd>";
	echo "<dt>&#9993;:</dt>";
	echo "<dd>" . $results['ContactEmail'] . "</dd>";
	echo "<dl></div><br>";
	echo "<h3>Main Location</h3>";
	echo "<div class='select>'";
	echo "<dl>";
	echo "<dt>City</dt>";
	echo "<dd>" . $results['CompanyCity'] . "</dd>";
	echo "<dt>State</dt>";
	echo "<dd>" . $results['CompanyState'] . "</dd>";
	echo "<dl></div><br>";
	echo "<h2>Projects available with this Member</h2>";
	echo "<div style='overflow-x:auto;overflow-y:auto;'>";
	echo "<table align='center' width='150%' height='120%'>";
	$SearchComp = $results['CompanyName'];
	$sql2 = $con -> query("SELECT * FROM jobs WHERE CompanyName = '$SearchComp'");
	$results2 = $sql2 -> fetchall(PDO::FETCH_ASSOC);
	echo"<tr><th>Job Name<th>Description<th>Related Skills/Areas of Study<th>Length of Project (In Weeks)<th>Number of Signups Available Still<th>Requirements/Prerequisite Knowledge<th>Apply Here</tr>";
	for($i=0; $i<sizeof($results2); $i++) {
		if($results[$i]['InternsNeeded') < 1)
			continue;
		echo'<tr>';
		echo'<td>' . $results2[$i]['JobName'] . '</td>';
		echo'<td>' . $results2[$i]['JobDesc'] . '</td>';
		echo'<td>';
		$majors = explode(" ", $results[$i]['JobType']);
		for($i = 0; $i < sizeof($majors); $i++) {
			switch($majors[$i]) { //All Printed Icons are in this lookup table
				case: "Computer Science"
				echo "<img src='images/Skills/CS.png' style='SkillImg' title='Computer Science' alt='Computer Science'/>";
				break;
				
		        case: "IT"
				echo "<img src='images/Skills/IT.jpg' style='SkillImg' title='Information Technology' alt='Information Technology'/>";
				break;
				
				case: "Software Engineering"
				echo "<img src='images/Skills/SOFT.png' style='SkillImg' title='Software Engineering' alt='Software Engineering'/>";
				break;
				
				case: "Web Development"
				echo "<img src='images/Skills/WEB.png' style='SkillImg' title='Web Development' alt='Web Development'/>";
				break;
				
				case: "Communications"
				echo "<img src='images/Skills/COMM.png' style='SkillImg' title='Communications' alt='Communications'/>";
				break;
				
				case: "Sociology"
				echo "<img src='images/Skills/SOCI.png' style='SkillImg' title='Sociology' alt='Sociology'/>";
				break;
				
				case: "Hospitality/Tourism"
				echo "<img src='images/Skills/TOUR.png' style='SkillImg' title='Hospitality/Tourism' alt='Hospitality/Tourism'/>";
				break;
				
				case: "Psychology"
				echo "<img src='images/Skills/PSYCH.png' style='SkillImg' title='Psychology' alt='Psychology'/>";
				break;
				
				case: "Geography"
				echo "<img src='images/Skills/GEO.png' style='SkillImg' title='Geography' alt='Geography'/>";
				break;
				
				case: "Nutrition"
				echo "<img src='images/Skills/NUTR.png' style='SkillImg' title='Nutrition' alt='Nutrition'/>";
				break;
				
				case: "Astrology"
				echo "<img src='images/Skills/ASTRO.png' style='SkillImg' title='Astrology' alt='Astrology'/>";
				break;
				
				case: "Biotech"
				echo "<img src='images/Skills/BIOTECH.png' style='SkillImg' title='Biotech' alt='Biotech'/>";
				break;
				
				case: "Biology"
				echo "<img src='images/Skills/BIO.png' style='SkillImg' title='Biology' alt='Biology'/>";
				break;
				
				case: "Chemistry"
				echo "<img src='images/Skills/CHEM.png' style='SkillImg' title='Chemistry' alt='Chemistry'/>";
				break;
				
				case: "Engineering"
				echo "<img src='images/Skills/ENG.png' style='SkillImg' title='Engineering' alt='Engineering'/>";
				break;
				
				default:
				break;
			}
		}
		echo '<br clear=both>';
		echo'</td>';
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