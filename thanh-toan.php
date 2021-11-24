<?php 
    require_once __DIR__. '/autoload/autoload.php';
    if(!isset($_SESSION['name_id']))
    {
        $_SESSION['error']="Vui lòng đăng nhập để thanh toán";
        header("location:dang-nhap.php?path=".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
    }

    $user = $db->fetchID('users',$_SESSION['name_id']);


    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data =
        [
            "users_id" => $_SESSION['name_id'],
            "address" => postInput("address"),
            "name" => postInput('name'),
            "phone" => postInput('phone'),
            "amount" => $_SESSION['total']
        ];
        $error = [];
        if(postInput('name') == '')
        {
            $error['name'] = "Bạn chưa nhập tên người nhận";
        }
        if(postInput('address') == '')
        {
            $error['address'] = "Bạn chưa nhập địa chỉ";
        }
        if(postInput('phone') == '')
        {
            $error['phone'] = "Bạn chưa nhập số điện thoại";
        }
        if(empty($error))
        {
            $insert = $db->insert("transaction",$data);
            if($insert>0)
                {
                    $_SESSION['success'] = "Đặt hàng thành công! Bạn sẽ nhận được hàng trong vòng 4-6 ngày !!!";
                     echo "<script>location.href='index.php'</script>";
                    foreach ($_SESSION['cart'] as $item) {
                        $data2 =
                        [
                            'transaction_id' => $insert,
                            'product_id' => $item['id'],
                            'qty' => $item['qty'],
                            'price' => $item['price']
                        ];
                    $insert2 = $db->insert("orders",$data2);
                    }
                    unset($_SESSION['cart']);
                     unset($_SESSION['amount']);
                    header("location: thong-bao.php");
                }
                else
                {
                    $_SESSION['error'] = "Đặt hàng thất bại!";
                   // redirectAdmin("admin");
                }
        }
    }

 ?>
<?php require_once __DIR__. '/layouts/header-.php'; ?>

 <div class="">
     <div class="box-main1">
        <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"> Đặt hàng </a> </h3>

        <form action="" method="POST" style="margin-top: 30px">
            <div class="form-group row">
                <label class="col-sm-2 text-right" style="margin-top: 10px">Tên người nhận</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="name" value="<?php echo $user['name'] ?>">
                   <?php if (isset($error['name'])): ?>
                    <br><p class="text-danger">Tên không được để trống!!!</p>
                <?php endif ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 text-right" style="margin-top: 10px">Số điện thoại</label>
                <div class="col-sm-8">
                  <input type="tel" class="form-control" name="phone"value="<?php echo $user['phone'] ?>">
                   <?php if (isset($error['name'])): ?>
                    <br><p class="text-danger">Tên không được để trống!!!</p>
                <?php endif ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 text-right" style="margin-top: 10px">Địa chỉ</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="address" value="<?php echo $user['address'] ?>">
                   <?php if (isset($error['name'])): ?>
                    <br><p class="text-danger">Tên không được để trống!!!</p>
                <?php endif ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 text-right" style="margin-top: 10px">Tổng số tiền</label>
                <div class="col-sm-8">
                  <input type="text" readonly="" class="form-control" name="amount" value="<?php echo formatPrice($_SESSION['total']) ?> đ">
             
                </div>
            </div>


            <div class="form-group row" style="text-align: center">
               
                <input type='submit' value='Xác nhận' class="button">
                <button class="button" ><a href="inhoadon.php" style="text-decoration: none; color: #fff;" target="_blank">In hóa đơn</a></button>
           
            </div>
        </form>
        
       
    </div>

</div>
<style>
     .button {
    width: 140px;
    height: 45px;
    font-family: 'Roboto', sans-serif;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 2.5px;
    font-weight: 500;
    color: #fff;
    background-color: black;
    border-color: white;
    border-width: 1px;
    border: none;
    border-radius: 45px;
    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease 0s;
    cursor: pointer;
    outline: none;
    }
    .button:hover {
    background-color: gray;
    box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
    color: #fff;
    transform: translateY(-7px);
    }
</style>

<?php require_once __DIR__. '/layouts/footer-.php'; ?>