<?php require_once __DIR__. '/autoload/autoload.php';
  $data = $db->fetchID("hocsinh",$_SESSION['hocsinh_id']);

  $data2 =
        [
            "name" => postInput('name'),
            "address" => postInput("address"),
            "email" => postInput('email'),
            "phone" => postInput('phone'),
            "password" => postInput('password'),
            "thundar" => postInput('thundar'),
             "sex" => postInput('sex'),
              "born" => postInput('born'),

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
        if(postInput('phone') == '')
        {
            $error['phone'] = "Mời nhập số điện thoại";
        }
        if(postInput('sex') == '')
        {
            $error['sex'] = "Mời nhập giới tính";
        }
        if(postInput('born') == '')
        {
            $error['born'] = "Mời nhập ngày sinh";
        }
        if(postInput('password') == '')
        {
            $error['password'] = "Mật khẩu không được để trống";
        }

        if(postInput('oldpassword') == '')
        {
            $error['oldpassword'] = "Mời nhập lại mật khẩu cũ";
        }

       
                
        if(empty($error))
        {     
            $isset = $db->fetchOne("hocsinh","email = '".$data2['email']."' AND password = '".MD5(postInput('oldpassword'))."' ");
            if($isset > 0)
            {
                if($data2['password'] != MD5(postInput('oldpassword')))
                    {
                        $data2['password'] = MD5(postInput('password'));
                    }
                $id_update = $db->update("hocsinh",$data2,array("email" => $data2['email']));
                if($id_update>0)
                {
                    header("location: thong-tin.php");
                }
                else
                {
                    $_SESSION['error'] = "Thông tin không đổi!";
                    header("location: thong-tin.php");
                   // redirectAdmin("admin");
                }
            }
            else
            {
                $error['oldpassword'] = "Sai mật khẩu!!!";
            }
        }
    }
 ?>
 <title>Sửa thông tin</title>
<div class="container well tren">
 <div class="col-md-12 bor">
   <div class="box-main1">
        <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"> Sửa thông tin </a> </h3>

        <form action="" method="POST" style="margin-top: 30px">
          <div class="col-sm-6">
              <div class="form-group row">
                  <label class="col-sm-4 text-right" style="margin-top: 10px">Tên</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" value="<?php echo $data['name'] ?>">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-sm-4 text-right" style="margin-top: 10px">Email</label>
                  <div class="col-sm-8">
                    <input type="email" readonly="" class="form-control" name="email"value="<?php echo $data['email'] ?>">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-4 text-right" style="margin-top: 10px">Giới tính</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="sex" value="<?php echo $data['sex'] ?>" maxlength="3">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-4 text-right" style="margin-top: 10px">Ngày sinh</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" name="born" value="<?php echo $data['born'] ?>">
                  </div>
              </div>
              

              <div class="form-group row">
                  <label class="col-sm-4 text-right" style="margin-top: 10px">Số điện thoại</label>
                  <div class="col-sm-8">
                    <input type="tel" class="form-control" name="phone" value="<?php echo $data['phone'] ?>">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-sm-4 text-right" style="margin-top: 10px">Địa chỉ</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="address" value="<?php echo $data['address'] ?>">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-4 text-right" style="margin-top: 10px">Mật khẩu</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="password" value="<?php echo $data['password'] ?>">
                  </div>
              </div>
                <div class="form-group row">
                    <label class="col-sm-4 text-right" style="margin-top: 10px">Nhập mật khẩu cũ</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" name="oldpassword" value="">
                    <?php if (isset($error['oldpassword'])): ?>
                    <br><p class="text-danger"><?php echo $error['oldpassword'] ?></p>
                    <?php endif ?>
                    </div>
                </div>

              <div class="form-group text-center">
                  <div class="col-md-12 container-fluid">
                    <button type="submit" class="btn btn-success" style="margin-left: 180px;">Lưu</button> 
                  </div>
              </div>
          </div>
            <div class="form-group">
              <div class="col-sm-offset-7 container-fluid">
               <input type="file" name="thundar" value="<?php echo uploads() ?>product/<?php echo $data['thundar'] ?>">
              </div>
            </div>
        </form>
        
       
    </div>

</div>
</div>

