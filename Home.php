<!--The Main Page of the Intern Webiste. Introduces the Theme of the Site.-->
<!--Main Developers: Jonathan Petani, Brian Perel
 Co-Collaborators: Jessica Grady, Simone McHugh-->

<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Home | FSUInnovation</title>
		<link rel="icon" type="image/png" href="images/icon.png"/>
		<!-- <link href='css/Intern.css' rel='stylesheet'/>  -->
		<link href='css/Intern1.css' rel='stylesheet'/> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
	</head>
		<body>
		<p id="top"></p>
		<div id='links'>
			<a href='Home.php'>Home</a>
			<a href="https://www.framingham.edu" target="_blank" style="margin-left: 30px">Framingham.edu</a>
			<a href='Login.php' style="margin-right: 30px;float: right;" id = 'si'>Sign In</a>
			<a href='RegisterHub.php' style="margin-right: 30px;float: right;"id = 'su'>Sign Up</a>
		<?php
		session_start();
		if(isset($_SESSION['loggedin'])) {
			if($_SESSION['loggedin'] == true) {
				$session_time = $_SERVER['REQUEST_TIME'];
				$timeout_duration = 1200;
				if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
					header("Location:SessionExpire.php?location=" . urlencode($_SERVER['REQUEST_URI']));
				$_SESSION['TimeLog'] = $session_time;
				if($_SESSION['UserType'] == "Member") {
					echo "<script>";
					echo "var parent = document.getElementById('links');";
					echo "var child1 = document.getElementById('su');";
					echo "var child2 = document.getElementById('si');";
					echo "parent.removeChild(child1);";
					echo "parent.removeChild(child2);";
					echo "</script>";
					echo "<img src='images/PowerOpen.png' class='accounts' onmouseover='this.src=\"images/PowerPressed.png\";' onmouseout='this.src=\"images/PowerOpen.png\";' alt='Account Tab'/>";
					echo "<a href='PrivateMessageBoard.php'><img src='images/PM.png' class='accounts' onmouseover='this.src=\"images/PMOpen.png\";' onmouseout='this.src=\"images/PM.png\";' alt='Private Messages'/></a>";
					}
				else if($_SESSION['UserType'] == "Intern") {
					echo "<script>";
					echo "var parent = document.getElementById('links');";
					echo "var child1 = document.getElementById('su');";
					echo "var child2 = document.getElementById('si');";
					echo "parent.removeChild(child1);";
					echo "parent.removeChild(child2);";
					echo "</script>";
					echo "<img src='images/PowerOpen.png' class='accounts' onmouseover='this.src=\"images/PowerPressed.png\";' onmouseout='this.src=\"images/PowerOpen.png\";' alt='Account Tab'/>";
					echo "<a href='PrivateMessageBoard.php'><img src='images/PM.png' class='accounts' onmouseover='this.src=\"images/PMOpen.png\";' onmouseout='this.src=\"images/PM.png\";' alt='Private Messages'/></a>";
					}
			}
		}
		
?>
</div>
		<hr color="#FFC400" clear=both>

		<br><a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
		<h1>Welcome to the FSU Innovation Internship Website &nbsp;<img src="images/Logo.jpg" height="60px" width="100px" style="border: solid; margin-top: 2%"></img></h1>
		<br><div class='txt'>
			<h2 align=center>Here is what we offer:</h2>
			<ul>
				<li><p>This is a website designed for both student interns to find positions that suit them, and for employers to put up positions that these interns then can apply for</p></li>
				<li><p>We allow students and representatives of companies to make accounts that can be stored in our database to make connections between future interns and their employers seamless</p></li>
				<li><p>In addition, our site has a discussion board where employers and students can communicate to each other making the application process as smooth as possible</p></li>
				<li><p>Overall, our site helps students better their careers through the internships they will gain through us, and employers can find the best candidates for a given position</p></li>
			</ul><br>
		</div>

		<br>
		<br><div class='txt'>
			<h2 align=center>New to the site? Create an account:</h2>
			<ul>
				<li><p>With an account, a student can leave a profile of him/her self that employers can see making the process of finding the correct candidates simple.</li></p>
				<li><p>For an employer, a account will allow students to view positions available at the company helping them to find the best position for their career interests.</li></p>
			</ul>

			<div class='select'><br/>
				<h3 align="center">Register Now</h3>
					<a href='NewIntern.php'>Student? Sign Up Here</a>
					<a href='register_member.php'>Employer? Sign Up Here</a>

				<br clear=both>
				<h3 align=center>Otherwise, Log in</h3>
				<a href='Login.php'>Log In Here</a>
				<br clear=both>
			</div>
		</div>

		<br><br><div class='txt'><br/>
			<h2 align='center'>We provide many services on this site:</h2>
			<div class='select'>
				<h3 align=center>Here are our services</h3>
				<a href=''>Visit our Forum</a>
				<a href=''>Visit our NewsFeed</a>

				<br clear=both><br>
				<h3 align=center>We have a directory of all our services</h3>
				<a href='Nav.php'>Go here to find all our services</a>
				<br clear=both>
			</div>
		</div><br>


		<a href="#top" style="text-decoration: none"><img src="images/up_arrow.png" style="display: inline;" width="10px" height="12px"></img><p style="display: inline">&nbsp;Back to top</p></a>


		<footer>
			<hr>
			<address><strong>&copy;	<script type="text/javascript">var current_year = new Date(); document.write(current_year.getFullYear());</script> Framingham State University Entreperenuer Innovation Center &bull; 860 Worcester Road, Framingham, MA, 01701</strong></address>
		</footer>
	</body>
</html>
