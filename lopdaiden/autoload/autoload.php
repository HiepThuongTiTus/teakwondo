<?php 
	session_start();
	require_once __DIR__. '/../../libraries/Database.php';
	require_once __DIR__. '/../../libraries/Function.php';

	$db = new Database;

	if(!isset($_SESSION['giaovien_id']))
	{
		header("location:/teakwondo/lopdaiden/login.php/");
	}

	define ("ROOT", $_SERVER['DOCUMENT_ROOT']."/teakwondo/public/uploads");
	

 ?>