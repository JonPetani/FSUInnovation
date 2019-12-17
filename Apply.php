<!DOCTYPE html>
<html>
<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
if($_SESSION['UserType'] == "")
	header("location: InternLogin.php");
if($_SESSION['UserType'] == "Member")
	header("location: AccessDenied.html")
$session_time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 1200;
if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
	header("location: SessionExpire.php");
$_SESSION['TimeLog'] = $session_time;
?>
	<head>

		<meta charset = "UTF-8">
		<link rel = "stylesheet" href = "index.css"/>
		<title>Job Sign Up Application</title>
		<link rel="icon" type="image/png" href="images/icon.png"/>
		<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>

	</head>

	<body>

		<div class = "header">
			<p class = "new">Sign Up for Task with Member</p>
		</div>

		<div class = "content">

			<form action = "SignUpQueue.php?job=<?php echo $_GET['job']?>" method = "post">

				<div class = "boxcontainer">

					<label>Have you read the job requirements listed on the Company's Page ?:</label>
					<br><input type = "radio" name = "Read" value='Yes' autocomplete='off' required>Yes
					<br><input type = "radio" name = "Read" value='No' autocomplete='off' required>No<br>
					
					<label>Do you agree with the task's requirements and believe to the best of your ability that you will accomplish the task completely?</label>
					<br><input type = "radio" name = "Able" value='Yes' autocomplete='off' required>Yes
					<br><input type = "radio" name = "Able" value='No' autocomplete='off' required>No<br>
					
					<label>Are you alright with the Member having access to relevant information about your account as pertains to the job?</label>
					<br><input type = "radio" name = "Share" value='Yes' autocomplete='off' required>Yes
					<br><input type = "radio" name = "Share" value='No' autocomplete='off' required>I do not. In this case, I ensure that I will message the Company Contact privately to discuss my qualifications.<br>
					
					<label>How much time can you set aside in a given week to the task (Considering tasks for other members as well as Projects assigned to your Internship)</label>
					<br><input type = "number" name = "Time" placeholder="Enter Estimate Hours You Can Put Into The Project" autocomplete='off' required>
					
					<br><label>On the Rating Scale below, how interesting does the project seem to you? If it isn't that interesting, this will help the Member to modify the description and/or task itself to cater to student's interests.</label>
					<select name='Rate' autocomplete='off' required>
					<option value='1'>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
					<option value='4'>4</option>
					<option value='5'>5</option>
					<option value='6'>6</option>
					<option value='7'>7</option>
					<option value='8'>8</option>
					<option value='9'>9</option>
					<option value='10'>10</option>
					</select>
					
					<br><label>What part of the project is of most interest to you?</label>
					<input type = "text" name = "Interest" placeholder="Enter The Parts of The Project That Either Interest You Or Seem The Most Informative" autocomplete='off' required>
					<label style='float:left;padding-bottom:30px;'>In order to sign up for a job/task, you must agree to our terms of service <a href='terms.html' target="_blank">found here</a>: <input name='check' onchange="this.setCustomValidity(validity.valueMissing ? 'Verify that you comply with the terms of this site' : '');" type="checkbox" value="Agree" required></label>
				<input id="submitButton" type="submit" value="Submit" style='float:left;background-color:#66ff99;width:21%;height:10%;'>
				<br>
				</div>
<br clear=both>
				<script>
					function checkForm(form)
					{
						...
						if(!form.check.checked) {
						  alert("You are required to read and accept the Terms of Service before posting a job to ensure your task complies");
						  form.check.focus();
						  return false;
						}
						return true;
					}
				</script>
			</form>
		</div>
		<footer align="center">
			<hr>
			<address><strong>&copy;	Framingham State University Entrepreneur Innovation Center</strong></address>
		</footer>	
	</body>

</html>