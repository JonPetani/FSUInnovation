<!DOCTYPE html>
<html>
<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
if($_SESSION['UserType'] == "")
	header("location: MemberLogin.php");
if($_SESSION['UserType'] == "Intern")
	header("location: AccessDenied.php");
$session_time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 1200;
if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
	header("location: SessionExpire.php");
$_SESSION['TimeLog'] = $session_time;
?>
	<head>

		<meta charset = "UTF-8">
		<link rel = "stylesheet" href = "index.css"/>
		<title>Job Post Application</title>
		<link rel="icon" type="image/png" href="images/icon.png"/>
		<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>

	</head>

	<body>

		<div class = "header">
			<p class = "new">Post a new Job for Interns</p>
		</div>

		<div class = "content">

			<form action = "PostJob.php" method = "post">

				<div class = "boxcontainer">

					<label>Name of Project:</label>
					<input type = "text" name = "JobName" placeholder="A Name For Your Project" autocomplete='off' required>

					<label>Description of the Task needed:</label><br>
					<textarea name = 'JobDesc' class = "skills" autocomplete='off'></textarea>
                    
					<label>Select the Main Field(s) of Study/Category your job appeals to:</label>
					<br><select name='JobType[]' style='overflow-y:auto;overflow-x:hidden;' autocomplete='off' multiple="multiple" required>
					<option value='Computer Science'>Computer Science</option>
					<option value='IT'>Information Technology</option>
					<option value='Software Engineering'>Software Engineering</option>
					<option value='Web Development'>Web Development</option>
					<option value='Communications'>Communications</option>
					<option value='Sociology'>Sociology</option>
					<option value='Hospitality/Tourism'>Hospitality/Tourism</option>
					<option value='Psychology'>Pyschology</option>
					<option value='Geography'>Geography/GIS</option>
					<option value='Nutrition'>Nutrition</option>
					<option value='Astrology'>Astrology</option>
					<option value='Biotech'>Biotechnology</option>
					<option value='Biology'>Biology</option>
					<option value='Chemistry'>Chemistry</option>
					<option value='Engineering'>Engineering</option>
					<option value='English'>English</option>
					<option value='Foreign Language'>Foreign Language Arts</option>
					<option value='History'>History</option>
					<option value='Art'>Art/Art History</option>
					<option value='Medicine'>Medicine</option>
					<option value='Mathematics'>Mathematics</option>
					<option value='Business'>Business</option>
					<option value='Finance'>Finance</option>
					<option value='Marketing'>Marketing</option>
					<option value='Accounting'>Accounting</option>
					<option value='Management'>Management</option>
					<option value='Writing'>Writing</option>
					<option value='Liberal Arts'>Liberal Arts</option>
					<option value='Graphic Design'>Graphic Design</option>
					</select>
                    <br>
					<label>Enter the estimate number of Weeks you need the Intern(s) for:</label>
					<select name = "TimeNeeded" autocomplete='off' required><br>
					<option value='1'>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
					<option value='4'>4</option>
					<option value='5'>5</option>
					<option value='6'>6</option>
					</select><br>
					<label>Post any job requirements as well as prerequisite skills and expereince needed:</label><br>
					<textarea name = 'JobRequirements' placeholder="Define Here Skills Interns Should At Least Be Aware Of Before Starting." class = "skills" autocomplete='off'></textarea>

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