<!doctype html>
<html lang="en">

  <head>
    <title>Intern Application</title>
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

			<center><a href="index.php"><img id="fsu_logo" src="images/fsu_logo1.png" alt="FSU Logo" style='margin-top: 10%'/></a></center>
			<h1>Intern Applications:</h1><br/>
			<h2 align=center>On this page you can view all Intern Applications for your various projects. You can choose to accept the intern on a team or deny them.</h2>
			<center><p>To visit a Member's Page to find what kind of work their looking for, click a button to the right side of each row to visit it</p></center>
			<?php
			session_start();
			$con = new PDO('mysql:host=sql208.byethost.com;dbname=b32_24537897_internsite;charset=utf8mb4','b32_24537897','Sayhello123');
			if($_SESSION['UserType'] == "")
				header("location: MemberLogin.php");
			if($_SESSION['UserType'] == "Intern")
				header("location: AccessDenied.html");
			$session_time = $_SERVER['REQUEST_TIME'];
			$timeout_duration = 1200;
			if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
				header("location: SessionExpire.php");
			$_SESSION['TimeLog'] = $session_time;
			$sql = $con -> query("SELECT * FROM applications WHERE CompanyName = '$_SESSION[CompanyName]'");
			$results = $sql -> fetchall(PDO::FETCH_ASSOC);
			echo"<table>";
			echo"<tr><th>Job Name<th>Intern Applying<th>Profile Info, If Allowed by Applicant<th>Resume (if they have one)<th>Skills and Experience they have<th>Intern's Application<th cellspan='2'>Accept/Deny Applicant</tr>";
			for ($i = 0; $i < sizeof($results); $i++) {
				$sql2 = $con -> query("SELECT * FROM intern WHERE InternName = '$results[$i][StudentName]'");
				$sql3 = $con -> query("SELECT * FROM jobs WHERE JobId = '$results[$i][JobId]'");
				$InternInfo = $sql2 -> fetchall(PDO::FETCH_ASSOC);
				$JobInfo = $sql3 -> fetchall(PDO::FETCH_ASSOC);
				echo"<tr>";
				echo "<td>" . $JobInfo[0]['JobName'] . "</td>";
				echo "<td>" . $results[$i]['StudentName'] . "</td>";
				if ($results[$i]['Permission'] == 'Yes') {
					echo '<td><a href="InternProfileViewer.php?student=' . $results[$i]['StudentName'] . '"><img src="images/Allowed.png" class="TableImg" alt="To Intern Profile"/></a></td>';
				}
				else {
					echo "<td><img src='images/Allowed.png' class='TableImg' alt='Access Denied to Information' title = 'Intern Denied you Access to View Profile Info (Send a pm to him/her if you have questions about them)'/></td>";
				}
				echo "<td>" . $InternInfo[0]['Resume'] . "</td>";
				echo "<td>" . $InternInfo[0]['SkillsAndExperience'] . "</td>";
				echo "<td>" . $results[$i]['InternApplication'] . "</td>";
				echo "<td cellspan='2'>" . '<a href="Accept.php?app=' . $results[$i]['AppId'] . '"><img src="images/Accept.jpg" class="SkillImg" alt="Accept Applicant"/></a>' . '<a href="Deny.php?app=' . $results[$i]['AppId'] . '"><img src="images/Delete.jpg" class="SkillImg" alt="Deny Applicant"/></a>';
				echo"</tr>";
				echo"</table>";
			}
			?>
			<br>
			<h3 align=center>What Now?</h3>
			<center><a href='LoggedInMember.php' style='margin-right: 4%'>Return to Main Page</a>
			<a href='index.php'>Return Home</a></center>
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
