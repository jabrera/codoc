﻿<?php
require_once('logincheck.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>
<title>Testimonials - CodeAdict</title>

	<link rel="stylesheet" type="text/css" media="all" href="styles/default/style.css">
	
</head>
<script type="text/javascript">
function search(id) {
	var obj = document.getElementById(id);
	if (document.getElementById('container').style.top == '0px') {
		document.getElementById('container').style.top = '-60px';
		obj.firstChild?obj.firstChild.data=txt:obj.appendChild(document.createTextNode(Search));
	} else {
		document.getElementById('container').style.top = '0px';
		obj.firstChild?obj.firstChild.data=txt:obj.appendChild(document.createTextNode(Hide));
	}
}
</script>
<body><center>
<div id="container">
	<div id="search">
		<div id="base">
		<form action="search.php" action="get">
			<input type="text" name="q" placeholder="Press enter to search...">
		</form>
		</div>
	</div>
	<div id="top">
		<div id="base">
			<a href="index.php"><div id="logo">
			</div></a>
			<a><div id="search_top" onMouseOver="search(search_top)">Search
			</div></a>
			<div id="navigation">
				<ul>
					<li><a href="index.php" class="main">Home</a></li>
					<li><a href="about.php" class="main">About</a>
						<ul>
							<li><a href="about/our_team.php">Our Team</a><li>
							<li><a href="about/this_website.php">This Website</a><li>
						</ul>
					</li>
					<li><a href="testimonials.php" class="main">Testimonials</a></li>
					<li><a href="request.php" class="main2">Request a Tutorial</a></li>
				</ul>
			</div>
		</div>
	</div><br><br>
	<div id="content">
		<div id="admin">
			<div id="wrapper">
			<h3>Message</h3><hr>
				<center><p><br><Br>Your IP/account has been banned by the administrator.<br><br>Click <a href="logout.php">here</a> to go back!<br><br></p></center>
			</div>
		</div>
	</div>
	<div id="footer">
	Website Name &copy; 2012
		<div id="nav">
		<a href="index.php">Home</a> | <a href="terms.php">Terms of Use</a> | <a href="about/our_team.php">Our Team</a> | <a href="about/this_website.php">About This Website</a> | <a href="request.php">Request a Tutorial</a> | <a href="contact.php">Contact</a>
		</div>
	</div>
</div>
</body>
</html>	