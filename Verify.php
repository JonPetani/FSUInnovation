<!doctype html>
<html lang="en">

  <head>
    <title>Retrieval Email Sent</title>
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
    
  <div class="site-wrap" id="home-section" style="margin-left: 10%; margin-right: 5%">
  
	<div class="site-section" style="margin-right: 100px">
		<center><a href="index.php"><img id="fsu_logo" src="images/fsu_logo1.png" style='height: 200px; width: 350px' alt="FSU Logo"/></a></center><br/>
  
	<?php
	$con = new PDO('mysql:host=sql208.byethost.com;dbname=b32_24537897_internsite;charset=utf8mb4','b32_24537897','Sayhello123');
	if(isset($_POST['Email'])) {
		$sql = $con -> query("SELECT * FROM member WHERE ContactEmail = '$_POST[Email]'");
		$sql2 = $con -> query("SELECT * FROM intern WHERE EmailAddress = '$_POST[Email]'");
		if($sql->rowCount() == 0 and $sql2->rowCount() == 0) {
			echo"<h2 align=center>Email Not Found</h2>";
			echo"<p>The email address provided does not match the account to be verified. Make sure you wrote the email address of the account correctly before trying again.</p>";
			echo"<h3 align=center>Best Options Next</h3>";
			echo"<ul type=none>";
			echo"<li style='margin-left:-8%;float:left;text-align:center;'><a href='EmailEntry.php'>Try Entering the Email Address Again</a></li>";
			echo"<li style='margin-left:-3%;float:left;text-align:center;'><a href=''>Contact our Platform Support Team for Help</a></li>";
		}
		else {	
		$sql3 = $con -> query("UPDATE intern SET AccountVerified = 1 WHERE EmailAddress = '$_POST[Email]'");
		$sql4 = $con -> query("UPDATE member SET AccountVerified = 1 WHERE ContactEmail = '$_POST[Email]'");
		echo "<h2 align=center>Registration Successful</h2>";
		echo "<p align=center>Welcome to our Website. Now that you are now registered and verified, we hope you will find our site useful whether you are a intern or a representative of a company.</p>";
		echo "<br/><h3 align=center>What to do next</h3>";
		echo "<center><a href='SignIn.php'>Try Logging in to your new account</a>";
		echo "<a href='index.php' style='margin-left: 5%'>Otherwise, Return to Homepage</a></center>";
		}
	}
	?>
	<h5 align='center'>An email has been sent to your inbox with information on how to recover your account</h5>
	</div>
	  
    </div>      
       
	<div class="row pt-5 mt-5 text-center">
	  <div class="col-md-12">
		<hr><p>
		<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
		Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
		<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
		</p>
	  </div>

	</div>
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
