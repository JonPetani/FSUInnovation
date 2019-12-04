<?php
   ob_start();
   session_start();
   $con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
   $con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: LoggedInIntern.php");
    exit;
    }
      $username = $password = "";
	  $username_err = $password_err = "";
 
$VerifyTest = $con -> query("SELECT * FROM intern WHERE Username = '$_POST[Username]'");
$VResult = $VerifyTest -> fetchall(PDO::FETCH_ASSOC);
if ($VResult[0]['AccountVerified'] == 0) {
	header("location: FailedLoginIntern.php");
	die;
}
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["Username"]))){
        echo "Please enter username.";
    } else{
        $username = trim($_POST["Username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["Password"]))){
        echo "Please enter your password.";
    } else{
        $password = trim($_POST["Password"]);
    }
	$var = 1;
    // Validate credentials
    if($var == 1){
        // Prepare a select statement
        $sql = "SELECT * FROM intern WHERE Username = :username";
        
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
                        $id = $row["InternId"];
						$name = $row["InternName"];
					    $email = $row["EmailAddress"];
                        $username = $row["Username"];
                        $hashed_password = $row["Password"];
						$image = $row["InternPhoto"];
						$_SESSION["loggedin"] = true;
						$_SESSION["UserType"] = "Intern";
						$_SESSION["InternId"] = $id;
						$_SESSION["InternName"] = $name;
						$_SESSION["EmailAddress"] = $email;
                        $_SESSION["Username"] = $username;
						$_SESSION["Password"] = $hashed_password;
						$_SESSION["InternPhoto"] = $image;
						$_SESSION["LogTime"] = time();
						$url = "";
						$adminCheck = $con -> query("SELECT * FROM admin WHERE AdminCode = '$_SESSION[Password]'");
						$_SESSION['IsAdmin'] = false;
						if($adminCheck->rowCount() > 0) {
							$adminInfo = $adminCheck -> fetch(PDO::FETCH_ASSOC);
							$_SESSION['AdminCode'] = $adminInfo['AdminCode'];
							$_SESSION['Role'] = $adminInfo['Role'];
							$_SESSION['IsAdmin'] = true;
						}
						if (isset($_GET['location']))
							$url = $_GET['location'];
							header("location: " . $url);
                        }
						else
							header("location: LoggedInIntern.php");
                    }
                } else{
					if (isset($_GET['location']))
						header("location: FailedLoginIntern.php?location=" . $_GET['location']);
					else
						header("location: FailedLoginIntern.php");
                }
            } else{
                if (isset($_GET['location']))
						header("location: FailedLoginIntern.php?location=" . $_GET['location']);
				else
						header("location: FailedLoginIntern.php");
            }
        }
        
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($con);
?>