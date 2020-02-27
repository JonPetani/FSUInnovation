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
	   	<script src='https://www.google.com/recaptcha/api.js' async defer></script>
		<div class = "header">
			<p class = "new">Create New Intern Account</p>
		</div>

		<div class = "content">

			<form action = "InternInsert.php?Auth=ok" enctype = "multipart/form-data" method = "post">

				<div class = "boxcontainer">

					<label>Full Name:</label>
					<input type = "text" name = "InternName" placeholder="Your Name" autocomplete='off' required>

					<label>Email:</label>
					<input type = "email" name = "EmailAddress" placeholder="The Email Address Assigned By Your Participating School(Verification Email Will Be Sent)" autocomplete='off' required><br>

					<label>Username:</label>
					<input type = "text" name = "Username" placeholder="Username For Your Account" autocomplete='off' required>

					<label>Password:</label>
					<input type = "password" name = "Password" placeholder="Password To Keep Your Account Safe" autocomplete='off' required>

					<label>School/University:</label>
					<input type = "text" name = "School" placeholder="Name Of Your Participating School" autocomplete='off' required>
                    
					<label>Profile Picture:</label>
					<input type = "file" name = "InternPhoto" placeholder="Image For Your Account (Photo of You is Preferred But Not Required)" autocomplete='off' required>
					
					<label>Major:</label>
					<input type = "text" name = "Major" placeholder="Your Field of Study. Use the Major Name Defined By Your School" autocomplete='off' required>					

					<label>GPA:</label>
					<input type = "text" name = "GPA" placeholder="Enter Grade Point Average (Will Help Find Good Projects For You)" autocomplete='off'>

					<label>City:</label>
					<input type = "text" name = "City" placeholder="What City/Town You Are From Or Residing In Currently" autocomplete='off' required>

					<label>State:</label>
					<input type = "text" name = "State" placeholder="The State You Are From Or Residing In Currently" autocomplete='off' required>

					<label>Phone Number:</label>
					<input type="tel" name="PhoneNumber" placeholder="Phone Number You Can Be Contacted From" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" autocomplete="off">

					<!--<label>Resume:</label>
					<input type="file" name="Resume" accept='application/octet-stream' autocomplete="off"><br>-->
					<label>A good way to show your skills to us is with your resume. With your resume, we can find a better internship for you at the center that will further your career.</label>
					<label style="font-size:80%;">We use <a href="https://www.dropbox.com"><img src="images/dropboxhero.jpg" style="width:5.5%;height:5.5%;"/></a> for file storage. In order to store your resume on the site, you need a account (<a href="https://www.dropbox.com/register">Sign up here</a>)</label><br><br>
					<label>Do you accept your Dropbox Account being linked to our platform? If not, you can authenticate later. If you choose not to authenticate now, you will not be prompted on the next page to upload your resume.</label>
					<label for="Yes">Yes</label>
				    <input type="radio" name="Dropbox" id="Yes" value="yes" autocomplete="off" checked></input>
				    <label for="No">No</label>
				    <input type="radio" name="Dropbox" id="No" value="no" autocomplete="off" ></input><br><br>
					
					<label>Skills and Experience(in lieu of or addition to your Resume):</label>
					<textarea name="SkillsAndExperience" placeholder="If You Didn't Make A Resume Yet, Describe Yourself and Your Skills/Experiences You Have Particularly That Would Be Helpful For A Member To Know" class="skills" autocomplete="off"></textarea>

					<br><div align=center class="g-recaptcha" data-sitekey="6Le9NsgUAAAAAFvjCyl8yJ_npsTDpIEoumWFe5Zn"></div><br>


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