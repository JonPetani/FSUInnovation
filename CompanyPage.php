<!DOCTYPE html>
<html>
<head>
<title><?php $con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495'); echo $_GET['comp']; ?></title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='css/Intern1.css' rel='stylesheet'/>
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
	echo"<p>Projects are listed by Recency. If you want to view older Projects still open scroll down.</p>";
	$SearchComp = $results['CompanyName'];
	$sql2 = $con -> query("SELECT * FROM jobs WHERE CompanyName = '$SearchComp'");
	$results2 = $sql2 -> fetchall(PDO::FETCH_ASSOC);
	echo"<tr><th>Protect Name<th>Description<th>Related Skills/Areas of Study<th>Length of Project (In Weeks)<th>Number of Signups Available Still<th>Requirements/Prerequisite Knowledge<th>Apply Here</tr>";
	for($i=0; $i<sizeof($results2); $i++) {
		if($results2[$i]['InternLimit'] < 1)
			continue;
		echo'<tr>';
		echo'<td>' . $results2[$i]['JobName'] . '</td>';
		echo'<td>' . $results2[$i]['JobDesc'] . '</td>';
		echo'<td>';
		$majors = explode(" ", $results2[$i]['JobType']);
		for($j = 0; $j < sizeof($majors); $j++) { //skills icon lookup table
			switch($majors[$j]) { //All Printed Icons are in this lookup table
			
				case "Computer-Science":
				echo "<img src='images/Skills/CS.png' class='SkillImg' title='Computer Science' alt='Computer Science'/>";
				break;
				
		        case "IT":
				echo "<img src='images/Skills/IT.jpg' class='SkillImg' title='Information Technology' alt='Information Technology'/>";
				break;
				
				case "Software-Engineering":
				echo "<img src='images/Skills/SOFT.png' class='SkillImg' title='Software Engineering' alt='Software Engineering'/>";
				break;
				
				case "Web-Development":
				echo "<img src='images/Skills/WEB.png' class='SkillImg' title='Web Development' alt='Web Development'/>";
				break;
				
				case "Communications":
				echo "<img src='images/Skills/COMM.png' class='SkillImg' title='Communications' alt='Communications'/>";
				break;
				
				case "Sociology":
				echo "<img src='images/Skills/SOCI.jpg' class='SkillImg' title='Sociology' alt='Sociology'/>";
				break;
				
				case "Hospitality/Tourism":
				echo "<img src='images/Skills/TOUR.png' class='SkillImg' title='Hospitality/Tourism' alt='Hospitality/Tourism'/>";
				break;
				
				case "Psychology":
				echo "<img src='images/Skills/PSYCH.png' class='SkillImg' title='Psychology' alt='Psychology'/>";
				break;
				
				case "Geography":
				echo "<img src='images/Skills/GEO.png' class='SkillImg' title='Geography' alt='Geography'/>";
				break;
				
				case "Nutrition":
				echo "<img src='images/Skills/NUTR.jpg' class='SkillImg' title='Nutrition' alt='Nutrition'/>";
				break;
				
				case "Astrology":
				echo "<img src='images/Skills/ASTRO.png' class='SkillImg' title='Astrology' alt='Astrology'/>";
				break;
				
				case "Biotech":
				echo "<img src='images/Skills/BIOTECH.jpg' class='SkillImg' title='Biotech' alt='Biotech'/>";
				break;
				
				case "Biology":
				echo "<img src='images/Skills/BIO.jpg' class='SkillImg' title='Biology' alt='Biology'/>";
				break;
				
				case "Chemistry":
				echo "<img src='images/Skills/CHEM.jpg' class='SkillImg' title='Chemistry' alt='Chemistry'/>";
				break;
				
				case "Engineering":
				echo "<img src='images/Skills/ENG.png' class='SkillImg' title='Engineering' alt='Engineering'/>";
				break;
				
				case "English":
				echo "<img src='images/Skills/ENGL.jpg' class='SkillImg' title='English' alt='English'/>";
				break;
				
				case "Foreign-Language":
				echo "<img src='images/Skills/FOR.png' class='SkillImg' title='Foreign Language' alt='Foreign Language'/>";
				break;
				
				case "History":
				echo "<img src='images/Skills/HIST.png' class='SkillImg' title='History' alt='History'/>";
				break;
				
				case "Art":
				echo "<img src='images/Skills/ART.png' class='SkillImg' title='Art' alt='Art'/>";
				break;
				
				case "Medicine":
				echo "<img src='images/Skills/MED.jpg' class='SkillImg' title='Medicine' alt='Medicine'/>";
				break;
				
				case "Mathematics":
				echo "<img src='images/Skills/MATH.jpg' class='SkillImg' title='Mathematics' alt='Mathematics'/>";
				break;
				
				case "Business":
				echo "<img src='images/Skills/BUS.png' class='SkillImg' title='Business' alt='Business'/>";
				break;
				
				case "Finance":
				echo "<img src='images/Skills/FIN.png' class='SkillImg' title='Finance' alt='Finance'/>";
				break;
				
				case "Marketing":
				echo "<img src='images/Skills/MARK.jpg' class='SkillImg' title='Marketing' alt='Marketing'/>";
				break;
				
				case "Accounting":
				echo "<img src='images/Skills/ACC.jpg' class='SkillImg' title='Accounting' alt='Accounting'/>";
				break;
				
				case "Management":
				echo "<img src='images/Skills/MANAGE.jpg' class='SkillImg' title='Management' alt='Management'/>";
				break;
				
				case "Writing":
				echo "<img src='images/Skills/WRITE.jpg' class='SkillImg' title='Writing' alt='Writing'/>";
				break;
				
				case "Graphic-Design":
				echo "<img src='images/Skills/GRAPH.png' class='SkillImg' title='Graphic Design' alt='Graphic Design'/>";
				break;
				
				default:
				break;
			}
		}
		echo '<br clear=both>';
		echo'</td>';
		echo "<td> " . $results2[$i]['TimeNeeded'] . "</td>";
		echo'<td>' . $results2[$i]['InternLimit'] . '</td>';
		echo'<td>' . $results2[$i]['JobRequirements'] . '</td>';
		echo'<td><a href="Apply.php?job=' . $results2[$i]['JobName'] . '"><img src="images/SignUp.png" style="width:125%;height:125%;float:left;" alt="To Next Page"/></a></td>';
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