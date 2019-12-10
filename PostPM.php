<?php
session_start();
$con = new PDO('mysql:host=sql208.byethost.com;dbname=b32_24537897_internsite;charset=utf8mb4','b32_24537897','Sayhello123');
$pmboard = $con -> query("SELECT * FROM privatemessageboards WHERE Username = '$_SESSION[Username]'");
$board = $pmboard -> fetch(PDO::FETCH_ASSOC);
echo $_GET['PM'];
$sql = $con -> query("INSERT INTO privatemessages (ConversationId, MessageSenderName, MessageSenderEmail, MessageSenderPicture, MessageBody)
VALUES
('$_GET[pm]','$board[Username]','$board[Email]','$board[ProfileImage]','$_POST[PMPost]')");
header("location: PrivateMessage.php?pm=" . $_GET['pm']);
?>