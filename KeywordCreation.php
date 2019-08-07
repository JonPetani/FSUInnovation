<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');

if (!$con)

  {

  die('Connection has failed: ' . mysql_error());

  }
$keyarr = explode('/', trim($_POST['Keyword']));
for ($i = 0; $i < sizeof($keyarr) - 1; $i++) {
$sql= $con -> query("INSERT INTO keywords (CompanyName, Keyword)

VALUES

('$_SESSION[CompanyName]','$keyarr[$i]')");
}
 
/*
if (!query($sql,$con))

  {

  die('Error: ' . mysql_error());

  }
*/
header("location: KeywordsAdded.html");
/*echo "*Success! Welcome to our website. Hope our services will serve you and your company well.";*/

 

//$con = null;

?>

</body>