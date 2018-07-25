<?php
session_start();
include('config.php');

mysql_connect($mysql_host,$mysql_user,$mysql_pass);
mysql_select_db($mysql_data);
$ok = 0;
if(isset($_SESSION['username']) || isset($_SESSION['password'])) {
	$ok = 1;
}

?>