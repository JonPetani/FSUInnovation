<?php
	$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
	$sql = "SELECT * FROM keywords WHERE '{$_POST[Keyword]}' = Keyword ";
    $results = mysql_fetch_array($sql);
	echo "Working!";
?>