<?php 
    require_once __DIR__. '/../autoload/autoload.php';
    $name = getInput('keywork');
    
    if(getInput('keywork') != '')
        {
            $name = to_slug($name);
            $item = $db->fetchOne('product',"slug LIKE '%".$name."%' ");
            if(isset($item) && count($item)>0)
            {
                $cate = $db->fetchOne('category',"id ='".$item['category_id']."'");
                if($cate['level'] == 0)
                {
                header("location:dienthoai.php?the=".$name);
                }
                else
                {
                header("location:phukien.php?the=".$name); 
                }
            }
            else
            {
                $_SESSION['error_s']="Không tìm thấy sản phẩm!";
            }
        }
        if (isset($_POST['btn'])==true) {
            GuiMail();
        }
       function GuiMail(){   
    require "PHPMailer/src/PHPMailer.php"; 
    require "PHPMailer/src/SMTP.php"; 
    require 'PHPMailer/src/Exception.php'; 
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug. khi chạy ngon thì chỉnh lại 0 nhé
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'thongpt109@gmail.com'; // SMTP username
        $mail->Password = 'Litpro123';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom('thongpt109@gmail.com', 'Admin' ); 
        $mail->addAddress($_POST['email'], $_POST['name']); //mail và tên người nhận  
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Tiêu đề thư';
        $noidungthu = 'https://docs.google.com/forms/d/e/1FAIpQLSeW_KS9LeoFe7OtV2_8S1DrzsuKLhk-K2mCkzilVAaF1fhWWw/viewform?usp=sf_link'; 
        $mail->Body = $noidungthu;
        $mail->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        echo "<script>alert('Cảm ơn bạn đã liên hệ, bạn sẽ nhận được thông báo qua Email !!!');location.href='index.php'</script>";
    } catch (Exception $e) {
        echo "<script>alert('Hệ thống đang bảo trì, vui lòng thử lại sau'), $mail->ErrorInfo;location.href='index.php'</script>";
    }
 }//function GuiMail

    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="M_Adnan">
        <title>Hanul Teakwondo</title>
        <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>layouts/rs-plugin/css/settings.css" media="screen" />
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url() ?>layouts/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>layouts/path/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="<?php echo base_url() ?>layouts/css/ionicons.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>layouts/css/main.css" rel="stylesheet">
         <link href="<?php echo base_url() ?>layouts/css/chitietsanpham.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>layouts/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>layouts/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>layouts/css/responsive.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>layouts/css/sweet-alert.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo base_url() ?>ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>layouts/js/sweet-alert.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>layouts/js/app.js"></script>
        <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
        <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
        
        <!-- JavaScripts -->
        <script src="<?php echo base_url() ?>layouts/js/modernizr.js"></script>
        <!-- Online Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- LOADER -->
       <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=242022341197786&autoLogAppEvents=1" nonce="z0aa89us"></script>
        <!-- header -->
        <header>
            <div class="sticky">
                <div class="container">
                    <!-- Logo -->
                    <div class="logo"> <a class="logo-1" href="index.php">Hanul teakwondo</a> </div>
                    <nav class="navbar ownmenu">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar" style="color: #fff;"><i class="fa fa-navicon"></i></span> </button>
                        </div>
                        <!-- NAV -->
                        <div class="collapse navbar-collapse" id="nav-open-btn">
                            <ul class="nav">
                                <li><a href="index.php">Trang chủ</a> </li>
                                <li><a href="#tuthien">Qũy từ thiện</a> </li>
                                <li><a href="#khoahoc">Khóa học</a> </li>
                                <li><a href="#gioithieu">Giới thiệu</a> </li>
                                <li><a href="#dangki">Đăng ký</a></li>
                            </ul>
                        </div>
                        
                    </nav>
                </div>
            </div>
        </header>