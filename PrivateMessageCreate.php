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
	$account = $con -> query("SELECT * FROM ")
}

header("location: PrivateMessage.php?pm=" . $Conv[0]['ConversationId']);
?>