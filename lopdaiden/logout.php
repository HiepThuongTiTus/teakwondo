<?php 
	session_start();
	unset($_SESSION['giaovien_name']);
	unset($_SESSION['giaovien_id']);
	unset($_SESSION['giaovien_lv']);

	header("location:index.php");
 ?>