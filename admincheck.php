<?php
if($ok == 0) {
	header("Location: http://codeadict.net46.net/error/error404.php");
} else {
	$sql = mysql_query("SELECT * FROM users WHERE username='$myusername' AND admin=0");
	if(mysql_num_rows($sql) != 0) {
		header("Location: http://codeadict.net46.net/error/error404.php");
	}
}
?>