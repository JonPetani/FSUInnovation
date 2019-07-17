<?php
	$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
	$keyword = $_POST['Keyword'];
	$results = $con -> query("SELECT * FROM member WHERE keyword.Keyword = $keyword AND keyword.CompanyName <= member.CompanyName");
	
	if ($results == True) {
		echo "These are the results we Found"
		if(mysql_num_rows($raw_results) > 0){
		while($resultant = mysql_fetch_array($results)){
			echo "<p><h3>".$results['CompanyName']."</h3>".$results['ContactName']."</p>";
		}
		}
		else {
			header("location: NoResults.html");
		}
	}
	else {
		header("location: NoResults.html");
	}
?>