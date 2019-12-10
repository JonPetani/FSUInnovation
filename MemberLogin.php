<!doctype html>
<html lang="en">

  <head>
    <title>Sign In &mdash; FSUInnovation</title>
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
	<link rel="stylesheet" href="css/member_page.css">


	

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
	 <?php
		session_start();
		   $con = new PDO('mysql:host=sql208.byethost.com;dbname=b32_24537897_internsite;charset=utf8mb4','b32_24537897','Sayhello123');
		   $con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			unset($con);
			$page = "";
			if (isset($_GET['location']))
				$page = "MemberCheck.php?location=" . htmlspecialchars($_GET['location']);
			else 
				$page = "MemberCheck.php";
			
		if(isset($_SESSION['UserType'])) {
			if($_SESSION['UserType'] == 'Member')
				header('location: LoggedInMember.php');
			else if($_SESSION['UserType'] == 'Intern')
				header('location: LoggedInIntern.php');
		}		
	?>
  
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-lg-4">
              <nav class="site-navigation text-right ml-auto " role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li class="active"><a href="index.php" class="nav-link">Home</a></li>
                  <li><a href="https://www.framingham.edu/" target='_blank' class="nav-link">Framingham.edu</a></li>
                  <li><a href="services.html" class="nav-link">Services</a></li>
                </ul>
              </nav>
            </div>
            <div class="col-lg-4 text-center">
              <div class="site-logo">
              </div>


              <div class="ml-auto toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-white"><span class="icon-menu h3 text-white"></span></a></div>
            </div>
            <div class="col-lg-4">
              <nav class="site-navigation text-left mr-auto " role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li><a href="SignUp.php" class="nav-link">Sign Up</a></li>
                  <li><a href="blog.html" class="nav-link">Forum</a></li>
                  <li><a href="contact.html" class="nav-link">Contact</a></li>
                </ul>
              </nav>
            </div>
            

          </div>
        </div>

      </header>

    
    
    <div class="ftco-blocks-cover-1" style="margin-top: 6%">
        <div class="ftco-cover-1" style="background-image: url('images/51521.jpg');">
              <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center">
					  <b><h1 style='font-size: 280%; text-shadow: 5px 3px black; margin-top: 160px'><font color='white'>Login:</font></h1></b>
					   <b><h3 style='font-size: 230%; text-shadow: 5px 3px black'><font color='white'>Login in as a Member Company</font></h3></b><br/>
							<form action="MemberCheck.php" method="post">
							<br/><br/><div class="row">
								<div class="col-25">
									<font color="white"><label for="Username">Username: &nbsp;</label></font>
								</div>
								<div class="col-75">
									<input type="text" name="Username" autocomplete="off" required autofocus>
								</div>
							</div>
							
							<div class="row">
								<div class="col-25">
									<font color="white"><label for="Password">Password: &nbsp;</label></font>
								</div>
								<div class="col-75">
									<b><input type="password" name="Password" autocomplete="off" required></b>
								</div>										
								<input id="submitButton" type="submit" value="Submit" style="margin-top: 10px; float: left">
							</div>
					<br/><br/><br/><br/><br/><br/>
              </div>
            </div>
        </div>
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
