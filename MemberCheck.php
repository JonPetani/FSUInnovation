<?php
   ob_start();
   session_start();
   //$file = fopen("C:/Users/Public/login.txt", "w") or die("Didn't Open.");
   $con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
   $con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: LoggedInMember.php");
    exit;
    }
      $username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["Username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["Username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["Password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["Password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT MemberId, Username, Password FROM member WHERE Username = :username";
        
        if($stmt = $con->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["Username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute() == True){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["MemberId"];
                        $username = $row["Username"];
                        $hashed_password = $row["Password"];
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["MemberId"] = $id;
                            $_SESSION["Username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: LoggedInMember.php");
                        } else{
                            // Display an error message if password is not valid
						   //$e = new Exception();
						   //fwrite($e -> getTraceAsString());
						   //fclose($file);
                           //header("location: FailedLoginMember.html");
                        }
                    }
                } else{
					//$e = new Exception();
					//fwrite($e -> getTraceAsString());
					//fclose($file);
                    //header("location: FailedLoginMember.html");
                }
            } else{
				//$e = new Exception();
				//fwrite($e -> getTraceAsString());
				//fclose($file);
                //header("location: FailedLoginMember.html");
            }
        }
        
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($con);
}
fclose($file);
?>