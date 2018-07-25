<?php /*
require_once('logincheck.php');
require_once('bancheck.php'); */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>
<title>Home - CodeAdict</title>

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
		<div id="center">
			<div id="wrapper">
			<h3>Recent Tutorials</h3><hr>
				<?php /*
				$sql = mysql_query("SELECT * FROM posts ORDER BY date DESC LIMIT 20");
				$i = 0;
				while($row=mysql_fetch_array($sql)){
					$posts_id = $row['id'];
					$posts_title = $row['title'];
					$posts_category = $row['category'];
					$posts_posted_by = $row['posted_by'];
					echo '
				<a href="posts.php?id='.$posts_id.'"><div id="recenttp">
				<h4>'.$posts_title.'</h4>
				<span>Posted by: '.$posts_posted_by.'<br>Category: '.$posts_category.'</span>
				</div></a>
					';
					$i = 1;
				}
				if($i == 0) {
					echo'<center><p style="font-style:italic;">There are no recent posts</p></center>';
				} */
				?>
			</div>
		</div>
		<div id="right">
			<div id="wrapper">
			<?php /*
			if($ok == 0) {
				echo '<a href="login.php"><h3>Log in</h3></a><hr>
			<form action="login.php" method="post">
			<table width="100%" cellpadding="5">
				<tr>
					<td><p>Username</td>
					<td><input type="text" name="username" class="login_text"></td>
				</tr>
				<tr>
					<td><p>Password</td>
					<td><input type="password" name="password" class="login_text"></td>
				</tr>
				<tr>
					<td align="right"><input type="submit" class="login_button" value="Log in"></td>
					<td align="left" style="font-size:12px;"><a href="register.php">New in this site?</a></td>
				</tr>
			</table>
			</form>';
			} else {
				$myusername = $_SESSION['userrecord']['username'];
				$sql = mysql_query("SELECT * FROM users WHERE username='$myusername' AND admin=1");
				echo '<h3>Hello, '.$_SESSION['userrecord']['username'].'!</h3><hr>
					';
				if(mysql_num_rows($sql) == 1) {
					echo '<a href="admin/" target="_blank"><div class="account_sb">Administration Panel</div></a>
					';
				}
				echo '
					<a href="request.php"><div class="account_sb">Request a tutorial</div></a>
					<a href="logout.php"><div class="account_sb">Logout</div></a>
					';
			} */
			?>
			<a href="testimonials.php"><h3>Recent Testimonials</h3></a><hr>
				<?php /*
				$sql = mysql_query("SELECT * FROM testimonials WHERE permission=1 ORDER BY date DESC LIMIT 3");
				$i = 0;
				while ($row=mysql_fetch_array($sql)) {
					$t_id = $row['id'];
					$t_posted_by = $row['posted_by'];
					$t_message = $row['message'];
					echo '
				<a href="testimonials.php#'.$t_id.'"><div id="recentwn_t">
				<h4>'.$t_posted_by.'</h4><img src="images/skin/default/bg/quote.png" class="quote" align="left"><span>'.$t_message.'</span>
				</div></a>
					';
					$i=1;
				}
				if($i==0) {
					echo'<center><p style="font-style:italic;">There are no recent testimonials posted</p><p>Be the <a href="testimonials.php#new">first</a> to write one!</center>';
				} */
				?>
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