<!doctype html>
<html lang="en">

  <head>
    <title>My Projects with Interns</title>
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
	<br/><br/><br/><br/><center><a href="index.php"><img id="fsu_logo" src="images/fsu_logo1.png" alt="FSU Logo" height='30%' width='30%'/></a></center><br/>
	<h1>Results</h1>
	<h2>Current Projects</h2>
		<p>Below is all the Projects you have registered on this site. These projects are tasks you gave to the interns that signed up to help your business in some way.<br/> Review the interns assigned to each task below.</p>
		<div style='overflow-x:auto;overflow-y:auto;'>
		<?php
			session_start();
			$con = new PDO('mysql:host=sql208.byethost.com;dbname=b32_24537897_internsite;charset=utf8mb4','b32_24537897','Sayhello123');
			$session_time = $_SERVER['REQUEST_TIME'];
			$timeout_duration = 1200;
			if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
				header("location: SessionExpire.php");
			$_SESSION['TimeLog'] = $session_time;
			$sql = $con -> query("SELECT * FROM jobmemberlist WHERE ProjectId = '$_GET[project]'");
			$results = $sql -> fetchall(PDO::FETCH_ASSOC);
			echo "<table align='center' width='120%' height='130%'>";
			echo"<tr><th>Intern Id<th>Intern Name<th>Intern Role</tr>";
			for($i=0; $i<sizeof($results); $i++) {
				echo'<tr>';
				echo'<td>' . $results[$i]['InternId'] . '</td>';
				echo'<td>' . $results[$i]['InternName'] . '</td>';
				echo'<td>' . $results[$i]['InternRole'] . '</td>';
				echo'</tr>';
				}
				echo"</table>";
				echo"</div>";
		?>
		<br>

	<br/><br/><center><h3>Want to look at the interns who are working on a different project you have?</h3>
	<a href='Projects.php' style='margin-right: 3%'>Select a New Job to view the interns assigned to it</a>
	<a href='LoggedInMember.php'>Otherwise, Return to your Page</a></center>
		  
       
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
