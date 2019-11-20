<!DOCTYPE html>
<html>
<head>
<title>Company Found</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='css/Intern.css' rel='stylesheet'/>
</head>
<body>
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>The Company <?php echo substr($_GET['comp'], 1, strlen($_GET['comp']) - 2);?> Was Found</h1>
<div class='txt'>
<h2 align=center>These are the Details about this Company</h2>
<p>Look at the information below to confirm that this is the company you searched for.
<p>If it was, you can visit their page below to see available jobs and other related information.</p>
<?php
	$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
	$CompanyName = substr($_GET['comp'], 1, strlen($_GET['comp']) - 2);
	$sql = $con -> query("SELECT * FROM member WHERE CompanyName = '$CompanyName'");
    $results = $sql -> fetchAll(PDO::FETCH_ASSOC);
	echo '<table align=center width="100%" height="150%">';
	echo '<tr><td><h3>' . $CompanyName .'</h3></td></tr>';
	echo '<tr><td>' . '<img src="' . $results[$i]['CompanyPicture'] . '" class="TableImg" alt="profile picture"/></td><tr>';
	$Company = $results[0]['CompanyName'];
	echo "<tr><td>Click the Button Below to View More Information on the Company's Page<br><a href='CompanyPage.php?comp=" . $Company . "'><img align=center src='images/ToPage.jpg' style='width:15%;height:15%;' alt='To Next Page'/></a></td></tr>";
	echo '</table>';
?>
<br>
<div class='select'>
<h3 align=center>This isn't the Company you had in mind?</h3>
<ul type=none>
<li style='float:left;text-align:center;'><a href='CompanyFind.php'>Try Again</a></li>
<li style='margin-left:50%;float:left;text-align:center;'><a href='Home.php'>Return Home</a></li>
</ul>
<br clear=both>
</div>
</div>
</html>