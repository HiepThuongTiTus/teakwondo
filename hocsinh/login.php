<?php 
    session_start();
    require_once __DIR__. '/../libraries/Database.php';
    require_once __DIR__. '/../libraries/Function.php';

    $db = new Database;

    $data = 
    [
        'email' => postInput("email"),
        'password' => postInput("password")
    ];

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        $error = [];
        if(postInput('email') == '')
        {
            $error['email'] = "Email không được để trống!!";
        }

        if(postInput('password') == '')
        {
            $error['password'] = "Mật khẩu không được để trống!!";
        }
        else
        {
            $data['password'] = MD5(postInput('password'));
        }

        //dang nhap thanh cong
        
        if(empty($error))
        {     

            $isset = $db->fetchOne("hocsinh","email = '".$data['email']."' AND password = '".$data['password']."' ");
            if($isset > 0)
            {
                $_SESSION['hocsinh_name'] = $isset['name'];
                $_SESSION['hocsinh_id'] = $isset['id'];
                $_SESSION['hocsinh_lv'] = intval($isset['level']);
                echo "<script>location.href='".base_url()."hocsinh/'</script>";
            }
            else
            {
                $_SESSION['error'] = "Đăng nhập thất bại";
            }
        }
    }
 ?>
<style>
    body
    {
    background:url(/teakwondo/admin/assets/images/4.png);
    background-size: cover; 
    }
</style>
<link rel="stylesheet" type="text/css" href="/teakwondo/admin/assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/teakwondo/admin/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/teakwondo/admin/assets/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/teakwondo/admin/assets/vendor/animate/animate.css">
<!--===============================================================================================-->  
<link rel="stylesheet" type="text/css" href="/teakwondo/admin/assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/teakwondo/admin/assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/teakwondo/admin/assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
<link rel="stylesheet" type="text/css" href="/teakwondo/admin/assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/teakwondo/admin/assets/css/util.css">
<link rel="stylesheet" type="text/css" href="/teakwondo/admin/assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
    <div classa="limiter">
        <div classa="container-login100">
            <div classa="wrap-login100 p-t-85 p-b-20">

                <form classa="login100-form validate-form" style="padding-top:20px"action="" method="POST" enctype="multipart/form-data">
                    <span classa="login100-form-title p-b-70">
                    Admin Page
                    </span>
                    <span classa="login100-form-avatar">
                    <img src="/teakwondo/admin/assets/images/images.png" alt="AVATAR">
                    </span>
                    <div classa="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Vui lòng điền Email">
                        <input classa="input100" type="text" name="email">
                        <span classa="focus-input100" data-placeholder="Email"></span>
                    </div>
                    <div classa="wrap-input100 validate-input m-b-50" data-validate="Vui lòng điền mật khẩu">
                        <input classa="input100" type="password" name="password">
                        <span classa="focus-input100" data-placeholder="Password"></span>
                    </div>
                    <div classa="container-login100-form-btn">
                        <input classa="login100-form-btn" type="submit" name="login" id="login" value="LOGIN">
                        </input>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div id="dropDownSelect1"></div>
    <!--===============================================================================================-->
    <script src="/teakwondo/admin/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="/teakwondo/admin/assets/vendor/animsition/js/animsition.min.js"></script>
    <script src="/teakwondo/admin/assets/vendor/bootstrap/js/popper.js"></script>
    <script src="/teakwondo/admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="/teakwondo/admin/assets/vendor/select2/select2.min.js"></script>
    <script src="/teakwondo/admin/assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="/teakwondo/admin/assets/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="/teakwondo/admin/assets/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="/teakwondo/admin/assets/js/main.js"></script>