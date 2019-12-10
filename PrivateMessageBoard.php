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
		<script>
		function PinOn(obj) {
			document.obj.src = "images/images/Pin.png";
		}
		function PinOff(obj) {
			document.obj.src = "images/images/PinOff.png";
		}
		</script>
		
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
				$con = new PDO('mysql:host=sql208.byethost.com;dbname=b32_24537897_internsite;charset=utf8mb4','b32_24537897','Sayhello123');
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
  
    <div class="site-section" style="margin-right: 100px">
		<center><a href="index.php"><img id="fsu_logo" src="images/fsu_logo1.png" alt="FSU Logo"/></a>
		<br/><br/><h1>Private Message Board &nbsp;<img src="images/images/Logo.jpg" height="60px" width="100px" style="border: solid; margin-top: 2%"></img></h1>
		<h2>View and Create Private Conversations Here</h2>
		<p>Private Messages will only be seen by you and recipients.</p>
		<p>Members of the conversation may invite other users.</p>
		<h2>Below are all private messages you are a part of:</h2><br/>
		<div id='ForumHeading'>
		<h3 id='t'>Topic</h3>
		<h3 id='c'><?php echo $Board['Conversations']?> Conversations</h3></center>
		</div>
		<?php
		 $cid = 0;
		if(isset($_SESSION['UserType'])) {
			if ($_SESSION['UserType'] == "Intern") {
					$cid = $_SESSION['InternId'];
			}
			else if($_SESSION['UserType'] == "Member") {
					$cid = $_SESSION['MemberId'];
			}
		    else
					header("Location: Login.php?location=" . urlencode($_SERVER['REQUEST_URI']));
		}
		$count = $con -> query("SELECT * FROM privatemessageboards WHERE UserId = '$cid'");
		if ($count->rowCount() == 0) {
			if($_SESSION['UserType'] == "Intern") {
				$sql2 = $con -> query("Insert INTO privatemessageboards (Username, Name, Email, Conversations, UserId, ProfileImage)
				VALUES
				('$_SESSION[Username]','$_SESSION[InternName]','$_SESSION[EmailAddress]',0,'$_SESSION[InternId]','$_SESSION[InternPhoto]')");
			}
			else if($_SESSION['UserType'] == "Member") {
				$sql2 = $con -> query("Insert INTO privatemessageboards (Username, Name, Email, Conversations, UserId, ProfileImage)
				VALUES
				('$_SESSION[Username]','$_SESSION[ContactName]','$_SESSION[ContactEmail]',0,'$_SESSION[MemberId]','$_SESSION[CompanyPicture]')");
			}
		}
		$sql = $con -> query("SELECT * FROM privatemessageboards WHERE UserId = '$cid'");
		$Board = $sql -> fetch(PDO::FETCH_ASSOC);
		$Username = $_SESSION['Username'];
		switch($_SESSION['UserType']) {
				case "Intern":
					$NewName = $con -> query("UPDATE privatemessageboards SET Username = '$_SESSION[Username]' WHERE UserId = '$_SESSION[InternId]'");
					break;
				case "Member":
					$NewName = $con -> query("UPDATE privatemessageboards SET Username = '$_SESSION[Username]' WHERE UserId = '$_SESSION[MemberId]'");
					break;
				default:
					header("Location: LogOut.php");
					break;
		}
		$convList = explode(" ", $Board['PMList']);
		
			if(!empty($Board['PMList'])) {
		echo "<div style='overflow-x:auto;overflow-y:auto;'>";
		echo "<table id = 'MessageBoard'>";
		$pin = "";
		$conversations = array();
		foreach($convList as $converse) {
			$conversationGet = $con -> query("SELECT * FROM privateconversations WHERE ConversationId = '$converse'");
			$conversation = $conversationGet -> fetch(PDO::FETCH_ASSOC);
			array_push($conversations, $conversation);
		}
		/*$conversations = usort($conversations, function($x, $y) {
			$r = $x['Pinned'] <=> $y['Pinned'];
			return $r;
		});*/
		for ($i = 0; $i < sizeof($convList) - 1; $i++) {
			echo "<tr>";
			if(isset($conversations['Pinned'])) {
			if ($conversations['Pinned'] == 1)
				$pin = "<a href='Pinner.php'><img src='images/images/Pin.png' onmouseover='PinOff(this)' onmouseout='PinOn(this)' class='ForumList' alt='pinned'/></a>";
			else
				$pin = "<a href='Pinner.php'><img src='images/images/PinOff.png' class='ForumList' onmouseover='PinOn(this)' onmouseout='PinOff(this)' alt='not pinned'/ ></a>";
			}
			echo "<td>" . $pin . "<td><a href='PrivateMessage.php?pm=" . $conversations[$i]['ConversationId'] . "'>" . $conversations[$i]['ConversationName'] . "</a><td><a href='PrivateMessage.php?pm=" . $conversations[$i]['ConversationId'] . "'" . "<br><h4>Posted by " . $conversations[$i]['CreatorName'] . " on " . $conversations[$i]['CreationTime'] . "</h4><td><h4>" . $conversations[$i]['Views'] . " Views</h4><td><img src='images/chat.jpg' class='ForumList' alt='messages:'/> " . $conversations[$i]['Messages'] . "<td>" . $conversations[$i]['LastMessanger'] . "<br>Message Sent " . $conversations[$i]['LastMessageSentTime'];
		}
		echo "</table>";
		echo "</div>";
		}
		?>
		<center><h2>Can't find a conversation? Create a New One Here</h2>
		<hr>
		
		<div class="container">
			<form action="PrivateMessageCreate.php" method="post">
						<br/><label for="CName">Conversation Name: </label>
						<input type="text" name="CName" style='margin-left: 2%' autocomplete="off" autofocus></input>
						<br/><br/><label for="Invitees">Users to Invite to Conversation: </label>
						<input name="Invitees" style='margin-left: 2%; width: 30%' autocomplete="off"></input>
						<br/><br/><input id="submitButton" type="submit" style='width: 10%; height: 50%' value="Submit">
				
		</div></center>
	  
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
