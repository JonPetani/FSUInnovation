<?php
session_start();
$con = new PDO('mysql:host=sql208.byethost.com;dbname=b32_24537897_internsite;charset=utf8mb4','b32_24537897','Sayhello123');

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
header("location: KeywordsAdded.php");
/*echo "*Success! Welcome to our website. Hope our services will serve you and your company well.";*/

 

//$con = null;

?>

</body>