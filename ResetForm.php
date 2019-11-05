<!DOCTYPE html>
<html>
<head>
<title>Reset Username/Password</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='css/Intern.css' rel='stylesheet'/>
<link href='css/member_page.css' rel='stylesheet'/>
</head>
<body>
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>FSU Innovation Internship Website</h1>
<?php
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
$sql = $con -> query("SELECT * FROM member WHERE AccessCode = '$_POST[Code]'");
$sql2 = $con -> query("SELECT * FROM intern WHERE AccessCode = '$_POST[Code]'");
if($sql->rowCount() == 0 and $sql2->rowCount() == 0) {
	echo "<div class='txt'>";
	echo"<h2 align=center>Wrong Code</h2>";
	echo"<p>The retrieval code entered is incorrect.</p>";
	echo"<p>Your best chance of recovering the account is trying to copy and paste the code we gave you from the email again. Otherwise, we can send you a new one.</p>";
	echo"<div class=select>";
	echo"<h3 align=center>Next Step</h3>";
	echo"<ul type=none>";
	echo"<li style='margin-left:-8%;float:left;text-align:center;'><a href='CodeEntry.php'>Try Entering the Code Again</a></li>";
	echo"<li style='margin-left:-3%;float:left;text-align:center;'><a href='EmailEntry.php'>Have Us Sent an Email with a New Code</a></li>";
	echo"</ul>";
	echo"<br clear=both>";
    echo"</div>";
	echo"</div>";
}
else {
	$page = "Reset.php?Code=" . $_POST['Code']; 
	echo"<h2 align=center>The Code Matches</h2>";
	echo"<p>Enter the changes you want to your login information below. If you wish to leave a field below the same, leave it empty.</p>";
	echo'<div class="container">';
			echo'<form action="' . $page . '" method="post">';
				echo'<div class="row">';
					echo'<div class="col-25">';
						echo'<label for="Username">New Username: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input type="text" name="Username" autocomplete="off"autofocus>';
					echo'</div>';
				echo'</div>';
				echo'<div class="row">';
					echo'<div class="col-25">';
						echo'<label for="Password">New Password: </label>';
					echo'</div>';
					echo'<div class="col-75">';
						echo'<input style="width:100%;height:6.5%;"type="password" name="Password" autocomplete="off">';
					echo'</div>';
					echo'<div class="row">';
					echo'<input id="submitButton" type="submit" value="Submit">';
				echo'</div>';
				echo'</div>';
echo'<br clear=both>';
echo'</div>';
}
?>
</html>