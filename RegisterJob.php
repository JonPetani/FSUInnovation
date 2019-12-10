<!doctype html>
<html lang="en">

  <head>
    <title>Results</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        
		
		<header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-lg-4">
              <nav class="site-navigation text-right ml-auto " role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
				  <li class="active"><a href="index.php" class="nav-link">Home</a></li>
                  <li><a href="https://www.framingham.edu/" target='_blank' class="nav-link">Framingham.edu</a></li>
                  <li><a href="Nav.php" class="nav-link">Services</a></li>
                </ul>
              </nav>
            </div>
            <div class="col-lg-4 text-center">
              <div class="site-logo">
                <a href="index.php"></a>
              </div>


              <div class="ml-auto toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-white"><span class="icon-menu h3 text-white"></span></a></div>
            </div>
            <div class="col-lg-4">
              <nav class="site-navigation text-left mr-auto " role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li><a href="SignUp.php" class="nav-link">Sign Up</a></li>
                  <li><a href="#" class="nav-link">Forum</a></li>
                  <li><a href="contact.html" class="nav-link">Contact</a></li>
                </ul>
              </nav>
            </div>
            
          </div>
        </div>

        </header>
			<br/><br/><br/>
		<div class="site-wrap" id="home-section" style="margin-left: 10%; margin-right: 5%">
  			<center><a href='index.php'><img src="images/fsu_logo1.png" height='30%' width='30%'></img></a></center>
	
		<?php
		session_start();
		$con = new PDO('mysql:host=sql208.byethost.com;dbname=b32_24537897_internsite;charset=utf8mb4','b32_24537897','Sayhello123');
		if($_SESSION['UserType'] == "")
			header("location: MemberLogin.php");
		if($_SESSION['UserType'] == "Intern")
			header("location: AccessDenied.php");
		$session_time = $_SERVER['REQUEST_TIME'];
		$timeout_duration = 1200;
		if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
			header("location: SessionExpire.php");
		$_SESSION['TimeLog'] = $session_time;
		?>
			<br/><p class = "new">Post a new Job for Interns:</p><br/>
			<form action = "PostJob.php" method = "post">

			<div class = "boxcontainer">

				<label>Name of Job:</label>
				<input type = "text" name = "JobName" autocomplete='off' required>

				<br/><br/><label>Description of the Task needed:</label><br>
				<textarea name = 'JobDesc' class = "skills" autocomplete='off'></textarea>

				<br/><label>Select the Major(s) your job appeals to:</label>
				<br><select name='JobType' autocomplete='off' multiple="multiple" required>
				<option value='CS'>Computer Science</option>
				<option value='IT'>Information Technology</option>
				<option value='SENG'>Software Engineering</option>
				<option value='WEB'>Web Development</option>
				<option value='COMM'>Communications</option>
				<option value='AD'>Advertising</option>
				<option value='NUT'>Nutrition</option>
				<option value='BIOT'>Biotechnology</option>
				<option value='BIO'>Biology</option>
				<option value='CHEM'>Chemistry</option>
				<option value='ENG'>Engineering</option>
				<option value='ENGL'>English</option>
				<option value='MED'>Medicine</option>
				<option value='MATH'>Mathematics</option>
				<option value='FIN'>Finance</option>
				<option value='MARK'>Marketing</option>
				<option value='AC'>Accounting</option>
				<option value='MAN'>Management</option>
				<option value='WRI'>Writing</option>
				<option value='RE'>Research</option>
				<option value='GD'>Graphic Design</option>
				</select>
				<br>
				<br/><label>Enter an estimate for the number of weeks needed to complete the project:</label>
				<input type = "number" name = "InternsNeeded" autocomplete='off' required><br>


				<br/><br/><label>Post any job requirements as well as prerequisite skills and expereince needed:</label>
				<textarea name = 'JobRequirements' class = "skills" autocomplete='off' style='height: 4%'></textarea><br>

				<br/><br/><label style='float:left;padding-bottom:30px;'>In order to post a job/task, you must agree to our terms of service <a href='terms1.html' target="_blank">found here</a>: <input name='check' onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" type="checkbox" value="Agree" required></label>
				<input id="submitButton" type="submit" value="Submit" style='float:left;background-color:#66ff99;width:10%;height:10%; vertical-align: center; margin-left: 1%'>
			<br>
			</div>
			<br clear=both>
				<script>
					function checkForm(form)
					{
						...
						if(!form.check.checked) {
						  alert("You are required to read and accept the Terms of Service before posting a job to ensure your task complies");
						  form.check.focus();
						  return false;
						}
						return true;
					}
				</script>
			</form>
			</div>      
       
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>

    </div>

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
