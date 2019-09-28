<!--Main Login Page for Website. Redirects to user>
<!--Main Developers: Jonathan Petani, Brian Perel
Co-Collaborators: Jessica Grady, Simone McHugh-->

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login Page | FSUInnovation</title>
		<link rel="icon" type="image/png" href="images/icon.png"/>
		<link href='css/Intern1.css' rel='stylesheet'/> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
	</head>

	<body>

		<div class='links'>
			<a href='Home.php'>Home</a>
			<a href="https://www.framingham.edu" target="_blank" style="margin-left: 30px">Framingham.edu</a>
			<a href='Login.php' style="margin-right: 30px;float: right;">Sign In</a>
			<a href='RegisterHub.php' style="margin-right: 30px;float: right;">Sign Up</a>
		</div>
		<?php
		$pageMember = "";
		$pageIntern = "";
	    if (isset($_GET['location'])) {
			$pageMember = "MemberLogin.php?location=" . htmlspecialchars($_GET['location']); 
			$pageIntern = "InternLogin.php?location=" . htmlspecialchars($_GET['location']); 
		}
		else {
			$pageMember = "MemberLogin.php";
			$pageIntern = "InternLogin.php";
		}
		?>
		<hr color="#FFC400"><br/>
		<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a><br/><br/>
		<h1>Login</h1>
		<div class='select'>
			<h2 align=center>Are you a Intern or a Member?</h2><br/>
			<a href='<?php echo $pageIntern; ?>'>I am a Intern</a>
			<a href='<?php echo $pageMember; ?>' style='margin-left: 2%'>I am a Member</a>

			<br clear=both>
		</div>

		<footer style="margin-top: 13.5%">
			<hr>
			<address><strong>&copy;	<script type="text/javascript">var current_year = new Date(); document.write(current_year.getFullYear());</script> Framingham State University Entreperenuer Innovation Center &bull; 860 Worcester Road, Framingham, MA, 01701</strong></address>
		</footer>
	</body>
</html>
