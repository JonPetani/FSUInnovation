<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" href = "css/index.css"/>
		<title>Intern Sign Up Page</title>
		
		<link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="fonts/icomoon/style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/animate.min.css">
		<link rel="stylesheet" href="css/jquery.fancybox.min.css">
		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">
		<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
		<link rel="stylesheet" href="css/aos.css">

		<!-- MAIN CSS -->
		<link rel="stylesheet" href="css/style.css">
		
		<link rel="icon" type="image/png" href="images/icon.png"/>
		<style>
			.boxcontainer {
				font-size: 80%;
			}
			.img1 {
				height: 330%;
				width: 330%;
			}
		</style>
	</head>

	<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
		<div class="img1"><a href="index.php"><img id="fsu_logo" src="images/fsu_logo1.png" alt="FSU Logo"></img></a></div>

		<div class = "header">
			<br/><p class = "new">Create New Intern Account</p>
		</div>

		<div class = "content">

			<form action = "InternInsert.php" enctype = "multipart/form-data" method = "post">

				<div class = "boxcontainer">

					<label>Full Name:</label>
					<input type = "text" name = "InternName" autocomplete='off' required>

					<label>Email:</label>
					<input type = "email" name = "EmailAddress" autocomplete='off' required>

					<label>Username:</label>
					<input type = "text" name = "Username" autocomplete='off' required>

					<label>Password:</label>
					<input type = "password" name = "Password" autocomplete='off' required>

					<label>School/University:</label>
					<input type = "text" name = "School" autocomplete='off' required>

					<label>Picture:</label>
					<input type = "file" name = "InternPhoto" autocomplete='off'>

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

					<label>Skills and Experience you have (in lieu of Resume):</label><br>
					<textarea name = 'SkillsAndExperience' class = "skills" autocomplete='off' style='margin-top: 10px' placeholder="Enter text here..."></textarea>

					<label style='float:left;padding-bottom:30px;margin-top: 10px;display:block'>In order to create a account, you must agree to our terms of service <a href='terms1.html' target="_blank">found here</a>: <input name='check' onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" type="checkbox" value="Agree" required></label><br/>
				<br clear="all"><input id="submitButton" type="submit" value="Submit" style='float:left;background-color:#66ff99;width:10%;height:12%;display:block'>
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
		<br/>
		<footer align="center">
			<hr>
			<address><strong>&copy;	<script type="text/javascript">var current_year = new Date(); document.write(current_year.getFullYear());</script> Framingham State University Entreperenuer Innovation Center &bull; 860 Worcester Road, Framingham, MA, 01701</strong></address>
		</footer>
		
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.sticky.js"></script>
		<script src="js/jquery.waypoints.min.js"></script>
		<script src="js/jquery.animateNumber.min.js"></script>
		<script src="js/jquery.fancybox.min.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="js/aos.js"></script>

		<script src="js/main.js"></script>
	</body>

</html>