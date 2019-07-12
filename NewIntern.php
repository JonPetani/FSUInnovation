<!DOCTYPE html>
<html>
	<head>

		<meta charset = "UTF-8">
		<link rel = "stylesheet" href = "index.css"/>
		<title>Intern Sign Up Page</title>
		<link rel="icon" type="image/png" href="images/icon.png"/>
		<a href="Home.html"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>

	</head>

	<body>

		<div class = "header">
			<p class = "new">Create New Intern Account</p>
		</div>

		<div class = "content">

			<form action = "InternInsert.php" method = "post">

				<div class = "boxcontainer">

					<label>Name:</label>
					<input type = "text" name = "InternName" autocomplete='off' required>

					<label>Email:</label>
					<input type = "email" name = "EmailAddress" autocomplete='off' required><br>

					<label>Username:</label>
					<input type = "text" name = "Username" autocomplete='off' required>

					<label>Password:</label>
					<input type = "password" name = "Password" autocomplete='off' required>

					<!--<label>School/University:</label>
					<input type = "text" name = "School" autocomplete='off' required>

					<label>Picture:</label>
					<input type = "file" name = "InternPhoto" accept='image/*' autocomplete='off' required>

					<label>Major:</label>
					<input type = "text" name = "Major" autocomplete='off' required>

					<label>GPA:</label>
					<input type = "text" name = "GPA" autocomplete='off'> -->

					<label>City:</label>
					<input type = "text" name = "City" autocomplete='off' required>

					<label>State:</label>
					<input type = "text" name = "State" autocomplete='off' required>

					<!--<label>Phone Number:</label>
					<input type="tel" name="PhoneNumber" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" autocomplete="off">

					<label>Resume:</label>
					<input type="file" name="Resume" accept='application/octet-stream' autocomplete="off"><br>

					<label>Skills and Experience you have (in lieu of Resume):</label><br>
					<textarea class = "skills" autocomplete='off'></textarea>-->

					<button type = "submit" value = 'Submit'>Submit</button>

				</div>

			</form>

		</div>
		
	</body>

</html>