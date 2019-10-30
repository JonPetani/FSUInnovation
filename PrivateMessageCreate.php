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
$sql = $con -> query("INSERT INTO privateconversations (ConversationName, CreatorName, CreationTime, Views, Messages, LastMessanger, LastMessageSentTime, Pinned)
VALUES
('$_POST[ConversationName]','$_SESSION[Username]',$Time,0,0,'$_SESSION[Username]'),$Time,'yes'");
$Members = explode(' ', $_POST['Users']);
for ($i = 0; $i < sizeof($Members); $i++) {
	if($_SESSION["UserType"] == "Member") {
		echo $Members[$i];
		$M = $con ->  query("SELECT * FROM member WHERE Username = '$Members[$i]'");
		$Member = $M -> fetchall(PDO::FETCH_ASSOC);
		$num = $Member[0]['MemberId'];
		$B = $con -> query("SELECT * FROM privatemessageboards WHERE UserId = $num");
		$Board = $B -> fetchall(PDO::FETCH_ASSOC);
		$C = $con -> query("SELECT * FROM privateconversations WHERE ConversationName = '$_POST[ConversationName]' AND CreatorName = '$_SESSION[Username]'");
		$Conv = $C -> fetchall(PDO::FETCH_ASSOC);
		$invite = $con -> query("INSERT INTO privateconversationmembers (PMAccountId, PMMemberName, PMMemberUsername, PMMemberImage, ConversationId, PMMemberEmail)
		VALUES
		('$Board[0][BoardId]','$Member[0][ContactName]','$Member[0][Username]','$Member[0][CompanyPicture]','$Conv[0][ConversationId]','$Member[0][ContactEmail]')");
	}
	else if($_SESSION["UserType"] == "Intern") {
		$I = $con ->  query("SELECT * FROM intern WHERE Username = '$Members[$i]'");
		$Intern = $I -> fetchall(PDO::FETCH_ASSOC);
		$B = $con -> query("SELECT * FROM privatemessageboards WHERE UserId = '$Intern[0][InternId]'");
		$Board = $B -> fetchall(PDO::FETCH_ASSOC);
		$C = $con -> query("SELECT * FROM privateconversations WHERE ConversationName = '$_POST[ConversationName]' AND CreatorName = '$_SESSION[Username]'");
		$Conv = $C -> fetchall(PDO::FETCH_ASSOC);
		$invite = $con -> query("INSERT INTO privateconversationmembers (PMAccountId, PMMemberName, PMMemberUsername, PMMemberImage, ConversationId, PMMemberEmail)
		VALUES
		('$Board[0][BoardId]','$Intern[0][InternName]','$Intern[0][Username]','$Intern[0][InternPhoto]','$Conv[0][ConversationId]','$Intern[0][EmailAddress]')");
	}
}
//header("location: PrivateMessage.php?pm=" . $Conv[0]['ConversationId']);
?>