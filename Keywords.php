<?php
	$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
	$keyword = $_POST['Keyword'];
	$results = $con -> query("SELECT * FROM member WHERE keyword.Keyword = $keyword AND keyword.CompanyName = member.CompanyName");
	while(){
	}
	
?>