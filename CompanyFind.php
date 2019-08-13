<!DOCTYPE html>
<html>
<head>
<title>Company Search</title>
<link rel="icon" type="image/png" href="images/icon.png"/>
<link href='member_page.css' rel='stylesheet'/>
<link href='Intern.css' rel='stylesheet'/>
</head>
<body align=center>
<a href="Home.html"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
<h1>Find a Member Company</h1>
<p align=left>As Companies find how useful our site is to help connect them with good interns, the number of companies a student could be a intern at keeps growing. Or optionally search by letter or keywords.</p>
<h2>Search for a Member Company in the Field Below</h2>
<div class="txt">
<h3>Search for Company by Name</h3>
<form method='post' action="CompanyResults.php" id='search'>
<input type="text" name='CompanyName'>
<input type="submit" name="submit" value="Search">
</form>
<h3>Search by Keyword(s)</h3>
<form method='post' action='Keywords.php' id='search'>
<input type="text" name="Keyword">
<input type="submit" name="submit" value="Search">
</form>
<h3>Search by Letter</h3>
<p><a  href="LetterFind.php?by=A">A</a> | <a  href="LetterFind.php?by=B">B</a> | <a  href="LetterFind.php?by=C">C</a> | <a  href="LetterFind.php?by=D">D</a> | <a  href="LetterFind.php?by=E">E</a> | <a  href="LetterFind.php?by=F">F</a> | <a  href="LetterFind.php?by=G">G</a> | <a  href="LetterFind.php?by=H">H</a> | <a  href="LetterFind.php?by=I">I</a> | <a  href="LetterFind.php?by=J">J</a> | <a  href="LetterFind.php?by=K">K</a> | <a  href="LetterFind.php?by=L">L</a> | <a  href="LetterFind.php?by=M">M</a> | <a  href="LetterFind.php?by=N">N</a> | <a  href="LetterFind.php?by=O">O</a> | <a  href="LetterFind.php?by=P">P</a> | <a  href="LetterFind.php?by=Q">Q</a> | <a  href="LetterFind.php?by=R">R</a> | <a  href="LetterFind.php?by=S">S</a> | <a  href="LetterFind.php?by=T">T</a> | <a  href="LetterFind.php?by=U">U</a> | <a  href="?by=V">V</a> | <a  href="?by=W">W</a> | <a  href="?by=X">X</a> | <a  href="LetterFind.php?by=Y">Y</a> | <a  href="LetterFind.php?by=Z">Z</a></p> 
</div>
<footer>
<hr>
<address><strong>&copy;	Framingham State University Entreperenuer Innovation Center</strong></address>
</footer>
</body>
</html>