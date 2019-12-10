<!doctype html>
<html lang="en">

  <head>
    <title>Private Message Board</title>
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
                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block" id='links'>
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
        </div>

      </header>
    
  <div class="site-wrap" id="home-section" style="margin-left: 10%; margin-right: 5%">
  
     <div class="site-section" style="margin-right: 100px">
		<?php
		session_start();
		$con = new PDO('mysql:host=sql208.byethost.com;dbname=b32_24537897_internsite;charset=utf8mb4','b32_24537897','Sayhello123');
		$views = $con -> query("SELECT * FROM privateconversations WHERE ConversationId = '$_GET[pm]'");
		$v = $views -> fetch(PDO::FETCH_ASSOC);
		$viewnum = (int)$v['Views'] + 1;
		$incr = $con -> query("UPDATE privateconversations SET Views = '$viewnum' WHERE ConversationId = '$_GET[pm]'");
		$currentPage = "PostPM.php?pm=" . $_GET['pm'];
		?>
		<p id="top"></p>
		
		<hr color="#FFC400" clear=both><center>
		<br><a href="index.php"><img id="fsu_logo" src="images/fsu_logo1.png" height='200px' width='350px' alt="FSU Logo"/></a>
		<br/><br/><h1>Messages for Topic <?php echo $v['ConversationName'];?></h1>
		<?php
		$messages = $con -> query("SELECT * FROM privatemessages WHERE ConversationId = '$_GET[pm]'");
		
		if(!empty($messages)) {
		$messageList = $messages -> fetchall(PDO::FETCH_ASSOC);
			for($i = 0; $i < sizeof($messageList); $i++) {
				echo "<table style='background-color:#f5f5f5;padding:20px;' border='#050733'>";
				echo "<tr>";
				echo "<th colspan='2'>";
				echo "<img src='" . $messageList[$i]['MessageSenderPicture'] . "' class='TableImg' alt='Profile Picture'/>";
				echo "<p>" . $messageList[$i]['MessageSenderName'] . "</p>";
				echo "</th>";
				echo "<td colspan='5'>";
				echo "<p>" . $messageList[$i]['MessageBody'] . "</p>";
				echo "</td>";
				echo "</tr>";
				echo "</table>";
			}
		}
		?>
		<br/><center><form action="<?php echo $currentPage; ?>" method="post">
						<label for="PMPost" style='margin-right: 2%'>Toolbar: </label>
						<textarea name="PMPost" autocomplete="off" style='width: 40%'></textarea>
					<input id="submitButton" type="submit" value="Submit" style='margin-left: 2%'>					
		</form></center>
	 </div>
   </div>      
       
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
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
