<!--The Member Register Page. New members and/or companies can make their profiles here.-->
<!DOCTYPE html>
	<head>
		<title>Member Sign Up Page</title>
		<link rel="icon" type="image/png" href="images/icon.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="member_page.css">
		<link href='intern.css' rel='stylesheet'/>
		<style>
		label{font-size:125%;font-family:Arial Narrow;}
		</style>
	</head>
	<body>

		<header style="margin-bottom:60px">
			<img src="images/fsu_logo.png" alt="FSU Logo"/>
			<h1 align="center">Student Intern Registration</h1>
			<p>To find all the internships you could ever want, make a account here so employers can get to know you better.</p>
		</header><!--
		<div id="navMenu" align="center">
			<a href='Home.html'><button class="navButton">Home</button></a>
			<button class="navButton">Interns</button>
			<button class="navButton">Members</button>
			<button class="navButton">Discussion Boards</button>
			<button class="navButton">Newsfeed</button>
		</div>-->
		<div class="container">
			<form action="InternInsert.php" method="post">
			<h2>Registration Form</h2>
				<div class="row">
					<div class="col-25">
						<label class='left-col' for="InternName">Student Name: </label>
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
						<label for="GPA">GPA: </label>
					</div>
					<div class="col-75">
						<input type="text" name="GPA" autocomplete="off" required>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="City">Location (City): </label>
					</div>
					<div class="col-75">
						<input type="text" name="City" autocomplete="off" required>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="State">Location (State): </label>
					</div>
					<div class="col-75">
						<input type="text" name="State" autocomplete="off" required>
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
				<label for="Resume">Resume: </label>
				</div>
					<div class="col-75">
					<input type="file" name="Resume" accept='application/octet-stream' autocomplete="off">
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="CompanyDescription">List of Skills/Experiences (in lieu of Resume): </label>
					</div>
					<div class="col-75">
						<textarea name="SkillsAndExperience" style="height:100px" autocomplete="off" required></textarea>
					</div>
				</div>
				<div class="row">
				<div class="col-25">
				</div>
				<div class="col-75">
				<label style='float:left'>In order to create a account, you must agree to our terms of service <a href='terms.html'>found here</a>: <input name='check' onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" type="checkbox" value="Agree" required></label>
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