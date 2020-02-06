<!--The Navagation Page of the Intern Webiste. Provides links to all pages on the website.-->
<!--Main Developer: Jonathan Petani, Co-Collaborators: Jessica Grady, Simone McHugh-->
<!DOCTYPE html>
<html>
<head>
<title>Edit Profile</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='css/Intern1.css' rel='stylesheet'/>
<link href='css/member_page.css' rel='stylesheet'/>
</head>
<body align=center>
<p id="top"></p>
		<div id='links'>
			<a href='Home.php'>Home</a>
			<a href="https://www.framingham.edu" target="_blank" style="margin-left: 30px">Framingham.edu</a>
			<a href='Login.php' id="si" style="margin-right: 30px;float: right;">Sign In</a>
			<a href='RegisterHub.php' id="su" style="margin-right: 30px;float: right;">Sign Up</a>
			
<?php
		session_start();
		$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
		if(isset($_SESSION['loggedin'])) {
			if($_SESSION['loggedin'] == true) {
				$session_time = $_SERVER['REQUEST_TIME'];
				$timeout_duration = 1200;
				if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
					header("Location:SessionExpire.php?location=" . urlencode($_SERVER['REQUEST_URI']));
				$_SESSION['TimeLog'] = $session_time;
				if($_SESSION['UserType'] == "Member") {
					echo "<script>";
					echo "var parent = document.getElementById('links');";
					echo "var child1 = document.getElementById('su');";
					echo "var child2 = document.getElementById('si');";
					echo "parent.removeChild(child1);";
					echo "parent.removeChild(child2);";
					echo "</script>";
					echo "<a href='LogOut.php'><img src='images/PowerOpen.png' class='accounts' onmouseover='this.src=\"images/PowerPressed.png\";' onmouseout='this.src=\"images/PowerOpen.png\";' alt='Log Out Tab'/>";
					echo "<a href='UserControlPanel.php'><img src='images/GearOff.png' class='accounts' onmouseover='this.src=\"images/GearOn.png\";' onmouseout='this.src=\"images/GearOff.png\";' alt='Account Tab'/>";
					echo "<a href='PrivateMessageBoard.php'><img src='images/PM.png' class='accounts' onmouseover='this.src=\"images/PMOpen.png\";' onmouseout='this.src=\"images/PM.png\";' onclick='' alt='Private Messages'/></a>";
					}
				else if($_SESSION['UserType'] == "Intern") {
					echo "<script>";
					echo "var parent = document.getElementById('links');";
					echo "var child1 = document.getElementById('su');";
					echo "var child2 = document.getElementById('si');";
					echo "parent.removeChild(child1);";
					echo "parent.removeChild(child2);";
					echo "</script>";
					echo "<a href='LogOut.php'><img src='images/PowerOpen.png' class='accounts' onmouseover='this.src=\"images/PowerPressed.png\";' onmouseout='this.src=\"images/PowerOpen.png\";' alt='Log Out Tab'/>";
					echo "<a href='UserControlPanel.php'><img src='images/GearOff.png' class='accounts' onmouseover='this.src=\"images/GearOn.png\";' onmouseout='this.src=\"images/GearOff.png\";' alt='Account Tab'/>";
					echo "<a href='PrivateMessageBoard.php'><img src='images/PM.png' class='accounts' onmouseover='this.src=\"images/PMOpen.png\";' onmouseout='this.src=\"images/PM.png\";' onclick='' alt='Private Messages'/></a>";
					}
			}
		}
		$logged_in_page;
		$photo;
		$email;
		$name;
		if (!isset($_SESSION['UserType'])) {
			header("Location: AccessDenied.php");
		}
		else {
			if ($_SESSION['UserType'] == "Member") {
				$logged_in_page = "LoggedInMember.php";
				$photo = $_SESSION['CompanyPicture'];
				$email = $_SESSION['ContactEmail'];
				$name = $_SESSION['ContactName'];
			}
			else if ($_SESSION['UserType'] == "Intern") {
				$logged_in_page = "LoggedInIntern.php";
				$photo = $_SESSION['InternPhoto'];
				$email = $_SESSION['EmailAddress'];
				$name = $_SESSION['InternName'];
			}
		}
		$username = $_SESSION['Username'];
