<!doctype html>
<html lang="en">

  <head>
    <title>Company Found</title>
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
  
    <div class="site-section">
	
	<center><h1>The Company <?php echo substr($_GET['comp'], 1, strlen($_GET['comp']) - 2);?> Was Found</h1></center>
		<br/><br/><h2>These are the Details about this Company</h2>
		<br/><p>Look at the information below to confirm that this is the company you searched for.</p>
		<p>If it was, you can visit their page below to see available jobs and other related information.</p>
		<?php
			$con = new PDO('mysql:host=sql208.byethost.com;dbname=b32_24537897_internsite;charset=utf8mb4','b32_24537897','Sayhello123');
			$CompanyName = substr($_GET['comp'], 1, strlen($_GET['comp']) - 2);
			$sql = $con -> query("SELECT * FROM member WHERE CompanyName = '$CompanyName'");
			$results = $sql -> fetchAll(PDO::FETCH_ASSOC);
			echo '<table align=center width="100%" height="150%">';
			echo '<tr><td><h3>' . $CompanyName .'</h3></td></tr>';
			echo '<tr><td>' . $results[0]['CompanyPicture'] . '</td><tr>';
			$Company = $results[0]['CompanyName'];
			echo "<tr><td>Click the Button Below to View More Information on the Company's Page<br/><br><a href='CompanyPage.php?comp=" . $Company . "'><img align=center src='images/ToPage.jpg' style='width:7%;height:15%;' alt='To Next Page'/></a></td></tr>";
			echo '</table>';
		?>
		
		<br/><br/><br/><h3>This isn't the Company you had in mind?</h3>
		<a href='CompanyFind.php' style='margin-right: 3%'>Try Again</a>
		<a href='index.php'>Return Home</a>
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
