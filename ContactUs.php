<!--Member Login Page, enter username + password>
<!--Main Developer: Jonathan Petani, Brian Perel Co-Collaborators: Jessica Grady, Simone McHugh-->
<!DOCTYPE html>
<html>
<head>
<title>Contact Us Page</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='css/Intern1.css' rel='stylesheet'/>
<link href='css/member_page.css' rel='stylesheet'/>
</head>
<body>
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>Contact Us Form</h1>
<div class='select'>
<h2 align=center>Contact Us with a Question or Two. We will get back to you soon.</h3>
<div class="container">
			<form action="ContactUsSend.php" method="post">
				<div class="row">
					<div class="col-25">
						<label for="FirstName">First Name: </label>
					</div>
					<div class="col-75">
						<input type="text" name="FirstName" autocomplete="off" required autofocus>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="LastName">Last Name: </label>
					</div>
					<div class="col-75">
						<input type="text" name="LastName" autocomplete="off" required>
					</div>
					</div>
				<div class="row">
				<div class="col-25">
						<label for="Email">Email Address: </label>
					</div>
					<div class="col-75">
						<input type="text" name="Email" autocomplete="off" required>
					</div>
				</div>
				<div class="row">
				<div class="col-25">
						<label for="Message">Message: </label>
					</div>
					<div class="col-75">
						<textarea name="Message" class="skills" autocomplete="off" required></textarea>
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