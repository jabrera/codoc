<?php
require_once('../../logincheck.php');
require_once('../../admincheck.php');
require_once('../../bancheck.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>
<title>Control Panel - CodeAdict</title>

	<link rel="stylesheet" type="text/css" media="all" href="../../styles/default/style.css">
	
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
		<form action="../../search.php" action="get">
			<input type="text" name="q" placeholder="Press enter to search...">
		</form>
		</div>
	</div>
	<div id="top">
		<div id="base">
			<a href="../../index.php"><div id="logo">
			</div></a>
			<a><div id="search_top" onMouseOver="search(search_top)">Search
			</div></a>
			<div id="navigation">
				<ul>
					<li><a href="../../index.php" class="main">Home</a></li>
					<li><a href="../../about.php" class="main">About</a>
						<ul>
							<li><a href="../../about/our_team.php">Our Team</a><li>
							<li><a href="../../about/this_website.php">This Website</a><li>
						</ul>
					</li>
					<li><a href="../../testimonials.php" class="main">Testimonials</a></li>
					<li><a href="../../request.php" class="main2">Request a Tutorial</a></li>
				</ul>
			</div>
		</div>
	</div><br><br>
	<div id="content">
		<div id="admin">
			<div id="wrapper">
			<h3><a href="../">Control Panel</a> / Members</h3><hr>
				<h4>Search</h4>
				<form action="index.php" method="get">
					<table width="100%">
						<tr>
							<td width="320px"><input type="text" name="q" class="default_text"></td>
							<td width="100px"><select name="search">
								<option value="username">Username</option>
								<option value="password">Password</option>
								<option value="email">Email</option>
								<option value="ip">IP</option>
							</select></td>
							<td><input type="submit" class="login_button" value="Search"></td>
							<td align="right"><a href="index.php">List all members</a></td>
						</tr>
					</table>
				</form>
			<?php
			if(isset($_GET['search'])) {
				$search = $_GET['search'];
				if(isset($_GET['q'])) {
					$q = $_GET['q'];
					if($search == 'username') {
						$sql = mysql_query("SELECT * FROM users WHERE username LIKE '%".$q."%'"); 
						while($row=mysql_fetch_array($sql)) {
							$username = $row['username'];
							$password = $row['password'];
							$ip = $row['ip'];
							$email = $row['email'];
							echo '
							<div id="recenttp">
							<a href="#"><h4>'.$username.'</h4></a>
							<span>IP: '.$ip.'<br>';
							$sql91 = mysql_query("SELECT * FROM userban WHERE username='$username' LIMIT 1");
							$a = 0;
							while($row = mysql_fetch_array($sql91)) {
								echo '<a href="../process.php?table=ban&action=unbanuser&username='.$username.'">Unban User</a>';
								$a = 1;
							}
							if ($a == 0) {
								echo '<a href="../process.php?table=ban&action=userban&username='.$username.'">User Ban</a>';
							}
							echo ' | ';
							$sql34 = mysql_query("SELECT * FROM ipban WHERE ip='$ip' LIMIT 1");
							$b = 0;
							while($row = mysql_fetch_array($sql34)) {
								echo '<a href="../process.php?table=ban&action=unbanip&username='.$username.'">Unban IP</a>';
								$b = 1;
							}
							if ($b == 0) {
								echo '<a href="../process.php?table=ban&action=ipban&username='.$username.'">IP Ban</a>';
							}			
							echo '</div>
							<ul>
							<table class="admin">
								<tr>
									<td>Username: '.$username.'</td>
									<td>Password: '.$password.'</td>
								</tr>
								<tr>
									<td>Email: '.$email.'</td>
									<td>IP: '.$ip.'</td>
								</tr>
							</table>
							</ul>
							';
						}
						if(mysql_num_rows($sql) == 0) {
							echo '<center><br><br><p style="color:grey;font-size:12px;font-style:italic;">There are no '.$search.' for "'.$q.'".</p></center>';
						}
					} elseif ($search == 'password') {
						$sql = mysql_query("SELECT * FROM users WHERE password LIKE '%".$q."%'"); 
						while($row=mysql_fetch_array($sql)) {
							$username = $row['username'];
							$password = $row['password'];
							$ip = $row['ip'];
							$email = $row['email'];
							echo '
							<div id="recenttp">
							<a href="#"><h4>'.$username.'</h4></a>
							<span>IP: '.$ip.'<br><a href="../process.php?table=ban&action=userban&username='.$username.'">User Ban</a> | <a href="../process.php?table=ban&action=ipban&ip='.$ip.'">IP Ban</a></span>
							</div>
							<ul>
							<table class="admin">
								<tr>
									<td>Username: '.$username.'</td>
									<td>Password: '.$password.'</td>
								</tr>
								<tr>
									<td>Email: '.$email.'</td>
									<td>IP: '.$ip.'</td>
								</tr>
							</table>
							</ul>
							';
						}
						if(mysql_num_rows($sql) == 0) {
							echo '<center><br><br><p style="color:grey;font-size:12px;font-style:italic;">There are no '.$search.' for "'.$q.'".</p></center>';
						}
					} elseif ($search == 'email') {
						$sql = mysql_query("SELECT * FROM users WHERE email LIKE '%".$q."%'"); 
						while($row=mysql_fetch_array($sql)) {
							$username = $row['username'];
							$password = $row['password'];
							$ip = $row['ip'];
							$email = $row['email'];
							echo '
							<div id="recenttp">
							<a href="#"><h4>'.$username.'</h4></a>
							<span>IP: '.$ip.'<br><a href="../process.php?table=ban&action=userban&username='.$username.'">User Ban</a> | <a href="../process.php?table=ban&action=ipban&ip='.$ip.'">IP Ban</a></span>
							</div>
							<ul>
							<table class="admin">
								<tr>
									<td>Username: '.$username.'</td>
									<td>Password: '.$password.'</td>
								</tr>
								<tr>
									<td>Email: '.$email.'</td>
									<td>IP: '.$ip.'</td>
								</tr>
							</table>
							</ul>
							';
						}
						if(mysql_num_rows($sql) == 0) {
							echo '<center><br><br><p style="color:grey;font-size:12px;font-style:italic;">There are no '.$search.' for "'.$q.'".</p></center>';
						}
					} elseif ($search == 'ip') {
						$sql = mysql_query("SELECT * FROM users WHERE ip LIKE '%".$q."%'"); 
						while($row=mysql_fetch_array($sql)) {
							$username = $row['username'];
							$password = $row['password'];
							$ip = $row['ip'];
							$email = $row['email'];
							echo '
							<div id="recenttp">
							<a href="#"><h4>'.$username.'</h4></a>
							<span>IP: '.$ip.'<br><a href="../process.php?table=ban&action=userban&username='.$username.'">User Ban</a> | <a href="../process.php?table=ban&action=ipban&ip='.$ip.'">IP Ban</a></span>
							</div>
							<ul>
							<table class="admin">
								<tr>
									<td>Username: '.$username.'</td>
									<td>Password: '.$password.'</td>
								</tr>
								<tr>
									<td>Email: '.$email.'</td>
									<td>IP: '.$ip.'</td>
								</tr>
							</table>
							</ul>
							';
						}
						if(mysql_num_rows($sql) == 0) {
							echo '<center><br><br><p style="color:grey;font-size:12px;font-style:italic;">There are no '.$search.' for "'.$q.'".</p></center>';
						}
					}
				}
			} else {
			$sql = mysql_query("SELECT * FROM users ORDER BY id DESC");
			while($row=mysql_fetch_array($sql)) {
				$username = $row['username'];
				$password = $row['password'];
				$ip = $row['ip'];
				$email = $row['email'];
				echo '
				<div id="recenttp">
				<a href="#"><h4>'.$username.'</h4></a>
				<span>IP: '.$ip.'<br><a href="../process.php?table=ban&action=userban&username='.$username.'">User Ban</a> | <a href="../process.php?table=ban&action=ipban&ip='.$ip.'">IP Ban</a></span>
				</div>
				<ul>
				<table class="admin">
					<tr>
						<td>Username: '.$username.'</td>
						<td>Password: '.$password.'</td>
					</tr>
					<tr>
						<td>Email: '.$email.'</td>
						<td>IP: '.$ip.'</td>
					</tr>
				</table>
				</ul>
				';
			}
			}
			?>
			</div>
		</div>
	</div>
	<div id="footer">
	Website Name &copy; 2012
		<div id="nav">
		<a href="../../index.php">Home</a> | <a href="../../terms.php">Terms of Use</a> | <a href="../../about/our_team.php">Our Team</a> | <a href="../../about/this_website.php">About This Website</a> | <a href="../../request.php">Request a Tutorial</a> | <a href="../../contact.php">Contact</a>
		</div>
	</div>
</div>
</body>
</html>	