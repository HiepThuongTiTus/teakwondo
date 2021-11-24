<?php
    require_once __DIR__. '/../../autoload/autoload.php';

    if($_SESSION['admin_lv'] == 1)
    {
        $_SESSION['error'] = "Bạn không có quyền thay đổi thông tin này!";
        redirectAdmin("banner");
    }

   

    $id = intval(getInput('id'));

    $Editbanner = $db->fetchID("banner",$id);
    if( empty($Editbanner))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("banner");
    }

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data =
        [
            "name" => postInput('name'),          
       
            "top" => postInput('top'),
            "down" => postInput('down')     
        ];
       
        
        $error = [];
        if(postInput('name') == '')
        {
            $error['name'] = "Mời nhập đầy đủ tên";
        }
    
        if(postInput('top') == '')
        {
            $error['top'] = "Mời nhập giá nội dung 1";
        }
        if(postInput('down') == '')
        {
            $error['down'] = "Mời nhập giá nội dung 2";
        }
        //dang nhap thanh cong
        
        if(empty($error))
        {
           
                    $file_name = $_FILES['thundar']['name'];
                    $file_tmp = $_FILES['thundar']['tmp_name'];
                    $file_type = $_FILES['thundar']['type'];
                    $file_error = $_FILES['thundar']['error'];

                    if($file_error == 0)
                    {
                        $part = ROOT . "banner/";
                        $data['thundar'] = $file_name;
                    }
                

            $isset = $db->fetchOne("banner","name = '".$data['name']."' ");
            if(count($isset) > 0 && $Editbanner['name'] != $data['name'])
            {
                $_SESSION['error'] = "Tên sản phẩm đã tồn tại!";
            }
            else
            {

                $id_update = $db->update("banner",$data,array("id" => $id));
                                if($id_update>0 || $id_update2>0)
                {
                    move_uploaded_file($file_tmp, $part.$file_name);
                    $_SESSION['success'] = "Cập nhật thành công!";
                    redirectAdmin("banner");
                }
                else
                {
                    $_SESSION['error'] = "Dữ liệu không đổi!";
                    redirectAdmin("banner");
                }
            }
        }
    }

?>
<?php require_once __DIR__. '/../../layouts/header.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Sửa thông tin admin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Admin</li>
                        </ol>

                        <div class="clearfix"></div>
                            <?php if(isset($_SESSION['error'])) :?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
                                </div>
                            <?php endif; ?>

                        <div class="card mb-4">

                            <form action="" method="POST" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label for="input1" class="col-sm-2 text-right">Sản phẩm</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="input1" name="name" placeholder="Sản phẩm ..." value="<?php echo $Editbanner['name'] ?>">
                                      <?php if (isset($error['name'])): ?>
                                            <p class="text-danger"> <?php echo $error['name']; ?> </p>
                                      <?php endif ?>
                                    </div>
                                </div>

                                

                                 <div class="form-group row">
                                    <label for="input2" class="col-sm-2 text-right">Nội dung 1</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="input2" name="top" placeholder="Nội dung 1 ...." value="<?php echo $Editbanner['top'] ?>">
                                      <?php if (isset($error['top'])): ?>
                                            <p class="text-danger"> <?php echo $error['top']; ?> </p>
                                      <?php endif ?>
                                     </div>
                                 </div>

                                 <div class="form-group row">
                                    <label for="input2" class="col-sm-2 text-right">Nội dung 2</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="input2" name="down" placeholder="Nội dung 2 ...." value="<?php echo $Editbanner['down'] ?>">
                                      <?php if (isset($error['down'])): ?>
                                            <p class="text-danger"> <?php echo $error['down']; ?> </p>
                                      <?php endif ?>
                                     </div>
                                 </div>
                                   <div class="form-group row">
                                    <label for="input4" class="col-sm-2 text-right">Hình ảnh</label>
                                    <div class="col-sm-3">
                                      <input type="file" class="form-control" id="input4" name="thundar" value="">
                                      <img src="<?php echo uploads(); ?>product/<?php echo $Editbanner['thundar'] ?>" width="50px" height="50px">
                                      <?php if (isset($error['thundar'])): ?>
                                            <p class="text-danger"> <?php echo $error['thundar']; ?> </p>
                                      <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-8 container-fluid">
                                      <button type="submit" class="btn btn-success">Lưu</button>
                                    </div>
                                </div>
                            </form>
                        </div>
<?php require_once __DIR__. '/../../layouts/footer.php'; ?>

