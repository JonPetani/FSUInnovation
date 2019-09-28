<!--The Navagation Page of the Intern Webiste. Provides links to all pages on the website.-->
<!--Main Developer: Jonathan Petani, Co-Collaborators: Jessica Grady, Simone McHugh-->
<!DOCTYPE html>
<html>
<head>
<title>Navigation</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='css/Intern1.css' rel='stylesheet'/>
</head>
<body align=center>
<p id="top"></p>
		<div id='links'>
			<a href='Home.php'>Home</a>
			<a href="https://www.framingham.edu" target="_blank" style="margin-left: 30px">Framingham.edu</a>
			<a href='Login.php' style="margin-right: 30px;float: right;">Sign In</a>
			<a href='RegisterHub.php' style="margin-right: 30px;float: right;">Sign Up</a>
		</div>
		<hr color="#FFC400">
<a href="Home.php"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>Navigation Page</h1>
<p align=left>On this page, you can find helpful links to all pages on this website. Click a link below to reach the destination you are looking for.</p>
<h2>Listing of Pages</h2>
<ul type=none id='nav'>
<li><a href='Home.php'>Home</a></li>
<li><a href='InternLogin.php'>Interns Login</a></li>
<li><a href='MemberLogin.php'>Members Login</a></li>
<li><a href='' onmouseover='dOver(this)' onmouseout='dOut(this)'>Discussion Board</a></li>
<li><a href='' onmouseover='nOver(this)' onmouseout='nOut(this)'>NewsFeed</a></li>
<li><a href='CompanyFind.php'>Find a Company</a></li>
</ul>
<script language='Javascript'>
function dOver(obj) {
obj.innerHTML = "&#9888; Discussion Board (coming soon) &#9888;"
}
function nOver(obj) {
obj.innerHTML = "&#9888; NewsFeed (coming soon) &#9888;"
}
function dOut(obj) {
obj.innerHTML = "Discussion Board"
}
function nOut(obj) {
obj.innerHTML = "NewsFeed"
}
</script>
<footer>
<hr>
<address><strong>&copy;	Framingham State University Entreperenuer Innovation Center</strong></address>
</footer>
</body>
</html>