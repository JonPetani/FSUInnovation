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
    
  <div class="site-wrap" id="home-section" style="margin-left: 10%; margin-right: 5%">
  
	<center><a href="index.php"><img id="fsu_logo" src="images/fsu_logo1.png" alt="FSU Logo" height='40%' width='40%'/ style='margin-top: 10%'></a>
		<br/><h1>Results</h1>
		<h2 align=center>Current Projects</h2>
		<center><p>Below is all the Projects you have registered on this site. These projects are tasks you gave to the interns that signed up to help your business in some way.<br/> Review the interns assigned to each task below.</p></center>
		<br/><br/><?php
			session_start();
			$session_time = $_SERVER['REQUEST_TIME'];
		$timeout_duration = 1200;
		if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
			header("location: SessionExpire.php");
		$_SESSION['TimeLog'] = $session_time;
			$con = new PDO('mysql:host=sql208.byethost.com;dbname=b32_24537897_internsite;charset=utf8mb4','b32_24537897','Sayhello123');
			$sql = $con -> query("SELECT * FROM jobs WHERE CompanyName = '$_SESSION[CompanyName]'");
			$results = $sql -> fetchAll(PDO::FETCH_ASSOC);
			echo "<div style='overflow-x:auto;overflow-y:auto;'>";
			echo "<table align='center' width='80%' height='120%' border='solid black'>";
			echo"<tr><th>Job Name<th>Description<th>Number of Interns Still Needed<th>View All Related Interns to the Job here</tr>";
			for($i=0; $i<sizeof($results); $i++) {
				echo'<tr>';
				echo'<td>' . $results[$i]['JobName'] . '</td>';
				echo'<td>' . $results[$i]['JobDesc'] . '</td>';
				$skills = $con -> query("SHOW COLUMNS FROM jobs WHERE JobType = '$results[$i][JobType]'");
				preg_match("/^enum\(\'(.*)\'\)$/", $skills, $res);
				$icons = explode("','", $res[1]);
				echo'<td>' . $results[$i]['InternsNeeded'] . '</td>';
				echo'<td><a href="Project.php?project=' . $results[$i]['JobId'] . '"><img src="images/ToPage.jpg" class="TableImg" alt="View Interns for this project" height="40%"/></a></td>';
				echo'</tr>';
				}
				echo"</table>";
				echo"</div>";
		?>
		<br><br/>
		<h3>Can't find a Job you thought you posted?</h3><br/>
		<a href='RegisterJob.php' style='margin-right: 3%'>Post the new Job here</a>
		<a href='index.php'>Return Home</a></center>
   
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
