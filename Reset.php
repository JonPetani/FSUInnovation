<?php
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
$sql = $con -> query("SELECT * FROM member WHERE AccessCode = '$_GET[Code]'");
$sql2 = $con -> query("SELECT * FROM intern WHERE AccessCode = '$_GET[Code]'");
$result = null;
$updateAccount = null;
$Username = "";
$Password = "";
$Code = null;
$Name = "";
if ($sql->rowCount() > 0) {
	$result = $sql -> fetchall(PDO::FETCH_ASSOC);
	$Name = $result[0]['ContactName'];
	if(empty($_POST['Username'])) {
		$Username = $result[0]['Username'];
	}
	else {
		$Username = $_POST['Username'];
	}
	if(empty($_POST['Password'])) {
		$Password = $result[0]['Password'];
	}
	else {
		$Password = $_POST['Password'];
	}
	$updateAccount = $con -> query("UPDATE member SET Username = '$Username', Password = '$Password', AccessCode = '$Code' WHERE ContactName = '$Name'"); 
}
else if($sql2->rowCount() > 0) {
	$result = $sql2 -> fetchall(PDO::FETCH_ASSOC);
	$Name = $result[0]['InternName'];
	if(empty($_POST['Username'])) {
		$Username = $result[0]['Username'];
	}
	else {
		$Username = $_POST['Username'];
	}
	if(empty($_POST['Password'])) {
		$Password = $result[0]['Password'];
	}
	else {
		$Password = $_POST['Password'];
	}
	$updateAccount = $con -> query("UPDATE intern SET Username = '$Username', Password = '$Password', AccessCode = '$Code' WHERE InternName = '$Name'"); 
}
else {
echo $sql2->rowCount();
echo $sql->rowCount();
echo "Fatal Error!!!";
die;
}
header("Location: AccountReset.php");
?>