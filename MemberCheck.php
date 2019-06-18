<?php
   $con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
   if (!$con)

   {

      die('Connection has failed: ' . mysql_error());

   }
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $username = $_POST['username'];
      $password = $_POST['password']; 
      
      $sql = $con -> query("SELECT MemberId FROM member WHERE Username = '$username' and Password = '$password'");
	  if (!$sql)
	  {
		  die('User Not Found. Try entering Username and Password again: ' . mysql_error());
	  }
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		/*
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $username;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
	  */
   }
?>