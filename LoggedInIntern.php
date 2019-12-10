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
				  <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block" id="links">
				   <li id='su'><a href="SignUp.php" class="nav-link">Sign Up</a></li>
                   <li id='fo'><a href="#" class="nav-link">Forum</a></li>
                   <li id='co'><a href="contact.html" class="nav-link">Contact</a></li>
				  
				  <?php
				session_start();
				if(isset($_SESSION['loggedin'])) {
					if($_SESSION['loggedin'] == true) {
					$session_time = $_SERVER['REQUEST_TIME'];
					$timeout_duration = 1200;
					if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
						header("Location:SessionExpire.php?location=" . urlencode($_SERVER['REQUEST_URI']) . "&account_type=" . $_SESSION['UserType']);
					$_SESSION['TimeLog'] = $session_time;
				
				if($_SESSION['UserType'] == "Member") {
					
					echo "<script>";
					echo "var parent = document.getElementById('links');";
					echo "var child1 = document.getElementById('su');";
					echo "var child2 = document.getElementById('fo');";
					echo "var child3 = document.getElementById('co');";
					echo "parent.removeChild(child1);";
					echo "parent.removeChild(child2);";
					echo "parent.removeChild(child3);";
					echo "</script>";
					echo "<a href='LoggedOut.php'><img src='images/images/PowerOpen.png' style='height: 20%; width: 20%; margin-left: 15%' class='accounts' onmouseover='this.src=\"images/images/PowerPressed.png\";' onmouseout='this.src=\"images/images/PowerOpen.png\";' alt='Account Tab'/></a>";
					echo "<a href='PrivateMessageBoard.php'><img src='images/images/PM.png' style='margin-left: -100%; height: 50%; width: 50%' class='accounts' onmouseover='this.src=\"images/images/PMOpen.png\";' onmouseout='this.src=\"images/images/PM.png\";' alt='Private Messages'/></a>";
				}
				else if($_SESSION['UserType'] == "Intern") {
					
					echo "<script>";
					echo "var parent = document.getElementById('links');";
					echo "var child1 = document.getElementById('su');";
					echo "var child2 = document.getElementById('fo');";
					echo "var child3 = document.getElementById('co');";
					echo "parent.removeChild(child1);";
					echo "parent.removeChild(child2);";
					echo "parent.removeChild(child3);";
					echo "</script>";
					echo "<a href='LoggedOut.php'><img src='images/images/PowerOpen.png' style='height: 20%; width: 20%; margin-left: 15%' class='accounts' onmouseover='this.src=\"images/images/PowerPressed.png\";' onmouseout='this.src=\"images/images/PowerOpen.png\";' alt='Account Tab'/></a>";
					echo "<a href='PrivateMessageBoard.php'><img src='images/images/PM.png' style='margin-left: -100%; height: 50%; width: 50%' class='accounts' onmouseover='this.src=\"images/images/PMOpen.png\";' onmouseout='this.src=\"images/images/PM.png\";' alt='Private Messages'/></a>";
				}
			}
		}
		?>
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
		  
		  	<center><a href="index.php"><img id="fsu_logo" src="images/fsu_logo1.png" alt="FSU Logo"/></a><br/><br/>

			<?php
			session_start();
			$con = new PDO('mysql:host=sql208.byethost.com;dbname=b32_24537897_internsite;charset=utf8mb4','b32_24537897','Sayhello123');
			$session_time = $_SERVER['REQUEST_TIME'];
			$timeout_duration = 1200;
			if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
				header("location: SessionExpire.php");
			$_SESSION['TimeLog'] = $session_time;
			$FName = explode(' ',trim($_SESSION['InternName']));
			$Name = $FName[0];
			echo ("<h2>Welcome Back, " . $Name . "!</h2>");
			?>
			
			<br/><img src="<?php echo $_SESSION['InternPhoto']?>" width='250' height='250' alt='profile picture'/><br/><br/>
			
				
            <br/><p class="lead">&bull; As a Intern, your main usage of this platform will be to find Members who are working on projects that both interest you and are related to your field of study/career<p>
            <blockquote><p>&bull; To help you find the Members that best suite you, we offer a search service that lets you search for a given Member company based on key words that you input</p></blockquote>
            <p>&bull; Additionally, you should keep your information up to date such as updating your resume to the latest version where possible so the Members know what skills you have</p></center>
			<br/><br/><h2><center>What to do with your account</center></h2>
			<br/><h3>Options:</h3><br/>
			 <p class="mb-0"><a href="CompanyFind.php" style='border: solid black; display: inline' class="btn btn-primary px-4 py-2 rounded-0">Search for Member Company to Work for</a></p><br/>
			 <p class="mb-0"><a href="#" style='border: solid black' class="btn btn-primary px-4 py-2 rounded-0">View Members you are Currently Working for</a></p><br/>
	    	 <p class="mb-0"><a href="Nav.php" style='border: solid black' class="btn btn-primary px-4 py-2 rounded-0">View Services Available</a></p><br/>
			 <p class="mb-0"><a href="index.php" style='border: solid black; display: inline' class="btn btn-primary px-4 py-2 rounded-0">Return Home</a></p><br/>
			 <p class="mb-0"><a href="LogOut.php" style='border: solid black; display: inline' class="btn btn-primary px-4 py-2 rounded-0">Logout</a></p><br/>
          </div>
          </div>
        </div>
      </div>  
    </div>
	  
	
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-7">
                <h2 class="footer-heading mb-4">Located</h2>
                <p>Located just off of Route 9 and about 1.5 miles from Mass Pike exit 12, this Center makes an ideal office space for MetroWest Entrepreneurs!</p>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d737.7540296345782!2d-71.4334983708032!3d42.29952149062988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e389aa563f36f7%3A0x8d07cd2776662141!2s860%20Worcester%20Rd%2C%20Framingham%2C%20MA%2001702!5e0!3m2!1sen!2sus!4v1572362567982!5m2!1sen!2sus" width="300" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				<ul class="list-unstyled">
					<br/><li><a href="https://www.google.com/maps/place/860+Worcester+Rd,+Framingham,+MA+01702/@42.299521,-71.432951,17z/data=!4m5!3m4!1s0x89e389aa563f36f7:0x8d07cd2776662141!8m2!3d42.2995205!4d-71.4329512?hl=en" target="_blank">View Full Map</a></li>
				<ul>

              </div>
              <div class="col-md-4 ml-auto">
                <h2 class="footer-heading mb-4">Features</h2>
                <ul class="list-unstyled">
                  <li><a href="terms1.html">Terms of Service</a></li>
				  <li><a href="Handbook.pdf">Handbook</a></li>
                  <li><a href="contact.html">Contact Us</a></li>
                </ul>
              </div>

            </div>
          </div>
          <div class="col-md-4 ml-auto">

            <div class="mb-5">
              <h2 class="footer-heading mb-4">Subscribe to Newsletter</h2>
              <form action="#" method="post" class="footer-suscribe-form">
                <div class="input-group mb-3">
                  <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary text-white" type="button" id="button-addon2">Subscribe</button>
                  </div>
                </div>
            </div>


            <h2 class="footer-heading mb-4">Follow Us</h2>
            <a href="https://www.facebook.com/FSUInnovation/" target="_blank" class="smoothscroll pl-0 pr-3"><span class="icon-facebook"></span></a>
            <a href="https://twitter.com/FraminghamU" target="_blank" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
            <a href="https://www.instagram.com/fsuinnovation/" target="_blank" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
            <a href="https://www.linkedin.com/company/innovate-fsu/" target="_blank" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
            </form>
          </div>
        </div>
		
		<center><a href="#top" style="text-decoration: none;"><img src="images/up_arrow.png" style="display: inline;" width="10px" height="12px" ></img><p style="display: inline; font-size: 18px"> Back to top</p></a></center>
		
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
