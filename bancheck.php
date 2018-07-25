<?php
if($ok == 0) {
	$ip = $_SERVER['REMOTE_ADDR'];
	$sql = mysql_query("SELECT * FROM ipban WHERE ip = '$ip'");
	if (mysql_num_rows($sql) != 0) {
		header("Location: http://codeadict.net46.net/banned.php");
	}
} else {
	$ip = $_SERVER['REMOTE_ADDR'];
	$sql = mysql_query("SELECT * FROM ipban WHERE ip = '$ip'");
	if (mysql_num_rows($sql) != 0) {
		header("Location: http://codeadict.net46.net/banned.php");
		exit;
	}
	$user = $_SESSION['username'];
	$sql = mysql_query("SELECT * FROM userban WHERE username = '$user'");
	if (mysql_num_rows($sql) != 0) {
		header("Location: http://codeadict.net46.net/banned.php");
		exit;
	}
}
?>