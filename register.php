﻿<?php
require_once('logincheck.php');
require_once('bancheck.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>
<title>Register - CodeAdict</title>

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
			<?php
			if ($ok == 0) {
				if(isset($_POST['username']) || isset($_POST['password']) || isset($_POST['repassword']) || isset($_POST['email']) || isset($_POST['verify'])) {
					$username = $_POST['username'];
					$password = $_POST['password'];
					$repassword = $_POST['repassword'];
					$email = $_POST['email'];
					$answer = $_POST['answer'];
					$verify = $_POST['verify'];
					$at = '@';
					$searchemail = strpos($email, $at); 
					if ($answer == $verify) {
						if($username != "") {
							if($password != "") {
								if($repassword != "") {
									if ($email != "") {
										if($searchemail != 0) {
											if($password != $repassword) {
						$num1 = rand(0,50);
						$num2 = rand(0,10);
						$answer = $num1 + $num2;
												echo '<a href="register.php"><h3>Register</h3></a><hr><span class="error">The password did not patch.</span>
			<form action="register.php" method="post">
			<center><table width="400px" cellpadding="5">
				<tr>
					<td>Username</td>
					<td><input type="text" class="login_text" name="username" maxlength="15"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" class="login_text" name="password"></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="password" class="login_text" name="repassword"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" class="login_text" name="email"></td>
				</tr>
				
				<tr>
					<td width="200">Verify yourself ('.$num1.' + '.$num2.')</td>
					<td><input type="text" class="login_text" name="verify"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="login_button" value="Register"></td>
				</tr>
				<input type="hidden" name="answer" value="'.$answer.'">
			</table></center>
			</form>';
											} else {
										$sec1 = mysql_query("SELECT * FROM users WHERE username='$username'");
										if(mysql_num_rows($sec1) == 0) {
											$sec2 = mysql_query("SELECT * FROM users WHERE email='$email'");
											$ip = $_SERVER['REMOTE_ADDR'];
											if (mysql_num_rows($sec2) == 0) {
												mysql_query("INSERT INTO users (username, password, email, ip) VALUES ('$username', '$password', '$email', '$ip')");
												echo '<a href="register.php"><h3>Register</h3></a><hr><span class="message">You have been successfully registered. You may now log in.';
											} else {
						$num1 = rand(0,50);
						$num2 = rand(0,10);
						$answer = $num1 + $num2;
												echo '<a href="register.php"><h3>Register</h3></a><hr><span class="error">The email you\'ve entered has been already used by the other registered members.</span>
			<form action="register.php" method="post">
			<center><table width="400px" cellpadding="5">
				<tr>
					<td>Username</td>
					<td><input type="text" class="login_text" name="username" maxlength="15"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" class="login_text" name="password"></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="password" class="login_text" name="repassword"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" class="login_text" name="email"></td>
				</tr>
				
				<tr>
					<td width="200">Verify yourself ('.$num1.' + '.$num2.')</td>
					<td><input type="text" class="login_text" name="verify"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="login_button" value="Register"></td>
				</tr>
				<input type="hidden" name="answer" value="'.$answer.'">
			</table></center>
			</form>';
											}
										} else {
						$num1 = rand(0,50);
						$num2 = rand(0,10);
						$answer = $num1 + $num2;
											echo '<a href="register.php"><h3>Register</h3></a><hr><span class="error">The username you\'ve entered has been already used by the other registered members</span>
			<form action="register.php" method="post">
			<center><table width="400px" cellpadding="5">
				<tr>
					<td>Username</td>
					<td><input type="text" class="login_text" name="username" maxlength="15"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" class="login_text" name="password"></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="password" class="login_text" name="repassword"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" class="login_text" name="email"></td>
				</tr>
				
				<tr>
					<td width="200">Verify yourself ('.$num1.' + '.$num2.')</td>
					<td><input type="text" class="login_text" name="verify"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="login_button" value="Register"></td>
				</tr>
				<input type="hidden" name="answer" value="'.$answer.'">
			</table></center>
			</form>';
										}
									}
								} else {
						$num1 = rand(0,50);
						$num2 = rand(0,10);
						$answer = $num1 + $num2;
									echo '<a href="register.php"><h3>Register</h3></a><hr><span class="error">Invalid email.</span>
			<form action="register.php" method="post">
			<center><table width="400px" cellpadding="5">
				<tr>
					<td>Username</td>
					<td><input type="text" class="login_text" name="username" maxlength="15"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" class="login_text" name="password"></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="password" class="login_text" name="repassword"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" class="login_text" name="email"></td>
				</tr>
				
				<tr>
					<td width="200">Verify yourself ('.$num1.' + '.$num2.')</td>
					<td><input type="text" class="login_text" name="verify"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="login_button" value="Register"></td>
				</tr>
				<input type="hidden" name="answer" value="'.$answer.'">
			</table></center>
			</form>';
								}
									}
								}
							}
						} else {
						$num1 = rand(0,50);
						$num2 = rand(0,10);
						$answer = $num1 + $num2;
							echo '<a href="register.php"><h3>Register</h3></a><hr><span class="error">Please fill up the form correctly.</span>
			<form action="register.php" method="post">
			<center><table width="400px" cellpadding="5">
				<tr>
					<td>Username</td>
					<td><input type="text" class="login_text" name="username" maxlength="15"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" class="login_text" name="password"></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="password" class="login_text" name="repassword"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" class="login_text" name="email"></td>
				</tr>
				
				<tr>
					<td width="200">Verify yourself ('.$num1.' + '.$num2.')</td>
					<td><input type="text" class="login_text" name="verify"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="login_button" value="Register"></td>
				</tr>
				<input type="hidden" name="answer" value="'.$answer.'">
			</table></center>
			</form>';
						}
					} else {
						$num1 = rand(0,50);
						$num2 = rand(0,10);
						$answer = $num1 + $num2;
						echo '<a href="register.php"><h3>Register</h3></a><hr><span class="error">Verification code incorrect.</span>
			<form action="register.php" method="post">
			<center><table width="400px" cellpadding="5">
				<tr>
					<td>Username</td>
					<td><input type="text" class="login_text" name="username" maxlength="15"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" class="login_text" name="password"></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="password" class="login_text" name="repassword"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" class="login_text" name="email"></td>
				</tr>
				
				<tr>
					<td width="200">Verify yourself ('.$num1.' + '.$num2.')</td>
					<td><input type="text" class="login_text" name="verify"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="login_button" value="Register"></td>
				</tr>
				<input type="hidden" name="answer" value="'.$answer.'">
			</table></center>
			</form>';
					}
				} else {
					$num1 = rand(0,50);
					$num2 = rand(0,10);
					$answer = $num1 + $num2;
					echo '<a href="register.php"><h3>Register</h3></a><hr><span class="message">Please fill up the form below.</span>
			<form action="register.php" method="post">
			<center><table width="400px" cellpadding="5">
				<tr>
					<td>Username</td>
					<td><input type="text" class="login_text" name="username" maxlength="15"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" class="login_text" name="password"></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="password" class="login_text" name="repassword"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" class="login_text" name="email"></td>
				</tr>
				
				<tr>
					<td width="200">Verify yourself ('.$num1.' + '.$num2.')</td>
					<td><input type="text" class="login_text" name="verify"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="login_button" value="Register"></td>
				</tr>
				<input type="hidden" name="answer" value="'.$answer.'">
			</table></center>
			</form>';
				}
			} else {
				header("Location: index.php");
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