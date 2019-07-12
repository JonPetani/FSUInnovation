<!--The layout for the member profile page (once an account has been made and signed into successfully).-->
<!DOCTYPE html>
<html>
	<head>
		<title>Member Profile</title>
		<link rel="icon" type="image/png" href="images/icon.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1" charset= "UTF-8">
		<link rel="stylesheet" type="text/css" href="member_page.css">
	</head>
	
	<body>
		<header style="margin-bottom:60px">
			<a href="Home.html"><img id="fsu_logo" src="images/fsu_logo.png" alt="FSU Logo"/></a>
			<p style="float:right;">Welcome Simone! <a href=""><button id="logoutButton">Logout</button></a></p>
			<h1 align="center">Your Profile<br/>(Member)</h1>
		</header>
		<div id="navMenu" align="center">
			<a href="Home.html"><button class="navButton">Home</button></a>
			<a href=""><button class="navButton">Interns</button></a>
			<a href=""><button class="navButton">Members</button></a>
			<a href=""><button class="navButton">Discussion Boards</button></a>
			<a href=""><button class="navButton">Newsfeed</button></a>
		</div>
		<div id="profilePage">
			<!--<form action = "" method = "post">-->
				<div id="left">
					<div align=center>
						<img id="profile" src="images/Gold-WithoutEars.jpg" align=center alt="Default Profile Picture (Dark Blue)"/>
						<h3>Simone McHugh</h3>
						<h3>Entrepreneur Innovation Center</h3>
						<p>Framingham, MA</p>
						<hr>
						<h3><u>Contact Info</u></h3>
						<h4>smchugh4@student.framingham.edu</h4>
						<h4>555-555-5555</h4>
					</div>
				</div>
				<div id="right">
					<p><b>Company Description</b></p>
					<p class="descriptionMember">The Entrepreneur Innovation Center is a hybrid co-working/incubator space in the MetroWest 
					region. The Center provides a collaborate workspace for members, giving them access to resources and connections to new 
					ideas and new networks. At the center, you will receive a quality co-working experience that's quiet, comfortable, and 
					extremely convenient, with a wealth of additional benefits, including a mail address for your company and free Wi-Fi.</p>
					<p class="descriptionMember">Work alongside entrepreneurs from a variety of industries, ranging from IT, to Fashion Design, 
					and even Nutrition, who all plan to build their business in the Metrowest area. The Center provides startup entrepreneurs 
					with the resources, time, and space to help turn their ideas into actual businesses in the shared work area, where members 
					connect with each other, collaborate, and exchange ideas. It even provides student interns from Framingham State University, 
					available to help with various size projects for the members. Each semester the EIC looks for new interns to work closely with 
					entrepreneurs running start-up businesses. The Center's intern pool is managed by the Director with academic guidance from the 
					University, thereby ensuring members get some high-quality resources to further their commercial endeavors. By the same token, 
					interns receive hands-on business training in conjunction with specialized course curriculum tailored to entrepreneurship.</p>
					<p class="descriptionMember">The Center maintains a primary partnership with Workbar, an established network of co-working spaces. 
					With the Workbar partnership, the Center is able to extend its reach and influence across Greater Boston. The partnership also includes 
					a large network of professionals at other centers in the region, a robust online network platform, and the ability to work at other 
					locations two days per month. The primary goal of the EIC initiative is to further develop an entrepreneurship undergraduate academic 
					curriculum and to maintain a vibrant co-working space dedicated to helping MetroWest startups. The mission of the Center is to help 
					create new businesses in MetroWest by incubating the development of start-up companies and creating new jobs while helping FSU students 
					learn about innovation.</p>
				</div>
				<br clear=both>
			<!--</form>-->
		</div>
		<footer align="center">
			<hr>
			<address><strong>&copy;	Framingham State University Entrepreneur Innovation Center</strong></address>
		</footer>
	</body>
</html>