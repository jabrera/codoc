<?php
require_once('logincheck.php');
require_once('bancheck.php');
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
				<div id="posts">
				<?php
				if($ok == 1) {
					if(isset($_GET['id'])) {
						$id = $_GET['id'];
						$query = mysql_query("SELECT * FROM posts WHERE id='$id'");
						if(mysql_num_rows($query) == 1) {
							while($row = mysql_fetch_array($query)) {
								$title = $row['title'];
								$id = $row['id'];
								$message = $row['message'];
								$posted_by = $row['posted_by'];
								$message = str_replace("<", "&lt;", $message);
								$message = str_replace("->", "\t", $message);
								$message = str_replace('//[[', '<ul><div class="code"><code>', $message);
								$message = str_replace(']]//', '</code></div></ul>', $message);
								$date_added = $row['date_added'];
								$category = $row['category'];
								echo 
						'
				<a href="posts.php?id='.$id.'"><div id="recenttp" style="background:#cae5ff;">
				<h4>'.$title.'</h4>
				<span>Posted by: '.$posted_by.'<br>Category: '.$category.'</span>
				</div></a><p align="right" style="font-style:italic;color:grey;font-size:12px;">Date Posted: '.$date_added.'<br></p>
						<br>'.nl2br($message).'';
							}
						}
						echo '</div>';
						$query = mysql_query("SELECT * FROM comments WHERE postid='$id' ORDER BY date DESC");
						$numComments = mysql_num_rows($query);
						echo '<br><hr><a name="comments"></a><h3>Comments ('.$numComments.')</h3><hr>';
						$i = 0;
						while ($row = mysql_fetch_array($query)) {
							$id = $row['id'];
							$postid = $row['postid'];
							$message = $row['message'];
							$posted_by = $row['posted_by'];
							$date_added = $row['date_added'];
							echo '
					<div id="comments">
						<table><tr><td><a href="#"><span>'.$posted_by.'<span></a></td><td>'.$date_added.'</td></tr></table>
						<p>'.$message.'</p><hr>
					</div>
							';
							$i = 1;
						}
						if($i == 0) {
							echo '<center><p style="font-style:italic;">No comments</p></center>';
						}
						$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'#comments';
						$id = $_GET['id'];
						echo '<a name="new"></a>
				<form action="admin/process.php?table=comments&action=new&postid='.$id.'&url='.$url.'" method="post">
				<h3>Leave a Comment</h3><center><table cellpadding="5">
					<tr valign="top">
						<td><a href="#"><h4>'.$_SESSION['userrecord']['username'].'<h4></a></td><td align="right"></td>
					</tr>
					<tr valign="top">
						<td>Message</td><td><textarea name="message"></textarea></td>
					</tr>
					<tr valign="top">
						<td></td><td><input type="submit" class="login_button" value="Post"></td>
					</tr>
				</table></center>
				</form>';
					}
				} else {
					echo '<a href="login.php"><h3>Log in</h3></a><hr><span class="message">Please log in to see this tutorial.</span><form action="login.php" method="post">
				<center><table width="400px" cellpadding="5">
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
				</center>
				</form>';
				}
				?>
			</div>
		</div>
		<div id="right">
			<div id="wrapper">
			<?php
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
				echo '<h3>Hello, '.$_SESSION['userrecord']['username'].'!</h3><hr>';
				if(mysql_num_rows($sql) == 1) {
					echo '<a href="admin/" target="_blank">Administration Panel</a><br>';
				}
				echo '<a href="request.php">Request a tutorial</a><br><a href="logout.php">Logout</a>';
			}
			?>
			<a href="testimonials.php"><h3>Recent Testimonials</h3></a><hr>
				<?php
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
				}
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