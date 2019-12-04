<?php
session_start();
$con = new PDO('mysql:host=localhost:3306;dbname=internsite;charset=utf8mb4','SiteAdmin','fsuintern495');
if(isset($_SESSION['IsAdmin'])) {
	if($_SESSION['IsAdmin'] == false) {
		header("location: AccessDenied.php");
		die;
	}
}
else {
	header("location: AccessDenied.php");
	die;
}	
?>
<head>
<title>Update MemberList</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='css/Intern1.css' rel='stylesheet'/>
<link href='css/member_page.css' rel='stylesheet'/>
</head>
<body>
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>Site Administration</h1>
<div class='select'>
<h2 align=center>Update Member Accounts on Site</h2>
<p>This tool will enable you to add multiple members to the website using a excel spreadsheet. Make sure the excel sheet is in a compatible format to use. If it isn't or your not sure, contact another admin to fix it for you so that it is.</p>
<h3>Note: Only Accounts Not in the System will be Added</h3>
<div class="container">
			<form action="MemberUpdate.php" method="post" enctype = 'multipart/form-data'>
				<div class="row">
					<div class="col-25">
						<label for="SpreadSheet">Enter the Excel Spreadsheet you wish to use: </label>
					</div>
					<div class="col-75">
						<input type = "file" name = "SpreadSheet" autocomplete='off' required>
					</div>
					<div class="row">
					<input id="submitButton" type="submit" value="Submit">
				</div>
				</div>
<br clear=both>
</div>
<footer>
<hr>
<address><strong>&copy;	Framingham State University Entreperenuer Innovation Center</strong></address>
</footer>
</body>
</html>