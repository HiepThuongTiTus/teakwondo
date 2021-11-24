<?php
    require_once __DIR__. '/autoload/autoload.php';
    if(isset($_SESSION['name_id']))
    {
        echo "<script>location.href='index.php'</script>";
    }
    $data =
        [
            "avatar" =>postInput('avatar'),
            "name" => postInput('name'),
            "address" => postInput("address"),
            "email" => postInput('email'),
            "phone" => postInput('phone'),
            "password" => postInput('password')
        ];

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        $error = [];
        if(postInput('name') == '')
        {
            $error['name'] = "Mời nhập đầy đủ họ tên";
        }
        if(postInput('address') == '')
        {
            $error['address'] = "Mời địa chỉ";
        }
        if(postInput('email') == '')
        {
            $error['email'] = "Email không được để trống!!!";
        }
        if(postInput('phone') == '')
        {
            $error['phone'] = "Mời nhập số điện thoại";
        }

        if(postInput('password') == '')
        {
            $error['password'] = "Mời nhập mật khẩu";
        }
        else
        {
            $data['password'] = MD5(postInput('password'));
        }

        //dang nhap thanh cong
        if(empty($error))
        {     
            $isset = $db->fetchOne("users","email = '".$data['email']."' ");
            if($isset > 0)
            {
                $error['email'] = "Email đã đã tồn tại!";
            }
            else
            {

                $id_insert = $db->insert("users",$data);
                if($id_insert>0)
                {
                    echo "<script>alert('Đăng ký thành công , hãy đăng nhập');location.href='dang-nhap.php'</script>";
                }
                else
                {
                    $_SESSION['error'] = "Đăng kí thất bại!";
                   // redirectAdmin("admin");
                }
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Đăng ký</title>
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
            <h1>Đăng ký</h1>
        </div>
        <!--//header-->
        <!--main-->
        <div class="main-content-agile">
            
            <div class="sub-main-w3ls"> 
                <form action="#" method="post">
                    <input  placeholder="Họ và tên" type="text" name="name" maxlength="20" required="" title="Họ và tên" value="<?php echo $data['name'] ?>">
                        <?php if (isset($error['name'])): ?>
                    <br><p class="text-danger">Tên không được để trống!!!</p>
                        <?php endif ?>
                    <input placeholder="Email" type="email" maxlength="30" name="email"value="<?php echo $data['email'] ?>" title="Email">
                             <?php if (isset($error['email'])): ?>
                    <br><p class="text-danger"><?php echo $error['email'] ?></p>
                             <?php endif ?>
                    <input placeholder="Địa chỉ" type="text" name="address" value="<?php echo $data['address'] ?>" title="Địa chỉ">
                            <?php if (isset($error['address'])): ?>
                    <br><p class="text-danger">Địa chỉ không được để trống!!!</p>
                            <?php endif ?>
                    <input placeholder="Số điện thoại" type="tel" name="phone" value="<?php echo $data['phone'] ?>" title="Số điên thoại">
                            <?php if (isset($error['phone'])): ?>
                    <br><p class="text-danger">Số điện thoại không được để trống!!!</p>
                            <?php endif ?>
                    <input placeholder="Mật khẩu" type="password" maxlength="16" name="password" value="<?php echo $data['password'] ?>" title="Mật khẩu">
                            <?php if (isset($error['password'])): ?>
                    <br><p class="text-danger">Mật khẩu không được để trống!!!</p>
                            <?php endif ?>
                    <div class="checkbox-w4">
                        <span class="check-w4">Nếu đã có tài khoản ,nhấn vào <a style="color: lightblue;" href="dang-nhap.php">đây</a> để đăng nhập !!!</span>
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