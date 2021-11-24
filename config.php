<?php
session_start();
if(!empty($_POST["login"])) {
    $conn = mysqli_connect("localhost", "root", "", "webphp");
    $sql = "Select * from users where email = '" . $_POST["email"] . "'";
        if(!isset($_COOKIE["member_login"])) {
            $sql .= " AND password = '" . md5($_POST["password"]) . "'";
    }
        $result = mysqli_query($conn,$sql);
    $user = mysqli_fetch_array($result);
    if($user) {
            $_SESSION["id"] = $user["id"];
            
            if(!empty($_POST["remember"])) {
                setcookie ("member_login",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
            } else {
                if(isset($_COOKIE["member_login"])) {
                    setcookie ("member_login","");
                }
            }
    } else {
        $message = "Invalid Login";
    }
}
?>