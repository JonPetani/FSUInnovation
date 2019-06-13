<?php

$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');

if (!$con)

  {

  die('Connection has failed: ' . mysql_error());

  }
 
$sql= $con -> query("INSERT INTO member (ContactName, CompanyName, ContactEmail, CompanyCity, CompanyState, PhoneNumber, CompanyPicture, CompanyDescription)

VALUES

('$_POST[ContactName]','$_POST[CompanyName]','$_POST[ContactEmail]','$_POST[CompanyCity]','$_POST[CompanyState]','$_POST[PhoneNumber]','$_POST[CompanyPicture]','$_POST[CompanyDescription]')");

 

if (!mysql_query($sql,$con))

  {

  die('Error: ' . mysql_error());

  }

echo "Success! Welcome to our website. Hope our services will serve you and your company well.";

 

mysql_close($con)

?>

</body>

</html>