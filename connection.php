<?php

define('HOST', '127.0.0.1');
define('USER', 'root');
define('PASS', '');
define('DB', 'webphp');

function open_database() {
	$conn = new mysqli (HOST, USER, PASS, DB);
	// change charset
	$conn->set_charset("utf8");

	if ($conn->connect_error) {
			die('Connect error: ' . $conn->connect_error);
	}
	return $conn;
}

function is_email_exists($email){
	$sql = 'select name from users where email = ?';
	$conn = open_database();

	$stm = $conn->prepare($sql);
	$stm->bind_param('s', $email);
	if (!$stm->execute()){
			die('Query error: ' . $stm->error);
	}

	$result = $stm->get_result();
	if ($result->num_rows > 0){
			return true; // có email
	} else {
			return false;
	}

}
// đăng ký
function register( $password, $name, $email, $phone, $address){
				
	if (is_email_exists($email)){
			return array('code' => 1, 'error' => 'Email exists');
	}

	$hash = password_hash($pass, PASSWORD_DEFAULT);
	$rand = random_int(0, 1000);
	var_dump($rand);
	

	$sql = 'insert into users(name, email, password, phone) values(?,?,?,?)';
	
	$conn = open_database();
	$stm = $conn->prepare($sql);
	$stm->bind_param('sssssss', $name, $email, $hash, $phone, $address);
	
	if (!$stm->execute()){
			return array('code' => 2, 'error' => 'can not execute command');
	}

	return array('code' => 0, 'error' => 'Create users successful');
}

// Đăng nhập
function login($email, $password) {
	$sql = "select * from users where name = ?";
	$conn = open_database();

	$stm = $conn->prepare($sql);
	$stm->bind_param('s', $email);
	if (!$stm->execute()){
			// kết nối sql thất bại
			return array('code' => 1, 'error' => 'Can not execute command!');
	}

	$result = $stm->get_result();
	if ($result->num_rows == 0){
			// không có user tồn tại
			return array('code' => 1, 'error' => 'User does not exists!');
	}

	$data = $result->fetch_assoc();
	// check pass
	$hash = $data['Pass'];
	if (!password_verify($pass, $hash)) {
		return array('code' => 2, 'error' => 'Invalid password');
	}
	else return 
		array('code' => 0, 'error' => '', 'data' => $data);
}


function rand_string($length){
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $size = strlen($chars);
    $str = '';
    for( $i = 0; $i < $length; $i++ ) {

        $str .= $chars[rand(0,$size - 1)];

    }
    return $str;
}
?>