?>
		</div>
		<hr color="#FFC400">
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>Edit Profile</h1>
<div class='txt'>
<h2 align=center >What Your Account Looks Like Now</h2>
<?php
echo "<h3 align=center >" . $name . "</h3>";
echo "<div align=center >";
echo "<img src='" . $photo . "' alt='Comp Pic' />";
echo "</div>";
echo "<h3 align=center >" . $username . "</h3>";
echo "<h3 align=center >" . $email . "</h3>";
?>
</div>
<?php
$sql;
$now;
$page = "UpdateAccount.php?atype=" . $_SESSION['UserType'];
			if ($_SESSION['UserType'] == "Member") {
				$sql = $con -> query("SELECT * FROM member WHERE ContactEmail = '$_SESSION[ContactEmail]'");
				$now = $sql -> fetch(PDO::FETCH_ASSOC);
				echo "<h2>Edit Your Member Profile Here</h2>";
					echo'<div class="container">';
			echo'<form action="ChangeProfile.php" method="post" enctype="multipart/form-data">';
				echo'<div class="row">';
					echo'<div class="col-25">';
						echo'<label for="Username">Update Username: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input type="text" name="Username" autocomplete="off" placeholder="Type a New Username" autofocus>';
					echo'</div>';
				echo'</div>';
				echo'<div class="row" id="p">';
				echo'<h3>New Password (Requires Old One to Change):</h3>';
					echo'<div class="col-25">';
						echo'<label for="PasswordOld">Enter Old Password: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="password" name="PasswordOld" placeholder="Enter Your Current Password" autocomplete="off">';
					echo'</div>';
					echo'</div>';
					echo'<div class="row">';
					echo'<div class="col-25">';
						echo'<label for="PasswordNew">Enter New Password: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="password" name="PasswordNew" placeholder="Enter Your New Password" autocomplete="off">';
					if(isset($_GET['error'])) {
					if ($_GET['error'] == 'passcheck') {
						echo"<h2 style='font-family:Perpetua;background-color:yellow;'>Error, you must enter the old password before you can modify it.</h2>";
					   }
				    }
					echo'</div>';
					echo'</div>';
					
					echo'<div class="row">';
				    echo'<h3>Update Your Contact Email (Verification Email Will Be Sent):</h3>';
					echo'<div class="col-25">';
						echo'<label for="ContactEmail">Enter New Email Address: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="email" name="ContactEmail" placeholder="Enter Your New Email Address" autocomplete="off">';
					if(isset($_GET['error'])) {
					if ($_GET['error'] == 'passcheck') {
						echo"<h2 style='font-family:Perpetua;background-color:yellow;'>Error, A glitch prevented us from sending the required verification email. Please enter the address again. If there is still a issue, report it to a admin.</h2>";
					   }
				    }
					echo'</div>';
					echo'</div>';
					echo'<div class="row">';
					echo'<div class="col-25">';
						echo'<label for="CompanyCity">Update Your City/Town Location: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="text" name="CompanyCity" placeholder="Enter The Town/City Your Company Operates Out Of" autocomplete="off">';
					echo'</div>';
					echo'</div>';
					echo'<div class="row">';
					echo'<div class="col-25">';
						echo'<label for="CompanyState">Update State: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="text" name="CompanyState" placeholder="Enter The State Your Company Operates Out Of" autocomplete="off">';
					echo'</div>';
					echo'</div>';
					echo'<div class="row">';
					echo'<div class="col-25">';
						echo'<label for="PhoneNumber">Update Contact Number: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="PhoneNumber" placeholder="Enter The Phone Number Your Company Uses For Contact" autocomplete="off">';
					echo'</div>';
					echo'</div>';
					echo'<div class="row">';
					echo'<div class="col-25">';
						echo'<label for="CompanyPicture">Update Your Company Logo / Account Image: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="file" name="CompanyPicture" autocomplete="off">';
					echo'</div>';
					echo'</div>';
					echo'<div class="row">';
					echo'<div class="col-25">';
						echo'<label for="CompanyDescription">Update Company Description: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<textarea name="CompanyDescription" class="skills" placeholder="Update Your Company\'s Description On The Site" autocomplete="off"></textarea>';
					echo'</div>';
					echo'</div>';
					echo'<div class="row">';
					echo'<input id="submitButton" type="submit" value="Submit">';
				echo'</div>';
				echo'</div>';
echo'<br clear=both>';
echo'</div>';
			}
			else if ($_SESSION['UserType'] == "Intern") {
				$sql = $con -> query("SELECT * FROM intern WHERE EmailAddress = '$_SESSION[EmailAddress]'");
				$now = $sql -> fetch(PDO::FETCH_ASSOC);
				echo "<h2>Edit Your Intern Profile Here</h2>";
					echo'<div class="container">';
			echo'<form action="ChangeProfile.php" method="post" enctype="multipart/form-data">';
				echo'<div class="row">';
					echo'<div class="col-25">';
						echo'<label for="Username">Update Username: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input type="text" name="Username" autocomplete="off" placeholder="Type a New Username" autofocus>';
					echo'</div>';
				echo'</div>';
				echo'<div class="row">';
				if(isset($_GET['error'])) {
					if($_GET['error'] == 'passcheck') {
				echo'<div class="entryerror">';
				echo'<h3>New Password (Requires Old One to Change):</h3>';
				echo'<h4>You Must Enter The Old Password Before A New One Can Be Used</4>';
					echo'<div class="col-25">';
						echo'<label for="PasswordOld">Enter Old Password: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="password" name="PasswordOld" placeholder="Enter Your Current Password" autocomplete="off">';
					echo'</div>';
					echo'</div>';
					echo'<div class="row">';
					echo'<div class="col-25">';
						echo'<label for="PasswordNew">Enter New Password: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="password" name="PasswordNew" placeholder="Enter Your New Password" autocomplete="off">';
					echo"</div>";
					}
				}
				else {		
				echo'<h3>New Password (Requires Old One to Change):</h3>';
					echo'<div class="col-25">';
						echo'<label for="PasswordOld">Enter Old Password: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="password" name="PasswordOld" placeholder="Enter Your Current Password" autocomplete="off">';
					echo'</div>';
					echo'</div>';
					echo'<div class="row">';
					echo'<div class="col-25">';
						echo'<label for="PasswordNew">Enter New Password: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="password" name="PasswordNew" placeholder="Enter Your New Password" autocomplete="off">';
				}
					echo'</div>';
					echo'</div>';
					echo'<div class="row">';
				    echo'<h3>Update Your Contact Email (Verification Email Will Be Sent):</h3>';
					echo'<div class="col-25">';
						echo'<label for="EmailAddress">Enter New Email Address: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="email" name="EmailAddress" placeholder="Enter Your New Email Address" autocomplete="off">';
					echo'</div>';
					echo'</div>';
					echo'<div class="row">';
					echo'<div class="col-25">';
						echo'<label for="City">Update Your City/Town Location: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="text" name="City" placeholder="Enter The Town/City Your Company Operates Out Of" autocomplete="off">';
					echo'</div>';
					echo'</div>';
					echo'<div class="row">';
					echo'<div class="col-25">';
						echo'<label for="State">Update State: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="text" name="State" placeholder="Enter The State Your Company Operates Out Of" autocomplete="off">';
					echo'</div>';
					echo'</div>';
					echo'<div class="row">';
					echo'<div class="col-25">';
						echo'<label for="PhoneNumber">Update Contact Number: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="PhoneNumber" placeholder="Enter The New Phone Number You Want To Be Reached At" autocomplete="off">';
					echo'</div>';
					echo'</div>';
					echo'<div class="row">';
					echo'<div class="col-25">';
						echo'<label for="InternPhoto">Update Your Portrait / Account Image: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="file" name="InternPhoto" autocomplete="off">';
					echo'</div>';
					echo'</div>';
					echo'<div class="row">';
					echo'<div class="col-25">';
						echo'<label for="School">Update School: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="text" name="School" placeholder="Change School If You Transfered To Another University Within Our Network" autocomplete="off">';
					echo'</div>';
					echo'</div>';
					echo'<div class="row">';
					echo'<div class="col-25">';
						echo'<label for="Major">Update Major: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="text" name="Major" placeholder="If You Switched Majors Or Selected One Finally, Enter It Here To Find Proper Internships For Your Field Of Study" autocomplete="off">';
					echo'</div>';
					echo'</div>';
					echo'<div class="row">';
					echo'<div class="col-25">';
						echo'<label for="GPA">Update GPA: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="number" name="GPA" placeholder="Enter Your New GPA If You Completed Any Additional Course Credits" autocomplete="off">';
					echo'</div>';
					echo'</div>';
					echo'<div class="row">';
					echo'<div class="col-25">';
						echo'<label for="Resume">Update Your Resume: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="file" name="Resume" autocomplete="off">';
					echo'</div>';
					echo'</div>';
					echo'<div class="row"/>';
					echo'<div class="col-25"/>';
						echo'<label for="SkillsAndExperience">Update Skills And/Or Experiences: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<textarea name="SkillsAndExperience" class="skills" placeholder="If There\'s Any New Skills You Acquired That Will Be Helpful For Members, Enter Them Here" autocomplete="off"></textarea>';
					echo'</div>';
					echo'</div>';
					echo'<div class="row">';
					echo'<input id="submitButton" type="submit" value="Submit">';
				echo'</div>';
				echo'</div>';
			}
?>
<footer>
<hr>
<address><strong>&copy;	Framingham State University Entreperenuer Innovation Center</strong></address>
</footer>
</body>
</html>