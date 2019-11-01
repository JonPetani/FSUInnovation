<!--Member Login Page, enter username + password>
<!--Main Developer: Jonathan Petani, Brian Perel Co-Collaborators: Jessica Grady, Simone McHugh-->
<!DOCTYPE html>
<html>
<head>
<title>Enter Your Reset/Retrieval Code</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='css/Intern1.css' rel='stylesheet'/>
<link href='css/member_page.css' rel='stylesheet'/>
</head>
<body>
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>Login</h1>
<div class='select'>
<h2 align=center>Account Retrieval</h2>
<p>Enter the Code we gave you to ensure this is you who wants to change your log in info</p>
<div class="container">
			<form action="ResetForm.php" method="post">
				<div class="row">
					<div class="col-25">
						<label for="Code">Enter the Account Reset Code that was sent in the email. If you have not done, go back to it and copy it to your clipboard to paste it here: </label>
					</div>
					<div class="col-75">
						<input style='width:100%;height:6.5%;'type="password" name="Code" autocomplete="off" required>
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