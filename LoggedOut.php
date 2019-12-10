<!doctype html>
<html lang="en">

  <head>
    <title>Ideal &mdash; Website Template by Colorlib</title>
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
	<?php
		session_start();
		$con = new PDO('mysql:host=sql208.byethost.com;dbname=b32_24537897_internsite;charset=utf8mb4','b32_24537897','Sayhello123');
		$session_time = $_SERVER['REQUEST_TIME'];
		$timeout_duration = 1200;
		
		$_SESSION["loggedin"] = false;
		$_SESSION["UserType"] = '';
				
		if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
			header("location: SessionExpire.php");
		$_SESSION['TimeLog'] = $session_time;
	?>
        
		
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
    
  <div class="site-wrap" id="home-section" style="margin-left: 26%">
  
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 blog-content">
		  
		  	<center><a href="index.php"><img id="fsu_logo" src="images/fsu_logo1.png" alt="FSU Logo" height='60%' width='60%'/></a></center><br/><br/>
				
			<h2><center>Logged Out</h2><br/>
			<h2><center>Would you like to login again?</center></h2><br/>
			 <center><p style='text-align: center'></center><a href="SignIn.php" style='text-align: center; border: solid black; float: left; position: absolute; margin-left: 10%' class="btn btn-primary px-4 py-2 rounded-0">Yes, Send me to login</a></p>
			 <p style='text-align: center'><a href="index.php" style='text-align: center; border: solid black; float: left; position: absolute' class="btn btn-primary px-4 py-2 rounded-0">No, return me to homepage</a></p><br/><br/><br/><br/>
             
            <center><p><hr>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p></center>
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
