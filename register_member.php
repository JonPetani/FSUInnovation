<!--The Member Register Page. New members and/or companies can make their profiles here.-->
<!DOCTYPE html>
<html>
	<head>
		<title>Member Sign Up Page</title>
		<link rel="icon" type="image/png" href="images/icon.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" href = "css/index.css"/>
		<link rel= "stylesheet" href="css/Intern1.css"/>
		<!--<link rel="stylesheet" type="text/css" href="member_page.css">-->
		<!--<link href='intern.css' rel='stylesheet'/>-->
	</head>
	<body>
	<script src='https://www.google.com/recaptcha/api.js' async defer></script>
		<!-- Needed for Member Page:
				- name of contact person
				- name of company
				- email address
				- company description (link to website)
				- location
				- phone (optional)
				- picture (company logo or contact pic)
				- available projects (internships)
					- description, requirements, duration
				- have a separate page for the project/internships
		-->
		<header style="margin-bottom:60px">
			<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
			<p class = 'new' align="center">Create New Member Account</p>
		</header>
		<!--<div id="navMenu" align="center">
			<a href="Home.html"><button class="navButton">Home</button></a>
			<a href=""><button class="navButton">Interns</button></a>
			<a href=""><button class="navButton">Members</button></a>
			<a href=""><button class="navButton">Discussion Boards</button></a>
			<a href=""><button class="navButton">Newsfeed</button></a>
		</div>-->
		<div class = 'content'>
			<form action="MemberInsert.php" enctype = "multipart/form-data" method="post">
			<div class="boxcontainer">
						<label for="ContactName">Contact Name: </label>
						<input type="text" name="ContactName" placeholder="Your Actual Name. The Person Interns Will Be Talking With During a Project." autocomplete="off" required autofocus>
						<label for="CompanyName">Company Name: </label>
						<input type="text" name="CompanyName" placeholder="Name of Your Company" autocomplete="off" required>
						<label for="ContactEmail">Email Address: </label>
						<input type="email" name="ContactEmail" placeholder="Your Email Address (Verification Email Will Be Sent)" autocomplete="off" required>
						<label for="Username">Username: </label>
						<input type="text" name="Username" placeholder="Username For Your Account" autocomplete="off" required>
						<label for="Password">Password: </label>
						<input style='width:100%;height:42.5px;' type="password" placeholder="Password To Keep Your Account Safe" name="Password" autocomplete="off" required>
						<label for="CompanyPicture">Profile Picture: </label>
						<input type = "file" name = "CompanyPicture" autocomplete='off' required>
						<label for="CompanyCity">Location (City): </label>
						<input type="text" name="CompanyCity" placeholder="City/Town Your Company Is From" autocomplete="off" required>
						<label for="CompanyState">Location (State): </label>
						<input type="text" name="CompanyState" autocomplete="off" placeholder="State Your Company Is From" required>
						<label for="PhoneNumber">Phone: </label>
						<input type="tel" name="PhoneNumber" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Contact Number For Your Company" autocomplete="off">
						<label for="CompanyDescription">Company Description: </label>
						<textarea name="CompanyDescription" class="skills" placeholder="Describe Your Company. What Does Your Company Do and What Should Interns Know About It Before Doing a Project With You." autocomplete="off" required></textarea>
						<br><div align=center class="g-recaptcha" data-sitekey="6Le9NsgUAAAAAFvjCyl8yJ_npsTDpIEoumWFe5Zn"></div><br>
				<label style='float:left;padding-bottom:30px;'>In order to create a account, you must agree to our terms of service <a href='terms.html' target="_blank">found here</a>: <input name='check' onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" type="checkbox" value="Agree" required></label>
				<input id="submitButton" type="submit" value="Submit" style='float:left;background-color:#66ff99;width:21%;height:10%;'><br><br>
				<br>
				</div>
				</div>
				<br clear=both>
				<script>
					function checkForm(form)
					{
						...
						if(!form.check.checked) {
						  alert("You are required to read and accept the Terms of Service before creating a account.");
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