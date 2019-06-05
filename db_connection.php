<!-- Connects to Website's Intern Database-->
<!--Main Developer: Jonathan Petani, Co-Collaborators: Jessica Grady, Simone McHugh-->
<?php
function OpenCon() {
	$dbhost = "localhost:8080";
	$dbuser = "SiteAdmin";
	$dbpass = "fsuintern495";
	$db = "internsite";
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die ("Connection has failed: %s\n". $conn -> error);
	return $conn;
}
function CloseCon($conn) {
	$conn -> close();
}
?>