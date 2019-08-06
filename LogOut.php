<?php
session_start();
session_destroy();
$_SESSION['loggedin'] = false;
$_SESSION["UserType"] = "";
header ("location: LoggedOut.html");
?>