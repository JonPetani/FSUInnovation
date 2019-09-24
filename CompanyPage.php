<!DOCTYPE html>
<html>
<head>
<title><?php $con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495'); echo $_GET['comp']; ?></title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='css/Intern.css' rel='stylesheet'/>
</head>
<body>
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1><?php echo $_GET['comp']; ?></h1>
<img src='data:image/jpeg;base64,<?php echo base64_encode($imagedata);?>' alt='profile image'/>
<div class='txt'>
<h2>This Page Has All Information Pertaining to the Company named above</h2>
<?php
	$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
	
	$sql = $con -> query("SELECT * FROM member WHERE CompanyName = '$_GET[comp]'");
    $results = $sql -> fetchAll(PDO::FETCH_ASSOC);
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
	echo "<h2>Jobs Listed for this Member</h2>";
	echo "<div style='overflow-x:auto;overflow-y:auto;'>";
	echo "<table align='center' width='150%' height='120%'>";
	$SearchComp = $results[0]['CompanyName'];
	$sql2 = $con -> query("SELECT * FROM jobs WHERE CompanyName = '$SearchComp'");
	$results2 = $sql2 -> fetchall(PDO::FETCH_ASSOC);
	echo"<tr><th>Job Name<th>Description<th>Related Skills/Areas of Study<th>Number of Interns Still Needed<th>Requirements/Prerequisite Knowledge<th>Apply Here</tr>";
	for($i=0; $i<sizeof($results2); $i++) {
		echo'<tr>';
		echo'<td>' . $results2[$i]['JobName'] . '</td>';
		echo'<td>' . $results2[$i]['JobDesc'] . '</td>';
		$skills = $con -> query("SHOW COLUMNS FROM jobs WHERE JobType = '$results[$i][JobType]'");
		preg_match("/^enum\(\'(.*)\'\)$/", $skills, $res);
		$icons = explode("','", $res[1]);
		echo "<td>";
		for ($j = 0; $j<sizeof($icons); $j++) {
			switch ($icons[$j]) {
				case 'CS' :
				echo "<img src='images/Skills/CS.png' title='Computer Science' class='SkillImg' alt='Computer Science'/>";
				break;
				case 'IT' :
				echo "<img src='images/Skills/IT.jpg' title='Information Technology' class='SkillImg' alt='IT'/>";
				break;
				case 'SENG' :
				echo "<img src='images/Skills/SOFT.png' title='Software Engineering' class='SkillImg' alt='Software Engineering'/>";
				break;
				case 'WEB' :
				echo "<img src='images/Skills/WEB.png' title='Web Development' class='SkillImg' alt='Web Design'/>";
				break;
				case 'COMM' :
				echo "<img src='images/Skills/COMM.png' title='Communications' class='SkillImg' alt='Communications'/>";
				break;
				case 'AD' :
				echo "<img src='images/Skills/ADVERT.png' title='Advertising' class='SkillImg' alt='Advertising'/>";
				break;
				case 'NUT' :
				echo "<img src='images/Skills/NUTR.jpg' title='Nutrition' class='SkillImg' alt='Nutrition'/>";
				break;
				case 'BIOT' :
				echo "<img src='images/Skills/BIOTECH.jpg' title='Bio Technology' class='SkillImg' alt='Biotech'/>";
				break;
				case 'BIO' :
				echo "<img src='images/Skills/BIO.jpg' title='Biology' class='SkillImg' alt='Biology'/>";
				break;
				case 'CHEM' :
				echo "<img src='images/Skills/CHEM.jpg' title='Chemistry' class='SkillImg' alt='Chemistry'/>";
				break;
				case 'ENG' :
				echo "<img src='images/Skills/ENG.png' title='Engineering' class='SkillImg' alt='Engineering'/>";
				break;
				case 'ENGL' :
				echo "<img src='images/Skills/ENGL.jpg' title='English' class='SkillImg' alt='English'/>";
				break;
				case 'MED' :
				echo "<img src='images/Skills/MED.jpg' title='Medicine/Medical' class='SkillImg' alt='Medicine'/>";
				break;
				case 'MATH' :
				echo "<img src='images/Skills/MATH.jpg' title='Mathematics' class='SkillImg' alt='Math'/>";
				break;
				case 'FIN' :
				echo "<img src='images/Skills/FIN.png' title='Financing' class='SkillImg' alt='Financing'/>";
				break;
				case 'MARK' :
				echo "<img src='images/Skills/MARK.jpg' title='Marketing' class='SkillImg' alt='Marketing'/>";
				break;
				case 'AC' :
				echo "<img src='images/Skills/ACC.jpg' title='Accounting' class='SkillImg' alt='Accounting'/>";
				break;
				case 'MAN' :
				echo "<img src='images/Skills/MANAGE.jpg' title='Management' class='SkillImg' alt='Management'/>";
				break;
				case 'WRI' :
				echo "<img src='images/Skills/WRITE.jpg' title='Writing' class='SkillImg' alt='Writing'/>";
				break;
				case 'RE' :
				echo "<img src='images/Skills/RES.jpg' title='Research' class='SkillImg' alt='Research'/>";
				break;
				case 'GD' :
				echo "<img src='images/Skills/GRAPH.png' title='Graphic Design' class='SkillImg' alt='Graphic Design'/>";
				break;
				default :
				break;
			}
		}
		echo "<br clear=both></td>";
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