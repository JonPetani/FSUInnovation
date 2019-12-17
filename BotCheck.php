<!--Member Login Page, enter username + password>
<!--Main Developer: Jonathan Petani, Brian Perel Co-Collaborators: Jessica Grady, Simone McHugh-->
<!DOCTYPE html>
<html>
<head>
<title>Enter Your Email</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='css/Intern1.css' rel='stylesheet'/>
<link href='css/member_page.css' rel='stylesheet'/>
</head>
<body>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>Login</h1>
<div class='select'>
<h2 align=center>Email Verification</h2>
<p>We want to make sure you are not a bot.</p>
<div class="container">
			<form action="Verify.php" method="post">
				<div class="row">
					<div class="col-25">
						<label for="Email">Enter the Email Address for the Account you wish to verify: </label>
					</div>
					<div class="col-75">
						<input style='width:100%;height:6.5%;'type="email" placeholder="Your Email Address The Message Was Sent To" name="Email" autocomplete="off" required>
					</div>
					<div class="row">
						<div class="col-75">
						<br><div class="g-recaptcha" data-sitekey="6Le9NsgUAAAAAFvjCyl8yJ_npsTDpIEoumWFe5Zn"></div><br>
						</div>
					</div>
					<div class="row">
					<input id="submitButton" type="submit" value="Submit">
				</div>
				</div>
<br clear=both>
</div>
<footer>
<hr>
<address><strong>&copy;	Framingham State University Entreperenuer Innovation Center</strong></address>
</footer>
</body>
</html>