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
    
  <div class="site-wrap" id="home-section" style="margin-left: 10%; margin-right: 5%">
  
    <div class="site-section">
			<center><img src="images/fsu_logo1.png"></img></center>
			<h1><b>Results</b></h1><br/>
            <br/><p class="lead">These are the results for the keyword <?php echo $_POST['Keyword'];?></p>			
			<br/><p class="lead">To visit a Member's Page to find what kind of work their looking for, click a button to the right side of each row to visit it</p>
		</div>
			<?php
				$con = new PDO('mysql:host=sql208.byethost.com;dbname=b32_24537897_internsite;charset=utf8mb4','b32_24537897','Sayhello123');
				$sql = $con -> query("SELECT * FROM keywords WHERE Keyword = '$_POST[Keyword]'");
				$results = $sql -> fetchAll(PDO::FETCH_ASSOC);
				if ($results == 0) {
					header("location: NoResults.php");
				}
				echo "<table align='center' width='150%' height='120%'>";
				echo"<tr><th>Logo<th>Company Name<th>Member Name<th>Company Location<th>Contact Info<th>Link to Member's Page</tr>";
				for($i=0; $i<sizeof($results); $i++) {
					$CompanyResult = $results[$i]['CompanyName'];
					echo'<tr>';
					$sql2 = $con -> query("SELECT * FROM member WHERE CompanyName = '$CompanyResult'");
					$CompanyInfo = $sql2 -> fetchAll(PDO::FETCH_ASSOC);
					echo'<td>' . $CompanyInfo[0]['CompanyPicture'] . '</td>';
					echo'<td>' . $CompanyInfo[0]['CompanyName'] . '</td>';
					echo'<td>' . $CompanyInfo[0]['ContactName'] . '</td>';
					echo'<td>' . $CompanyInfo[0]['CompanyCity'] . ", " . $CompanyInfo[0]['CompanyState'] . '</td>';
					echo'<td>' . '&#9990;: '. $CompanyInfo[0]['PhoneNumber'] . '<br>&#9993;: ' . $CompanyInfo[0]['ContactEmail'] . '</td>';
					$CompanyName = $CompanyInfo[0]['CompanyName'];
					echo'<td><a href="CompanyPage.php?comp=' . $CompanyName . '"><img src="images/ToPage.jpg" class="TableImg" alt="To Next Page"/></a></td>';
					echo'</tr>';
					}
					echo"</table>";
			?>
		
		<br/><br/><h3>Didn't find what you were looking for?</h3>
		<br/><a href='CompanyFind.php'>Try Again</a>
		<a href='index.php' style='margin-left: 4%'>Return Home</a>
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
