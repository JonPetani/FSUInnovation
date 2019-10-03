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
$Time = date('m/d/Y h:i:s a', time());
$sql = $con -> query("INSERT INTO privateconversations (ConversationName, CreatorName, CreationTime, Views, Messages, LastMessanger, LastMessageSentTime, Pinned)
VALUES
('$_POST[ConversationName]','$_SESSION[Username]',$Time,0,0,'$_SESSION[Username]'),$Time,1");
$Members = $_POST['Invitees'];
for ($i = 0; $i < sizeof($Members); $i++) {
	if($_SESSION["UserType"] == "Member") {
		$M = $con ->  query("SELECT * FROM member WHERE Username = '$_POST[Invitees][$i]'");
		$Member = $M -> fetchall(PDO::FETCH_ASSOC);
		$C = $con -> query("SELECT * FROM privateconversations WHERE ConversationName = '$_POST[ConversationName]' AND CreatorName = '$_SESSION[Username]'")
		$invite = $con -> query("INSERT INTO privateconversationmembers (PMAccountId, PMMemberName, PMMemberUsername, PMMemberImage, ConversationId, PMMemberEmail)
		VALUES
		()");
	}
	
}
?>