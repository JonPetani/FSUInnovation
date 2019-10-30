<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Private Message Board</title>
		<link rel="icon" type="image/png" href="images/icon.png"/>
		<!-- <link href='css/Intern.css' rel='stylesheet'/>  -->
		<link href='css/Intern1.css' rel='stylesheet'/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
	</head>
		<body>
		<p id="top"></p>
		<div id='links'>
			<a href='Home.php'>Home</a>
			<a href="https://www.framingham.edu" target="_blank" style="margin-left: 30px">Framingham.edu</a>
			<a href='Login.php' style="margin-right: 30px;float: right;" id = 'si'>Sign In</a>
			<a href='RegisterHub.php' style="margin-right: 30px;float: right;"id = 'su'>Sign Up</a>
		<?php
		session_start();
		$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
		//error_reporting(E_ALL ^ E_NOTICE);
		if(isset($_SESSION['loggedin'])) {
			if($_SESSION['loggedin'] == true) {
				$session_time = $_SERVER['REQUEST_TIME'];
				$timeout_duration = 1200;
				if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
					header("Location:SessionExpire.php?location=" . urlencode($_SERVER['REQUEST_URI']));
				$_SESSION['TimeLog'] = $session_time;
				if($_SESSION['UserType'] == "Member") {
					echo "<script>";
					echo "var parent = document.getElementById('links');";
					echo "var child1 = document.getElementById('su');";
					echo "var child2 = document.getElementById('si');";
					echo "parent.removeChild(child1);";
					echo "parent.removeChild(child2);";
					echo "</script>";
					echo "<img src='images/PowerOpen.png' class='accounts' onmouseover='this.src=\"images/PowerPressed.png\";' onmouseout='this.src=\"images/PowerOpen.png\";' alt='Account Tab'/>";
					echo "<a href='PrivateMessageBoard.php'><img src='images/PM.png' class='accounts' onmouseover='this.src=\"images/PMOpen.png\";' onmouseout='this.src=\"images/PM.png\";' alt='Private Messages'/></a>";
					}
				else if($_SESSION['UserType'] == "Intern") {
					echo "<script>";
					echo "var parent = document.getElementById('links');";
					echo "var child1 = document.getElementById('su');";
					echo "var child2 = document.getElementById('si');";
					echo "parent.removeChild(child1);";
					echo "parent.removeChild(child2);";
					echo "</script>";
					echo "<img src='images/PowerOpen.png' class='accounts' onmouseover='this.src=\"images/PowerPressed.png\";' onmouseout='this.src=\"images/PowerOpen.png\";' alt='Account Tab'/>";
					echo "<a href='PrivateMessageBoard.php'><img src='images/PM.png' class='accounts' onmouseover='this.src=\"images/PMOpen.png\";' onmouseout='this.src=\"images/PM.png\";' alt='Private Messages'/></a>";
					}
			}
		}
	   $email = "";
		if(isset($_SESSION['UserType'])) {
			if ($_SESSION['UserType'] == "Intern") {
					$email = $_SESSION['EmailAddress'];
			}
			else if($_SESSION['UserType'] == "Member") {
					$email = $_SESSION['ContactEmail'];
			}
		    else
					header("Location: Login.php?location=" . urlencode($_SERVER['REQUEST_URI']));
		}
		$count = $con -> query("SELECT * FROM privatemessageboards WHERE Email = '$email'");
		if ($count->rowCount() == 0) {
			if($_SESSION['UserType'] == "Intern") {
				$sql2 = $con -> query("Insert INTO privatemessageboards (Username, Name, Email, Conversations, UserId)
				VALUES
				('$_SESSION[Username]','$_SESSION[InternName]','$_SESSION[EmailAddress]',0,'$_SESSION[InternId]')");
			}
			else if($_SESSION['UserType'] == "Member") {
				$sql2 = $con -> query("Insert INTO privatemessageboards (Username, Name, Email, Conversations, UserId)
				VALUES
				('$_SESSION[Username]','$_SESSION[ContactName]','$_SESSION[ContactEmail]',0,'$_SESSION[MemberId]')");
			}
		}
		$sql = $con -> query("SELECT * FROM privatemessageboards WHERE Email = '$email'");
		$Board = $sql -> fetchall(PDO::FETCH_ASSOC);
		$sql2 = $con -> query("SELECT * FROM privateconversationmembers WHERE PMMemberEmail = '$email'");
		$conversations = $sql2 -> fetchall(PDO::FETCH_ASSOC);
?>
</div>
		<hr color="#FFC400" clear=both>
<!--$conversations[$i]['ConversationName']-->
		<br><a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
		<h1>Private Message Board &nbsp;<img src="images/Logo.jpg" height="60px" width="100px" style="border: solid; margin-top: 2%"></img></h1>
		<div class='txt'>
		<h2>View and Create Private Conversations Here</h2>
		<p>Private Messages will only be seen by you and recipients.</p>
		<p>Members of the conversation may invite other users.</p>
		<h2>Below are all private messages you are a part of</h2>
		<div id='ForumHeading'>
		<h3 id='t'>Topic</h3>
		<h3 id='c'><?php echo $Board[0]['Conversations']?> Conversations</h3>
		</div>
		<?php
		echo "<div style='overflow-x:auto;overflow-y:auto;'>";
		echo "<table id = 'MessageBoard'>";
		$pin = "";
		for ($i = 0; $i < sizeof($conversations); $i++) {
			echo "<tr>";
			if ($conversations[$i]['Pinned'] == 0)
				$pin = "<img src='images/Pin.png' class='pin' alt='pinned'/>";
			else
				$pin = "<img src='images/PinOff.png' class='pin' alt='not pinned'/>";
			echo "<td>" . $pin . "<td><a href='PrivateMessage.php?pm=" . $conversations[$i]['ConversationName'] . "'" . "<br><h4>Posted by " . $conversations[$i]['CreatorName'] . " on " . $conversations[$i]['CreationTime'] . "</h4><td><h4>" . $conversations[$i]['Views'] . "Views</h4><td><img src='images/chat.jpg' class='pin' alt='messages:'/> " . $conversations[$i]['Messages'] . "<td>" . $conversations[$i]['LastMessanger'] . "<br>Message Sent " . $conversations[$i]['LastMessageSentTime'];
		}
		?>
		</table>
		</div>
		<h2>Don't can't find a conversation? Create a New One Here</h2>
		<form action="PrivateMessageCreate.php" id='TopicCreate' method='post'>
		<label>Conversation Name: </label>
		<input type='text' name='ConversationName' autocomplete='off' required /><br>
		<label>Add Users to Conversation by Username (Invites will reach their inbox) </label>
		<input type='text' name='Users' autocomplete='off' required /><br>
		<input id="submitButton" type="submit" value="Submit" style='float:left;background-color:#66ff99;width:21%;height:10%;'>
		</form>
		</div>