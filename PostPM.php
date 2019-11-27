<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
$pmboard = $con -> query("SELECT * FROM privatemessageboards WHERE Username = '$_SESSION[Username]'");
$board = $pmboard -> fetch(PDO::FETCH_ASSOC);
$sql = $con -> query("INSERT INTO privatemessages (ConversationId, MessageSenderName, MessageSenderEmail, MessageSenderPicture, MessageBody)
VALUES
('$_GET[pm]','$board[Username]','$board[Email]','$board[ProfileImage]','$_POST[PMPost]')");
header("location: PrivateMessage.php?pm=" . $_GET['pm']);
?>