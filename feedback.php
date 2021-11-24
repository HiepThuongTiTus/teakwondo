<?php 
        require_once __DIR__."/autoload/autoload.php";
        $con = mysqli_connect("localhost","root","","webphp");
        $data =
        [
            'name' => postInput("name"),
            'email' => postInput("email"),
            'phone' =>postInput("phone"),
            'address' => postInput("address"),
            'title' => postInput("title"),
            'content' => postInput("content")
            
            
        ];
        $error = [];
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            
            if ($data['name'] == '')
            {
                $error['name'] = "Bạn chưa nhập tên !!! ";
            }

                
            if ($data['email'] == '')
            {
                $error['email'] = "Bạn chưa nhập tên email !!! ";
            }


                if ($data['phone'] == '')
            {
                $error['phone'] = "Bạn chưa nhập số điện thoại !!! ";
            }

             if ($data['title'] == '')
            {
                $error['title'] = "Bạn chưa nhập tiêu đề !!! ";
            }

             if ($data['content'] == '')
            {
                $error['content'] = "Bạn chưa nhập nội dung !!! ";
            }
            

            //kiểm tra mảng error
            if (empty($error)) 
            {
                $idinsert = $db->insert("feedback",$data);
                if ($idinsert > 0 )
                {
                  
                  echo "<script>alert('Cảm ơn bạn đã gửi liên hệ đến chúng tôi.');location.href='index.php'</script>";
                }
                else
                {
                    
                }
            }
        }


?>
<?php require_once __DIR__. "/layouts/header-.php"; ?>

    
    <section class="box-main1 container bor" style="background: #fff;">
        <h3 class="title-main" ><a href=""> Liên hệ  </a> </h3>
        <div id="main-content">
            <h3>Mọi thắc mắc quý khách hàng vui lòng liên hệ số điện thoại +8418008099 để biết thêm thông tin chi tiết.</h3>
        <div>
       	<div class="description">
                <h3> Hoặc lòng điền các yêu cầu vào mẫu dưới đây và gửi cho chúng tôi. Chúng tôi
                sẽ trả lời bạn ngay sau khi nhận được. Xin chân thành cảm ơn!</h3>
            </div>
            <form action="" method="POST">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="contact-feedback">
                        <form ng-submit="sendContact()" class="ng-pristine ng-invalid ng-invalid-required ng-valid-email">

                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input name="name" type="text" placeholder="Họ tên" ng-model="Name" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" required="" value="<?php echo $data['name'] ?>">
                                <?php if (isset($error['name'])): ?>
                        <p class="text-danger"><?php echo $error['name'] ?></p>
                    <?php endif ?>
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-shopping-basket"></i></span>
                                <input name="address" type="text" placeholder="Địa chỉ" ng-model="Address" class="form-control ng-pristine ng-untouched ng-valid" value="<?php echo $data['address'] ?>">
                                <?php if (isset($error['address'])): ?>
                        <p class="text-danger"><?php echo $error['address'] ?></p>
                    <?php endif ?>  
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" name="email" placeholder="Email" ng-model="Email" class="form-control ng-pristine ng-untouched ng-valid-email ng-invalid ng-invalid-required" required=""  value="<?php echo $data['email'] ?>">
                                <?php if (isset($error['email'])): ?>
                        <p class="text-danger"><?php echo $error['email'] ?></p>
                    <?php endif ?>  
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="number" name="phone" min="0" placeholder="Điện thoại" ng-model="Phone" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" required="" value="<?php echo $data['phone'] ?>">
                                <?php if (isset($error['phone'])): ?>
                        <p class="text-danger"><?php echo $error['phone'] ?></p>
                    <?php endif ?>
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                                <input type="text" name="title" placeholder="Tiêu đề" ng-model="Title" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" required="" value="<?php echo $data['title'] ?>">
                                <?php if (isset($error['title'])): ?>
                        <p class="text-danger"><?php echo $error['title'] ?></p>
                    <?php endif ?>
                            </div>
                         <div class="form-group">
                                <textarea type="text" name="content" placeholder="Nội dung" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" rows="3" ng-model="Content" required="" value="<?php echo $data['content'] ?>"></textarea>
                                <?php if (isset($error['content'])): ?>
                        <p class="text-danger"><?php echo $error['content'] ?></p>
                    <?php endif ?>
                            </div>
                            <button style="margin-bottom: 10px;" class="btn btn-success" type="submit">Gửi</button>
                        </form>
                    </div>
                </div>
               
            </div>
       			
       
       </div>
     
        </div>
    </section>
</div>
</form>
<?php require_once __DIR__. "/layouts/footer-.php"; ?>