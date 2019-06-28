<?php
   ob_start();
   session_start();
   $con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
   if (!$con)

   {

      die('Connection has failed: ' . mysql_error());

   }
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $username = $_POST['Username'];
      $password = $_POST['Password']; 
      $sql = $con -> query("SELECT MemberId FROM member WHERE Username = '$username' and Password = '$password'");
	  if ($sql)
	  {
		  $_SESSION['valid'] = true;
		  $_SESSION['timeout'] = time();
		  $_SESSION['username'] = $username;
		  echo "Correct username and password!";
	  }
	  else {
		  header("location: FailedLoginMember.html");
	  }
   }
?>