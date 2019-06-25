<!--The Member Register Page. New members and/or companies can make their profiles here.-->
<!DOCTYPE html>
	<head>
		<title>Member Sign Up Page</title>
		<link rel="icon" type="image/png" href="images/icon.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="member_page.css">
	</head>
	<body>
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
			<img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/>
			<h1 align="center">Entrepreneur Innovation Center<br/>Member Profile Page</h1>
		</header>
		<div id="navMenu" align="center">
			<a href='Home.html'><button class="navButton">Home</button></a>
			<button class="navButton">Interns</button>
			<button class="navButton">Members</button>
			<button class="navButton">Discussion Boards</button>
			<button class="navButton">Newsfeed</button>
		</div>
		<div class="container">
			<form action="MemberInsert.php" method="post">
				<div class="row">
					<div class="col-25">
						<label for="InternName">Student Name: </label>
					</div>
					<div class="col-75">
						<input type="text" name="InternName" autocomplete="off" required autofocus>
					</div>
					</div>
					<div class="row">
					<div class="col-25">
						<label for="EmailAddress">Email Address: </label>
					</div>
					<div class="col-75">
						<input type="email" name="EmailAddress" autocomplete="off" required>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="Username">Username: </label>
					</div>
					<div class="col-75">
						<input type="text" name="Username" autocomplete="off" required>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="Password">Password: </label>
					</div>
					<div class="col-75">
						<input style='width:100%;height:42.5px;' type="password" name="Password" autocomplete="off" required>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="School">School/University: </label>
					</div>
					<div class="col-75">
						<input type="text" name="School" autocomplete="off" required>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="InternPhoto">Profile Picture: </label>
					</div>
					<div class="col-75">
						<input type="file" name="InternPhoto" accept="image/*">
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="Major">Major: </label>
					</div>
					<div class="col-75">
						<input type="text" name="Major" autocomplete="off" required>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="CompanyCity">Location (City): </label>
					</div>
					<div class="col-75">
						<input type="text" name="CompanyCity" autocomplete="off" required>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="CompanyState">Location (State): </label>
					</div>
					<div class="col-75">
						<input type="text" name="CompanyState" autocomplete="off" required>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="PhoneNumber">Phone: </label>
					</div>
					<div class="col-75">
						<input type="tel" name="PhoneNumber" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" autocomplete="off">
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="CompanyDescription">Company Description: </label>
					</div>
					<div class="col-75">
						<textarea name="CompanyDescription" style="height:100px" autocomplete="off" required></textarea>
					</div>
				</div>
				<div class="row">
					<input id="submitButton" type="submit" value="Submit">
				</div>
			</form>
		</div>
		<footer align="center">
			<hr>
			<address><strong>&copy;	Framingham State University Entrepreneur Innovation Center</strong></address>
		</footer>
	</body>
</html>