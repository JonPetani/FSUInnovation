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
	
	<title><?php $con = new PDO('mysql:host=sql208.byethost.com;dbname=b32_24537897_internsite;charset=utf8mb4','b32_24537897','Sayhello123'); echo $_GET['comp']; ?></title>
	<link rel="icon" type="image/png" href="images/icon.png"/>

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
  
    <center><a href="index.php"><img id="fsu_logo" src="images/fsu_logo1.png" alt="FSU Logo" style='margin-top: 10%; margin-bottom: 5%'/></a></center>
	<h1><?php echo $_GET['comp']; ?></h1>
	<img src='data:image/jpeg;base64,<?php echo base64_encode($imagedata);?>' alt='profile image'/><br/>
	<?php
		$con = new PDO('mysql:host=sql208.byethost.com;dbname=b32_24537897_internsite;charset=utf8mb4','b32_24537897','Sayhello123');
		$sql = $con -> query("SELECT * FROM member WHERE CompanyName = '$_GET[comp]'");
		$results = $sql -> fetchAll(PDO::FETCH_ASSOC);
		echo $_GET['comp'];
		echo "<br/><br/><br/><h3>Contact Information</h3>";
		echo "<div style='margin-right: 4%'>";
		echo "<dl>";
		echo "<dt>Contact's Name:</dt>";
		echo "<dd>" . $results[0]['ContactName'] . "</dd>";
		echo "<dt>&#9990;:</dt>";
		echo "<dd>" . $results[0]['PhoneNumber'] . "</dd>";
		echo "<dt>&#9993;:</dt>";
		echo "<dd>" . $results[0]['ContactEmail'] . "</dd>";
		echo "<dl></div><br>";
		echo "<h3>Main Location</h3>";
		echo "<div class='select>'";
		echo "<dl>";
		echo "<dt>City</dt>";
		echo "<dd>" . $results[0]['CompanyCity'] . "</dd>";
		echo "<dt>State</dt>";
		echo "<dd>" . $results[0]['CompanyState'] . "</dd>";
		echo "<dl></div><br>";
		echo "<h2>Jobs Listed for this Member</h2>";
		echo "<div style='overflow-x:auto;overflow-y:auto; margin-right: 6%'>";
		echo "<table align='center' width='130%' height='120%' border='black solid'>";
		$SearchComp = $results[0]['CompanyName'];
		$sql2 = $con -> query("SELECT * FROM jobs WHERE CompanyName = '$SearchComp'");
		$results2 = $sql2 -> fetchall(PDO::FETCH_ASSOC);
		echo"<tr><th>Job Name<th>Description<th>Related Skills/Areas of Study<th>Number of Interns Still Needed<th>Requirements/Prerequisite Knowledge<th>Apply Here</tr>";
		for($i=0; $i<sizeof($results2); $i++) {
			echo'<tr>';
			echo'<td>' . $results2[$i]['JobName'] . '</td>';
			echo'<td>' . $results2[$i]['JobDesc'] . '</td>';
			$skills = $con -> query("SHOW COLUMNS FROM jobs WHERE JobType = '$results[$i][JobType]'");
			preg_match("/^enum\(\'(.*)\'\)$/", $skills, $res);
			$icons = explode("','", $res[1]);
			echo "<td>";
			for ($j = 0; $j<sizeof($icons); $j++) {
				switch ($icons[$j]) {
					case 'CS' :
					echo "<img src='images/Skills/CS.png' title='Computer Science' class='SkillImg' alt='Computer Science'/>";
					break;
					case 'IT' :
					echo "<img src='images/Skills/IT.jpg' title='Information Technology' class='SkillImg' alt='IT'/>";
					break;
					case 'SENG' :
					echo "<img src='images/Skills/SOFT.png' title='Software Engineering' class='SkillImg' alt='Software Engineering'/>";
					break;
					case 'WEB' :
					echo "<img src='images/Skills/WEB.png' title='Web Development' class='SkillImg' alt='Web Design'/>";
					break;
					case 'COMM' :
					echo "<img src='images/Skills/COMM.png' title='Communications' class='SkillImg' alt='Communications'/>";
					break;
					case 'AD' :
					echo "<img src='images/Skills/ADVERT.png' title='Advertising' class='SkillImg' alt='Advertising'/>";
					break;
					case 'NUT' :
					echo "<img src='images/Skills/NUTR.jpg' title='Nutrition' class='SkillImg' alt='Nutrition'/>";
					break;
					case 'BIOT' :
					echo "<img src='images/Skills/BIOTECH.jpg' title='Bio Technology' class='SkillImg' alt='Biotech'/>";
					break;
					case 'BIO' :
					echo "<img src='images/Skills/BIO.jpg' title='Biology' class='SkillImg' alt='Biology'/>";
					break;
					case 'CHEM' :
					echo "<img src='images/Skills/CHEM.jpg' title='Chemistry' class='SkillImg' alt='Chemistry'/>";
					break;
					case 'ENG' :
					echo "<img src='images/Skills/ENG.png' title='Engineering' class='SkillImg' alt='Engineering'/>";
					break;
					case 'ENGL' :
					echo "<img src='images/Skills/ENGL.jpg' title='English' class='SkillImg' alt='English'/>";
					break;
					case 'MED' :
					echo "<img src='images/Skills/MED.jpg' title='Medicine/Medical' class='SkillImg' alt='Medicine'/>";
					break;
					case 'MATH' :
					echo "<img src='images/Skills/MATH.jpg' title='Mathematics' class='SkillImg' alt='Math'/>";
					break;
					case 'FIN' :
					echo "<img src='images/Skills/FIN.png' title='Financing' class='SkillImg' alt='Financing'/>";
					break;
					case 'MARK' :
					echo "<img src='images/Skills/MARK.jpg' title='Marketing' class='SkillImg' alt='Marketing'/>";
					break;
					case 'AC' :
					echo "<img src='images/Skills/ACC.jpg' title='Accounting' class='SkillImg' alt='Accounting'/>";
					break;
					case 'MAN' :
					echo "<img src='images/Skills/MANAGE.jpg' title='Management' class='SkillImg' alt='Management'/>";
					break;
					case 'WRI' :
					echo "<img src='images/Skills/WRITE.jpg' title='Writing' class='SkillImg' alt='Writing'/>";
					break;
					case 'RE' :
					echo "<img src='images/Skills/RES.jpg' title='Research' class='SkillImg' alt='Research'/>";
					break;
					case 'GD' :
					echo "<img src='images/Skills/GRAPH.png' title='Graphic Design' class='SkillImg' alt='Graphic Design'/>";
					break;
					default :
					break;
				}
			}
			echo "<br clear=both></td>";
			echo'<td>' . $results2[$i]['InternsNeeded'] . '</td>';
			echo'<td>' . $results2[$i]['JobRequirements'] . '</td>';
			echo'<td><a href="Apply.php?job=' . $results2[$i]['JobId'] . '"><img src="images/ToPage.jpg" class="TableImg" alt="To Next Page" height="30%"/></a></td>';
			echo'</tr>';
			}
			echo"</table>";
			echo"</div>";
		?>
		
		<br/><br/><br/>
		<center><h3>Want to View Another Company's Page?</h3>
		<a href='CompanyFind.php'>Search for Another Company</a>
		<a href='index.php' style='margin-left: 7%'>Return Home</a></center>
			  
       
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
