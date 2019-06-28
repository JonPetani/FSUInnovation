<!--The Member Register Page. New members and/or companies can make their profiles here.-->
<!DOCTYPE html>
	<head>
		<title>Member Sign Up Page</title>
		<link rel="icon" type="image/png" href="images/icon.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="member_page.css">
		<link href='intern.css' rel='stylesheet'/>
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
			<img src="images/fsu_logo.png" alt="FSU Logo"/>
			<h1 align="center">Entrepreneur Innovation Center<br/>Member Profile Page</h1>
			<p>To have your company and it's internship positions seen by students, create a account today.</p>
		</header>
		<!--<div id="navMenu" align="center">
			<a href='Home.html'><button class="navButton">Home</button></a>
			<button class="navButton">Interns</button>
			<button class="navButton">Members</button>
			<button class="navButton">Discussion Boards</button>
			<button class="navButton">Newsfeed</button>
		</div>-->
		<div class="container">
			<form action="MemberInsert.php" method="post">
				<div class="row">
					<div class="col-25">
						<label for="ContactName">Contact Name: </label>
					</div>
					<div class="col-75">
						<input type="text" name="ContactName" autocomplete="off" required autofocus>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="CompanyName">Company Name: </label>
					</div>
					<div class="col-75">
						<input type="text" name="CompanyName" autocomplete="off" required>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="ContactEmail">Email Address: </label>
					</div>
					<div class="col-75">
						<input type="email" name="ContactEmail" autocomplete="off" required>
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
						<label for="CompanyPicture">Profile Picture: </label>
					</div>
					<div class="col-75">
						<input type="file" name="CompanyPicture" accept="image/*">
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
				<div class="col-25">
				</div>
				<div class="col-75">
				<label style='float:left'>In order to create a account, you must agree to our terms of service <a href='terms.html' target="_blank">found here</a>: <input name='check' onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" type="checkbox" value="Agree" required></label>
				<input id="submitButton" type="submit" value="Submit" style='float:left;'>
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