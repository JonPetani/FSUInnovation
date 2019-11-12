<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
if(isset($_SESSION['loggedin'])) {
	if($_SESSION['loggedin'] == true) {
		$session_time = $_SERVER['REQUEST_TIME'];
		$timeout_duration = 1200;
		if(isset($_SESSION['LogTime']) && ($session_time - $_SESSION['LogTime']) > $timeout_duration)
			header("Location:SessionExpire.php?location=" . urlencode($_SERVER['REQUEST_URI']));
		$_SESSION['TimeLog'] = $session_time;
	}
}
$Time = date('Y-m-d H:i:s', time());
switch($_SESSION['UserType']) {
	case 'Member':
		$cid = $_SESSION['MemberId'];
		break;
	case 'Intern':
		$cid = $_SESSION['InternId'];
		break;
	default:
		$cid = 10000;
		break;
}
$pin = true;
$start = 0;
$sql = $con -> query("INSERT INTO privateconversations (CreatorId, ConversationName, CreatorName, CreationTime, Views, Messages, LastMessanger, LastMessageSentTime, Pinned) VALUES ('$cid','$_POST[CName]','$_SESSION[Username]','$Time','$start','$start','$_SESSION[Username]','$Time','$pin')");
$Members = explode(' ', $_POST['Invitees']);
for ($i = 0; $i < sizeof($Members); $i++) {
	if($_SESSION["UserType"] == "Member") {
		$name = $Members[$i];
		$B = $con -> query("SELECT * FROM privatemessageboards WHERE Username = '$name'");
		$Board = $B -> fetchall(PDO::FETCH_ASSOC);
		$C = $con -> query("SELECT * FROM privateconversations WHERE ConversationName = '$_POST[CName]'");
		$Conv = $C -> fetchall(PDO::FETCH_ASSOC);
		$add = $con -> query("INSERT INTO usertopm (CNumber, UNumber) VALUES ('$Board[0][MemberId]','$Conv[0][ConversationId]')");
	}
	else if($_SESSION["UserType"] == "Intern") {
		$B = $con -> query("SELECT * FROM privatemessageboards WHERE UserId = '$Intern[0][InternId]'");
		$Board = $B -> fetchall(PDO::FETCH_ASSOC);
		$C = $con -> query("SELECT * FROM privateconversations WHERE ConversationName = '$_POST[CName]' AND CreatorName = '$_SESSION[Username]'");
		$Conv = $C -> fetchall(PDO::FETCH_ASSOC);
		$invite = $con -> query("INSERT INTO privateconversationmembers (PMAccountId, PMMemberName, PMMemberUsername, PMMemberImage, ConversationId, PMMemberEmail)
		VALUES
		('$Board[0][BoardId]','$Intern[0][InternName]','$Intern[0][Username]','$Intern[0][InternPhoto]','$Conv[0][ConversationId]','$Intern[0][EmailAddress]')");
	}
}
header("location: PrivateMessage.php?pm=" . $Conv[0]['ConversationId']);
?>