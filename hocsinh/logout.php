<?php 
	session_start();
	unset($_SESSION['hocsinh_name']);
	unset($_SESSION['hocsinh_id']);
	unset($_SESSION['hocsinh_lv']);

	header("location:index.php");
 ?>