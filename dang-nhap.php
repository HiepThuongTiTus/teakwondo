<?php
    require_once __DIR__. '/autoload/autoload.php';
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

            $isset = $db->fetchOne("users","email = '".$data['email']."' AND password = '".$data['password']."' ");
            if($isset > 0)
            {
                $path = getInput("path");
                $_SESSION['name_user'] = $isset['name'];
                $_SESSION['name_id'] = $isset['id'];
                echo "<script>alert('Đăng nhập thành công'); location.href='index.php'</script>";
            }
            else
            {
                 echo "<script>alert('Sai Email hoặc mật khẩu !!! Vui lòng thử lại !!!'); location.href='dang-nhap.php'</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Đăng nhập</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="login/css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="login/css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Snippet" rel="stylesheet"><!--online fonts-->
<!-- //web-fonts -->
</head>
<body>
<div data-vide-bg="video/keyboard">
    <div class="main-container">
        <!--header-->
        <div class="header-w3l">
            <h1>Đăng nhập</h1>
        </div>
        <!--//header-->
        <!--main-->
        <div class="main-content-agile">
            <?php if(isset($_SESSION['success'])) :?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['success'];unset($_SESSION['success']); ?>
                </div>
            <?php endif; ?>

            <?php if(isset($_SESSION['error'])) :?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>
            
            <div class="sub-main-w3ls"> 
                <form action="#" method="POST">
                    <input placeholder="Email" name="email" type="email" required="">
                    
                    <input  placeholder="Mật khẩu" name="password" type="password" required="">
                    
                    <div class="checkbox-w3">
                        <span class="check-w3"><input type="checkbox" />Remember Me</span>
                        <a href="forgot.php">Forgot Password?</a>
                        <div class="clear"></div>
                    </div>
                    <div class="checkbox-w4">
                        <span class="check-w4">Nếu chưa có tài khoản ,nhấn vào <a style="color: lightblue;" href="dang-ki.php">đây</a> để đăng ký !!!</span>
                    </div>
                    <div class="social-icons" style="margin-top: 60px;"> 
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li> 
                            </ul>  
                        </div>
                    <input type="submit" value="">
                </form>
            </div>
        </div>
        <!--//main-->
        <!--footer-->
        
        <!--//footer-->
    </div>
</div>
<!-- js -->
<script type="text/javascript" src="login/js/jquery-2.1.4.min.js"></script><!--common-js-->
<script src="login/js/jquery.vide.min.js"></script><!--video-js-->
<!-- //js -->
</body>
</html>