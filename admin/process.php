<?php
require_once('../logincheck.php');
require_once('../admincheck.php');
require_once('../bancheck.php');
date_default_timezone_set('Asia/Manila');
$date = date('YmdHis');
$date_added = date('F d Y - h:i:s A');
$posted_by = $_SESSION['userrecord']['username'];
if(isset($_GET['table'])) {
	$table = $_GET['table'];
	if($table == 'posts') {
		if(isset($_GET['action'])) {
			$action = $_GET['action'];
			if($action == 'new') {
				if(isset($_POST['title']) || isset($_POST['message'])) {
					$title = $_POST['title'];
					$message = $_POST['message'];
					$category = $_POST['category'];
					mysql_query("INSERT INTO posts (title, message, posted_by, date_added, date, category) VALUES ('$title', '$message', '$posted_by', '$date_added', '$date', '$category')");
					header("Location: tutorials/");
				}
			} elseif ($action == 'edit') {
				$id = $_GET['id'];
				$title = $_POST['title'];
				$message = $_POST['message'];
				$category = $_POST['category'];
				mysql_query("UPDATE posts SET title = '$title', message = '$message', category = '$category' WHERE id='$id' LIMIT 1");
				header("Location: tutorials/");
			} elseif ($action == 'delete') {
				$id = $_GET['id'];
				mysql_query("DELETE FROM posts WHERE id='$id'");  
				header("Location: tutorials/");
			}
		}
	} elseif ($table == 'comments') {
		if(isset($_GET['action'])) {
			$action = $_GET['action'];
			if($action == 'new') {
				if(isset($_GET['postid'])) {
					$postid = $_GET['postid'];
					if($_POST['message'] == "") {
						header("Location: ".$_GET['url']);
					} else {
						$message = $_POST['message'];
						mysql_query("INSERT INTO comments (postid, message, posted_by, date_added, date) VALUES ('$postid', '$message', '$posted_by', '$date_added', '$date')");
						header("Location: ".$_GET['url']);
					}
				}
			}
		}
	} elseif ($table == 'testimonials') {
		if(isset($_GET['action'])) {
			$action = $_GET['action'];
			if($action == 'accept') {
				if(isset($_GET['id'])) {
					$id = $_GET['id'];
					mysql_query("UPDATE testimonials SET permission = 1 WHERE id='$id' LIMIT 1");
					header("Location: testimonials/");
				}
			} elseif ($action == 'delete') {
				if(isset($_GET['id'])) {
					$id = $_GET['id'];
					mysql_query("DELETE FROM testimonials WHERE id='$id'");  
					header("Location: testimonials/");
				}
			} elseif ($action == 'new') {
				$message = $_POST['message'];
				$permission = 0;
				mysql_query("INSERT INTO testimonials (posted_by, message, date, date_added, permission) VALUES ('$posted_by', '$message', '$date', '$date_added', '$permission')");
				header("Location: ../testimonials.php");
			}
		}
	} elseif ($table == 'ban') {
		if(isset($_GET['action'])) {
			$action = $_GET['action'];
			if($action == 'ipban') {
				if(isset($_GET['ip'])) {
					$ip = $_GET['ip'];
					$yehey = 'AHHAHA';
					mysql_query("INSERT INTO ipban (ip, really) VALUES ('$ip', '$yehey')");
					header("Location: members/");
				}
			} elseif ($action == 'userban') {
				if(isset($_GET['username'])) {
					$username = $_GET['username'];
					$yehey = 'AHHAHA';
					mysql_query("INSERT INTO userban (username, really) VALUES ('$username', '$yehey')");
					header("Location: members/");
				}
			}
		}
	}
}
?>