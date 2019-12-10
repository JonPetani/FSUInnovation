<!doctype html>
<html lang="en">
  <head>
  
	<?php
		session_start();
		$con = new PDO('mysql:host=sql208.byethost.com;dbname=b32_24537897_internsite;charset=utf8mb4','b32_24537897','Sayhello123');
		if($_SESSION['UserType'] == "")
			header("location: InternLogin.php");
		if($_SESSION['UserType'] == "Member")
			header("location: AccessDenied.html");
		$session_time = $_SERVER['REQUEST_TIME'];
		$timeout_duration = 1200;
		if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
			header("location: SessionExpire.php");
		$_SESSION['TimeLog'] = $session_time;
	?>
	
    <title>Job Sign Up Application</title>
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
	<link rel = "stylesheet" href = "index.css"/>


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
    
	
   <div class="site-wrap" id="home-section" style="margin-left: 10%; margin-right: 5%">
  
    <div class="site-section" style="margin-right: 100px">
				<center><a href='index.php'><img src="images/fsu_logo1.png" style='height: 150px; width: 350px'></img></a></center>
			<center><div class = "header">
				<br/><p class = "new">Sign Up for Task with Member</p>
			</div>

		<div class = "content">

			<form action = "SignUpQueue.php?job=<?php echo $_GET['job']?>" method = "post">

				<div class = "boxcontainer">

					<label>Have you read the job requirements listed on the Company's Page ?:</label>
					<br><input type = "radio" name = "Read" value='Yes' autocomplete='off' required>Yes
					<br><input type = "radio" name = "Read" value='No' autocomplete='off' required>No<br>
					
					<label>Do you agree with the task's requirements and believe to the best of your ability that you will accomplish the task completely?</label>
					<br><input type = "radio" name = "Able" value='Yes' autocomplete='off' required>Yes
					<br><input type = "radio" name = "Able" value='No' autocomplete='off' required>No<br>
					
					<label>Are you alright with the Member having access to relevant information about your account as pertains to the job?</label>
					<br><input type = "radio" name = "Share" value='Yes' autocomplete='off' required>Yes
					<br><input type = "radio" name = "Share" value='No' autocomplete='off' required>I do not. In this case, I ensure that I will message the Company Contact privately to discuss my qualifications.<br>
					
					<label>How much time can you set aside in a given week to the task (Considering tasks for other members as well as Projects assigned to your Internship)</label>
					<br><input type = "number" name = "Time" autocomplete='off' required>
					
					<br><label>On the Rating Scale below, how interesting does the project seem to you? If it isn't that interesting, this will help the Member to modify the description and/or task itself to cater to student's interests.</label>
					<select name='Rate' autocomplete='off' required>
					<option value='1'>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
					<option value='4'>4</option>
					<option value='5'>5</option>
					<option value='6'>6</option>
					<option value='7'>7</option>
					<option value='8'>8</option>
					<option value='9'>9</option>
					<option value='10'>10</option>
					</select>
					
					<br><label>What part of the project is of most interest to you?</label>
					<input type = "text" name = "Interest" autocomplete='off' required>
					<label style='float:left;padding-bottom:30px;'>In order to sign up for a job/task, you must agree to our terms of service <a href='terms1.html' target="_blank">found here</a>: <input name='check' onchange="this.setCustomValidity(validity.valueMissing ? 'Verify that you comply with the terms of this site' : '');" type="checkbox" value="Agree" required></label>
				<input id="submitButton" type="submit" value="Submit" style='float:left;background-color:#66ff99;width:21%;height:10%;'>
				<br>
				</div>
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
		</div></center>
	</div>
    </div>      
       
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
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
