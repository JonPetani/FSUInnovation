<!doctype html>
<html lang="en">

  <head>
    <title>Home | FSUInnovation</title>
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
					echo "<a href='MemberList.php'><p style='margin-left: -60%'>Member List</p></a>";
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
					echo "<a href='MemberList.php'><p style='margin-left: -60%'>Member List</p></a>";
				}
			}
		}
		?>
                </ul>
              </nav>
			  </div>
            </div>
            

          </div>
        </div>
      </header>
	  
	    
    
    <div class="owl-carousel owl-1" style="margin-top: 6%">
	
      <div class="ftco-blocks-cover-1">
        <div class="ftco-cover-1" style="background-image: url('images/hero_1.jpg');">
            <div class="container">
              <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center">
                  <b><h1 style='font-size: 340%; text-shadow: 5px 3px black'><font color='white'>Welcome to the FSU Entrepreneur Innovation Website</font></h1></b>
				  <br/><p class="mb-0"><a href="SignUp.php" style='border: solid black; float: left; margin-left: 28%; margin-right: 20px' class="btn btn-primary px-4 py-2 rounded-0">Sign Up</a></p>
                  <p class="mb-0"><a href="SignIn.php" style='border: solid black; float: left' class="btn btn-primary px-4 py-2 rounded-0">Sign In</a></p>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="ftco-blocks-cover-1">
        <div class="ftco-cover-1" style="background-image: url('images/5079.jpg');">
          <div class="container">
              <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center">
                  <h1></h1>
				  <br/><br/><b><h1 style='font-size: 320%; text-shadow: 5px 3px black'><font color='white'>New to the site? Create an account</font></h1></b>
				  <br/><p class="mb-0"><a href="SignUp.php" style='border: solid black; float: left; margin-left: 28%; margin-right: 20px' class="btn btn-primary px-4 py-2 rounded-0">Sign Up</a></p>
                  <p class="mb-0"><a href="SignIn.php" style='border: solid black; float: left' class="btn btn-primary px-4 py-2 rounded-0">Sign In</a></p>
                </div>
              </div>
            </div>
        </div>
      </div>
	   <div class="ftco-blocks-cover-1">
        <div class="ftco-cover-1" style="background-image: url('images/2.jpg');">
            <div class="container">
              <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center">
                  <br/><b><h1 style='font-size: 280%; text-shadow: 5px 3px black'><font color='white'>Find a member company today, to start an internship</font></h1></b>
				  <br/><p class="mb-0"><a href="SignUp.php" style='border: solid black; float: left; margin-left: 28%; margin-right: 20px' class="btn btn-primary px-4 py-2 rounded-0">Sign Up</a></p>
                  <p class="mb-0"><a href="SignIn.php" style='border: solid black; float: left' class="btn btn-primary px-4 py-2 rounded-0">Sign In</a></p>
                </div>
              </div>
            </div>
        </div>
      </div>
	  
	   <div class="ftco-blocks-cover-1">
        <div class="ftco-cover-1" style="background-image: url('images/61.jpg');">
            <div class="container">
              <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center">
                  <br/><br/><b><h1 style='font-size: 310%; text-shadow: 5px 3px black'><font color='white'>FSU Entrepreneur Innovation Center</font></h1></b>
				  <br/><p class="mb-0"><a href="SignUp.php" style='border: solid black; float: left; margin-left: 28%; margin-right: 20px' class="btn btn-primary px-4 py-2 rounded-0">Sign Up</a></p>
                  <p class="mb-0"><a href="SignIn.php" style='border: solid black; float: left' class="btn btn-primary px-4 py-2 rounded-0">Sign In</a></p>
                </div>
              </div>
            </div>
        </div>
      </div>
	  <div class="ftco-blocks-cover-1">
        <div class="ftco-cover-1" style="background-image: url('images/5290.jpg');">
            <div class="container">
              <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center">
                  <br/><b><h1 style='font-size: 270%; text-shadow: 5px 3px black'><font color='white'>Expand your horizons and collaborate with other entreprenuers</font></h1></b>
				  <br/><p class="mb-0"><a href="SignUp.php" style='border: solid black; float: left; margin-left: 28%; margin-right: 20px' class="btn btn-primary px-4 py-2 rounded-0">Sign Up</a></p>
                  <p class="mb-0"><a href="SignIn.php" style='border: solid black; float: left' class="btn btn-primary px-4 py-2 rounded-0">Sign In</a></p>
                </div>
              </div>
            </div>
        </div>
      </div>
	  <div class="ftco-blocks-cover-1">
        <div class="ftco-cover-1" style="background-image: url('images/5210.jpg');">
            <div class="container">
              <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center">
                  <b><h1 style='font-size: 270%; text-shadow: 5px 3px black'><font color='white'>Become part of this expansive community today</font></h1></b>
				  <br/><p class="mb-0"><a href="SignUp.php" style='border: solid black; float: left; margin-left: 28%; margin-right: 20px' class="btn btn-primary px-4 py-2 rounded-0">Sign Up</a></p>
                  <p class="mb-0"><a href="SignIn.php" style='border: solid black; float: left' class="btn btn-primary px-4 py-2 rounded-0">Sign In</a></p>
                </div>
              </div>
            </div>
        </div>
      </div>
	  <div class="ftco-blocks-cover-1">
        <div class="ftco-cover-1" style="background-image: url('images/_L1A9232.jpg');">
            <div class="container">
              <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center">
                  <br/><b><h1 style='font-size: 270%; text-shadow: 5px 3px black'><font color='white'>New to the site? Create an account</font></h1></b>
				  <br/><p class="mb-0"><a href="SignUp.php" style='border: solid black; float: left; margin-left: 28%; margin-right: 20px' class="btn btn-primary px-4 py-2 rounded-0">Sign Up</a></p>
                  <p class="mb-0"><a href="SignIn.php" style='border: solid black; float: left' class="btn btn-primary px-4 py-2 rounded-0">Sign In</a></p>
                </div>
              </div>
            </div>
        </div>
      </div>
      
    </div>
	<hr color="#FFC400">



    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <h2 class="heading-39291">What do we offer?</h2>
			<ul>
				<li><p class="mb-5">This is a website designed for both student interns to find positions that suit them, and for employers to put up positions that these interns then can apply for</p></li>
				<li><p class="mb-5">We allow students and representatives of companies to make accounts that can be stored in our database to make connections between future interns and their employers seamless</p></li>
				<li><p class="mb-5">In addition, our site has a discussion board where employers and students can communicate to each other making the application process as smooth as possible</p></li>
            </ul>
			<p><a href="SignUp.php" class="more-39291" style='font-size: 100%'>Sign Up</a></p><br/><br/>
			
			<div class="year-experience-99301">
				<img src='images/hero_0111.jpg' width='70%' height='100%' style="margin-left: 15%"></img>
			</div>
			<br/><p><a href="#" class="more-39291" style='font-size: 100%'>Learn more about the Coffee Cart at FSU</a></p>
          </div>
		  
		  
		  
          <div class="col-md-4 ml-auto">
		  	
            <div class="year-experience-99301"><span class="number"><span><img src="images/room.jpg" width='100%' height='30%'></span></span><br/><br/>
              <h2 class="heading-39291">A site for FSU student's and employers</h2>
              <span class="text">Start-up <span>Incubator</span></span>
			  <span class="text">Co-working <span>Space</span></span>
			  <span class="text">Internship <span>Program</span></span>
              <img src="images/fsu_logo1.png" width='100%'></img>
            </div>
			
			<br/><br/><br/>
			<div class="year-experience-99301">
                <span class="number"><span><img src="images/Mark.jpg" width='100%' height='100%'></img><h5 style="margin-top: 10%"><center>Podcast Room</center></h5></span></span>
            </div>
          </div>
		  
            
        </div>
      </div> 
    </div>
    </div>
  		 <hr color="#FFC400">

    <div class="site-section section-4">
      <div class="container">

        <div class="row justify-content-center text-center">
          <div class="col-md-7">
            <div class="slide-one-item owl-carousel">
              <blockquote class="testimonial-1">
                <span class="quote quote-icon-wrap"><span class="icon-format_quote"></span></span>
                <p>A great workspace to work in conjunction with other interns and startup companies. Join and experience the Center's benefits!</p>
                <cite><span class="text-black">Brian Perel</span> &mdash; <span class="text-muted">Web Development Intern</span></cite>
              </blockquote>

              <blockquote class="testimonial-1">
                <span class="quote quote-icon-wrap"><span class="icon-format_quote"></span></span>
                <p>We're the only university operating a co-working space for the purpose of student learning.</p>
                <cite><span class="text-black">Mark Hardie</span> &mdash; <span class="text-muted">Director</span></cite>
              </blockquote>
			  
			   <blockquote class="testimonial-1">
                <span class="quote quote-icon-wrap"><span class="icon-format_quote"></span></span>
                <p>So many good new ideas with so many talented people to work with and be around</p>
                <cite><span class="text-black">Jon Petani</span> &mdash; <span class="text-muted">PHP Web Development Intern</span></cite>
              </blockquote>
			  
			  <blockquote class="testimonial-1">
                <span class="quote quote-icon-wrap"><span class="icon-format_quote"></span></span>
                <p>The center is full of helpful resources encouraging entrepreneurs to build-measure-learn</p>
                <cite><span class="text-black">Mike Fleurime</span> &mdash; <span class="text-muted">Business Intern</span></cite>
              </blockquote>
			  
			   <blockquote class="testimonial-1">
                <span class="quote quote-icon-wrap"><span class="icon-format_quote"></span></span>
                <p>Hands on skills are fundamental and the innovation center provides an abundance of opportunities</p>
                <cite><span class="text-black">Jared Grigg</span> &mdash; <span class="text-muted">Business Management Intern</span></cite>
              </blockquote>
			  
			  <blockquote class="testimonial-1">
                <span class="quote quote-icon-wrap"><span class="icon-format_quote"></span></span>
                <p>The Innovation Center is a place where you can come in and network with people that work with different companies around the MetroWest area.</p>
                <cite><span class="text-black">Joe Ambrosino</span> &mdash; <span class="text-muted">Management Intern</span></cite>
              </blockquote>
            </div>
          </div>
        </div>
      </div>
    </div>
        	<hr color="#FFC400">


    <div class="site-section">
      <div class="container">
        <div class="row  mb-5">
          <div class="col-md-7">
            <h2 class="heading-39291">Services</h2>
            <p>Find all our services here</p>
          </div>
        </div>
		
		
        <div class="row align-items-stretch">
          <div class="col-lg-3 col-md-6 mb-5">
		    <h2><a href="InternLogin.php">Interns Login</a></h2>
            <div class="post-entry-1 h-100">
              <a href="InternLogin.php">
                   <img src="images/11.jpg" alt="Image"
                     class="img-fluid"></img>
              </a>
              <div class="post-entry-1-contents">
                <p class="my-3"><a href="InternLogin.php" class="more-39291">Go login</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5">
		   <h2><a href="MemberLogin.php">Members Login</a></h2>
            <div class="post-entry-1 h-100">
              <a href="MemberLogin.php">
                 <img src="images/22.jpg" alt="Image" 
                   class="img-fluid"></img>
              </a>
              <div class="post-entry-1-contents">
                <p class="my-3"><a href="MemberLogin.php" class="more-39291">Go login</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5">
		   <h2><a href="#">Discussion Board</a></h2>
            <div class="post-entry-1 h-100">
              <a href="#">
                <img src="images/3.jpg" alt="Image" 
                 class="img-fluid"></img>
              </a>
              <div class="post-entry-1-contents">
                <p class="my-3"><a href="#" class="more-39291">Go to discussion board</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5">
		  <h2><a href="CompanyFind.php">Find a Company</a></h2>
            <div class="post-entry-1 h-100">
              <a href="CompanyFind.php">
                <img src="images/4.jpg" alt="Image" 
                 class="img-fluid"></img>
              </a>
              <div class="post-entry-1-contents">
                <p class="my-3"><a href="CompanyFind.php" class="more-39291">Go find a company</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    	<hr color="#FFC400">


    
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-7">
                <h2 class="footer-heading mb-4">Location</h2>
                <p>Located just off of Route 9 and about 1.5 miles from Mass Pike exit 12, this Center makes an ideal office space for MetroWest Entrepreneurs!</p>
				<br/><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d737.7540296345782!2d-71.4334983708032!3d42.29952149062988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e389aa563f36f7%3A0x8d07cd2776662141!2s860%20Worcester%20Rd%2C%20Framingham%2C%20MA%2001702!5e0!3m2!1sen!2sus!4v1572362567982!5m2!1sen!2sus" width="300" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				<ul class="list-unstyled">
					<br/><li><a href="https://www.google.com/maps/place/860+Worcester+Rd,+Framingham,+MA+01702/@42.299521,-71.432951,17z/data=!4m5!3m4!1s0x89e389aa563f36f7:0x8d07cd2776662141!8m2!3d42.2995205!4d-71.4329512?hl=en" target="_blank">View Full Map</a></li>
					<a href="directions.pdf" target="_blank">Written Directions</a>
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
          		  <img src="images/5.jpg" class='text-center' height="200px" width="350px" style="margin-top: 10%"></img>
				</div>			

        </div>
			<br/><center><a href="#top" style="text-decoration: none;"><img src="images/up_arrow.png" style="display: inline;" width="10px" height="12px" ></img><p style="display: inline; font-size: 18px"> Back to top</p></a></center>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">

              <p>

            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
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
