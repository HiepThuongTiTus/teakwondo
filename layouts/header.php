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
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>FAST FOOD</title>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/chitietsanpham.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/bootstrap.min.css">
        <!-- Jquery -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script  src="<?php echo base_url() ?>public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="<?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css">
        <!-- owl carousel libraries -->
        <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/lib/owlcarousel/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/lib/owlcarousel/owl.theme.default.min.css">
        <script src="<?php echo base_url() ?>public/frontend/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <script type="text/javascript" src="<?php echo base_url() ?>public/frontend/js/navmenu.js"></script>
    </head>
    <body>
        <section class="nav-title">
            <div class="item1">
                <a style="background-color: black;border-radius: 20px;color: white;font-size: 15px;">FAST FOOD</a>
            </div>
            
            <div class="item t1" style="margin-top: 2px;font-weight: bold;">
                <?php if (isset($_SESSION['name_user'])): ?>   
                            Xin chào : <?php echo $_SESSION['name_user'] ?>
            </div>
        </section>
        <section class="topnav" id="myTopnav">

            <div class="container">
                <a href="index.php"><img src="<?php echo base_url() ?>public/uploads/product/logo3.jpg" alt="" width="30" height=""></a>
                <a href="index.php"></a>
                <a href="index.php">TRANG CHỦ</a>
                <a href="gioithieu.php">GIỚI THIỆU</a>
                <a href="dienthoai.php">THỰC ĐƠN</a>
                
                <a href="ls-mua-hang.php">LS MUA</a>
                <a href="feedback.php">PHẢN HỒI</a>
                <div class="dropdown">
                    <button class="dropbtn">TÀI KHOẢN
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content"> 
                        
                            
                        <a href="thong-tin.php"><i class="fa fa-info"></i> Thông tin</a>
                        <a href="tt.php"><i class="fa fa-remove"></i>Trang Thái</a>
                        <a href="giohang.php"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a>
                        <a href="dang-xuat.php"><i class="fa fa-sign-out"></i>Thoát</a>

                <?php else: ?>

        <div class="topnav" id="myTopnav">
                    <a href="index.php"><img src="<?php echo base_url() ?>public/uploads/product/logo3.jpg" alt="" width="30" height=""></a>
                <a href="index.php"></a>
                <a href="index.php">TRANG CHỦ</a>
                <a href="gioithieu.php">GIỚI THIỆU</a>
                <a href="dienthoai.php">THỰC ĐƠN</a>
                
                <div class="dropdown">
                    <button class="dropbtn">TÀI KHOẢN
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content"> 
                        <a href="dang-ki.php"><i class="fa fa-user" style="color:#fff;"></i> Đăng kí</a>
                        <a href="dang-nhap.php?path=<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] ?>"><i class="fa fa-unlock" style="color:#fff;"></i> Đăng nhập</a>
                    
                     <?php endif ?>

                        </div></div>
                <a class="search1" href="javascript:void(0);">
                    <form class="form-inline">
                        <input type="text" name="keywork" placeholder=" Tìm kiếm" class="form-control">
                        <button type="submit" href="#" class="btn btn-default ban1"><i class="fa fa-search"></i></button>
                        <?php if(isset($_SESSION['error_s'])) :?>
                        {
                        echo "<script>alert('<?php echo $_SESSION['error_s'];unset($_SESSION['error_s']); ?>');location.href='index.php'</script>";
                        }                
                        <?php endif; ?>
                    </form>
                </a>
                </div>
            </div>
        </div>
    </div>
    
            </div>
        </section>

        <!--ENDMENUNAV-->   