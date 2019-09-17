<?php

$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');

if (!$con)

  {

  die('Connection has failed: ' . mysql_error());

  }
 
$sql= $con -> query("INSERT INTO member (ContactName, CompanyName, ContactEmail, Username, Password, CompanyCity, CompanyState, PhoneNumber, CompanyPicture, CompanyDescription)

VALUES

('$_POST[ContactName]','$_POST[CompanyName]','$_POST[ContactEmail]','$_POST[Username]','$_POST[Password]','$_POST[CompanyCity]','$_POST[CompanyState]','$_POST[PhoneNumber]','$_POST[CompanyPicture]','$_POST[CompanyDescription]')");

 
/*
if (!query($sql,$con))

  {

  die('Error: ' . mysql_error());

  }
*/
$EmailVerify = "Hello " . $_POST['ContactName'] . ", this is just a simple message to confirm that you registered a account on the Framingham State Innovation Center Website. If you did not, you should contact us right away thank you. ";
$EmailVerify = wordwrap($EmailVerify, 70);
mail($_POST['ContactEmail'],"Your New Account with FSU Innovation Center",$EmailVerify); 
if($mail)
	echo "Working!";
//header("location: Success.php")
/*echo "*Success! Welcome to our website. Hope our services will serve you and your company well.";*/

 

//$con = null;

?>

</body>

</html>