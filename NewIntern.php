<!DOCTYPE html>
<html>
	<head>

		<meta charset = "UTF-8">
		<link rel = "stylesheet" href = "css/index.css"/>
		<title>Intern Sign Up Page</title>
		<link rel="icon" type="image/png" href="images/icon.png"/>
		<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>

	</head>

	<body>
		<div class = "header">
			<p class = "new">Create New Intern Account</p>
		</div>

		<div class = "content">

			<form action = "InternInsert.php" enctype = "multipart/form-data" method = "post">

				<div class = "boxcontainer">

					<label>Full Name:</label>
					<input type = "text" name = "InternName" autocomplete='off' required>

					<label>Email:</label>
					<input type = "email" name = "EmailAddress" autocomplete='off' required><br>

					<label>Username:</label>
					<input type = "text" name = "Username" autocomplete='off' required>

					<label>Password:</label>
					<input type = "password" name = "Password" autocomplete='off' required>

					<label>School/University:</label>
					<input type = "text" name = "School" autocomplete='off' required>
                    
					<label>Profile Picture:</label>
					<input type = "file" name = "InternPhoto" autocomplete='off' required>
					
					<label>Major:</label>
					<input type = "text" name = "Major" autocomplete='off' required>					

					<label>GPA:</label>
					<input type = "text" name = "GPA" autocomplete='off'>

					<label>City:</label>
					<input type = "text" name = "City" autocomplete='off' required>

					<label>State:</label>
					<input type = "text" name = "State" autocomplete='off' required>

					<label>Phone Number:</label>
					<input type="tel" name="PhoneNumber" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" autocomplete="off">

					<label>Resume:</label>
					<input type="file" name="Resume" accept='application/octet-stream' autocomplete="off"><br>
					
					<label>Skills and Experience(in lieu of Resume):</label>
					<textarea name="SkillsAndExperience" class="skills" autocomplete="off"></textarea>

					<label style='float:left;padding-bottom:30px;'>In order to create a account, you must agree to our terms of service <a href='terms.html' target="_blank">found here</a>: <input name='check' onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" type="checkbox" value="Agree" required></label>
				<input id="submitButton" type="submit" value="Submit" style='float:left;background-color:#66ff99;width:21%;height:10%;'>
				<br>
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