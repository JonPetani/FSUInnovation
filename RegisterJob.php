<!DOCTYPE html>
<html>
<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
if($_SESSION['UserType'] == "")
	header("location: MemberLogin.php");
if($_SESSION['UserType'] == "Intern")
	header("location: AccessDenied.html");
$session_time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 60;
if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
	header("location: SessionExpire.php");
$_SESSION['TimeLog'] = $session_time;
?>
	<head>

		<meta charset = "UTF-8">
		<link rel = "stylesheet" href = "index.css"/>
		<title>Job Post Application</title>
		<link rel="icon" type="image/png" href="images/icon.png"/>
		<a href="Home.html"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>

	</head>

	<body>

		<div class = "header">
			<p class = "new">Post a new Job for Interns</p>
		</div>

		<div class = "content">

			<form action = "PostJob.php" method = "post">

				<div class = "boxcontainer">

					<label>Name of Job:</label>
					<input type = "text" name = "JobName" autocomplete='off' required>

					<label>Description of the Task needed:</label><br>
					<textarea name = 'JobDesc' class = "skills" autocomplete='off'></textarea>

					<label>Select the Main Field(s) of Study/Category your job appeals to:</label>
					<br><select name='JobType' autocomplete='off' multiple="multiple" required>
					<option value='CS'>Computer Science</option>
					<option value='IT'>Information Technology</option>
					<option value='SENG'>Software Engineering</option>
					<option value='WEB'>Web Development</option>
					<option value='COMM'>Communications</option>
					<option value='AD'>Advertising</option>
					<option value='NUT'>Nutrition</option>
					<option value='BIOT'>Biotechnology</option>
					<option value='BIO'>Biology</option>
					<option value='CHEM'>Chemistry</option>
					<option value='ENG'>Engineering</option>
					<option value='ENGL'>English</option>
					<option value='MED'>Medicine</option>
					<option value='MATH'>Mathematics</option>
					<option value='FIN'>Finance</option>
					<option value='MARK'>Marketing</option>
					<option value='AC'>Accounting</option>
					<option value='MAN'>Management</option>
					<option value='WRI'>Writing</option>
					<option value='RE'>Research</option>
					<option value='GD'>Graphic Design</option>
					</select>
                    <br>
					<label>Enter a estimate number of Interns you need to work on your task:</label>
					<input type = "number" name = "InternsNeeded" autocomplete='off' required><br>

					<label>Post any job requirements as well as prerequisite skills and expereince needed:</label><br>
					<textarea name = 'JobRequirements' class = "skills" autocomplete='off'></textarea>

					<label style='float:left;padding-bottom:30px;'>In order to post a job/task, you must agree to our terms of service <a href='terms.html' target="_blank">found here</a>: <input name='check' onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" type="checkbox" value="Agree" required></label>
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