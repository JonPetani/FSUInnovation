<!--The Member Register Page. New members and/or companies can make their profiles here.-->
<!DOCTYPE html>
<html>
	<head>
		<title>Member Sign Up Page</title>
		<link rel="icon" type="image/png" href="images/icon.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" href = "css/index.css"/>
		<!-- <link rel= "stylesheet" href="css/Intern1.css"/> -->
		<!--<link rel="stylesheet" type="text/css" href="member_page.css">-->
		<!--<link href='intern.css' rel='stylesheet'/>-->
		
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
			<div class="img1"><a href="index.php"><img id="fsu_logo" src="images/fsu_logo1.png" alt="FSU Logo"/></a></div>
			<br/><p class = 'new' align="center">Create New Member Account</p>
		</header>
		<!--<div id="navMenu" align="center">
			<a href="Home.html"><button class="navButton">Home</button></a>
			<a href=""><button class="navButton">Interns</button></a>
			<a href=""><button class="navButton">Members</button></a>
			<a href=""><button class="navButton">Discussion Boards</button></a>
			<a href=""><button class="navButton">Newsfeed</button></a>
		</div>-->
		<div class = 'content'>
			<form action="MemberInsert.php" enctype="multipart/form-data" method="post">
			<div class="boxcontainer">
					<label for="ContactName">Contact Name: </label>
					<input type="text" name="ContactName" autocomplete="off" required autofocus>
					
					<label for="CompanyName">Company Name: </label>
					<input type="text" name="CompanyName" autocomplete="off" required>
					
					<label for="ContactEmail">Email Address: </label>
					<input type="email" name="ContactEmail" autocomplete="off" required>
					
					<label for="Username">Username: </label>
					<input type="text" name="Username" autocomplete="off" required>
					
					<label for="Password">Password: </label>
					<input style='width:100%;height:42.5px;' type="password" name="Password" autocomplete="off" required>
					
					<label for="CompanyCity">Location (City): </label>
					<input type="text" name="CompanyCity" autocomplete="off" required>
					
					<label for="CompanyState">Location (State): </label>
					<input type="text" name="CompanyState" autocomplete="off" required>
					
					<label for="PhoneNumber">Phone: </label>
					<input type="tel" name="PhoneNumber" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" autocomplete="off">
					
					<br/><label for="CompanyPicture">Profile Picture: </label>
					<input type="file" name="CompanyPicture" required>
					
					<label for="CompanyDescription">Company Description: </label><br/><br/>
					<textarea name="CompanyDescription" class="skills" autocomplete="off" required placeholder="Enter text here..."></textarea>
				
				<br/><label style='float:left;padding-bottom:30px;margin-top: 10px;display:block'>In order to create a account, you must agree to our terms of service <a href='terms1.html' target="_blank">found here</a>: <input name='check' onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" type="checkbox" value="Agree" required></label><br/>
				<br clear="all"><input id="submitButton" type="submit" value="Submit" style='float:left;background-color:#66ff99;width:10%;height:12%;display:block'><br/>
				<br>
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