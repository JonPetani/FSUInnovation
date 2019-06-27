<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
<<<<<<< Updated upstream
		<link rel = "stylesheet" href = "index.css">
=======
		<!--<link rel = "stylesheet" href="intern.css"/>-->
		<link rel = "stylesheet" href = "index.css"/>
		<link rel = "stylesheet" href='member_page.css'/>
>>>>>>> Stashed changes
		<title>Intern Sign Up Page</title>
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
<<<<<<< Updated upstream
					<input type = "email" name = "EmailAddress" autocomplete='off' required><br>
=======
					<input style='width:100%;height:42.5px;'type = "email" name = "EmailAddress" autocomplete='off' required><br>
>>>>>>> Stashed changes

					<label>Username:</label>
					<input type = "text" name = "Username" autocomplete='off' required>

					<label>Password:</label>
<<<<<<< Updated upstream
					<input type = "password" name = "Password" autocomplete='off' required>
=======
					<input style='width:100%;height:42.5px;' type = "password" name = "Password" autocomplete='off' required>
>>>>>>> Stashed changes

					<label>School/University:</label>
					<input type = "text" name = "School" autocomplete='off' required>

					<label>Picture:</label>
<<<<<<< Updated upstream
					<input type = "file" name = "InternPhoto" accept='image/*' autocomplete='off' required>
=======
					<input type = "file" name = "InternPhoto" accept='image/*' autocomplete='off' required><br>
>>>>>>> Stashed changes

					<label>Major:</label>
					<input type = "text" name = "Major" autocomplete='off' required>

					<label>GPA:</label>
					<input type = "text" name = "GPA" autocomplete='off'>

					<label>City:</label>
					<input type = "text" name = "City" autocomplete='off' required>

					<label>State:</label>
					<input type = "text" name = "State" autocomplete='off' required>

					<label>Phone Number:</label>
<<<<<<< Updated upstream
					<input type="tel" name="PhoneNumber" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" autocomplete="off">
=======
					<input style='width:100%;height:42.5px;'type="tel" name="PhoneNumber" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" autocomplete="off">
>>>>>>> Stashed changes

					<label>Resume:</label>
					<input type="file" name="Resume" accept='application/octet-stream' autocomplete="off"><br>

					<label>Skills and Experience you have (in lieu of Resume):</label><br>
<<<<<<< Updated upstream
					<textarea name='SkillsAndExperience' style="height:150px" autocomplete='off'></textarea>
=======
					<textarea name='SkillsAndExperience' style="width:100%;height:100px" autocomplete='off'></textarea>
>>>>>>> Stashed changes

					<button type = "submit" value = 'Submit'>Submit</button>

				</div>

			</form>

		</div>
		
	</body>

</html>