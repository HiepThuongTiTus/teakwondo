<?php
    require_once __DIR__. '/../../autoload/autoload.php';

    if($_SESSION['admin_lv'] == 1)
    {
        $_SESSION['error'] = "Bạn không có quyền thêm thông tin này!";
        redirectAdmin("logo");
    }

    $data =
        [
            "name" => postInput('name'),          
            "price" => postInput('price')           
        ];
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        $error = [];
        if(postInput('name') == '')
        {
            $error['name'] = "Mời nhập đầy đủ tên";
        }
        
        if(postInput('price') == '')
        {
            $error['price'] = "Mời nhập giá sản phẩm";
        }
        if( ! isset($_FILES['thundar']))
        {
            $error['thundar'] = "Mời nhập hình ảnh";
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
                        $part = ROOT . "logo/";
                        $data['thundar'] = $file_name;
                    }
                

            $isset = $db->fetchOne("logo","name = '".$data['name']."' ");
            if(count($isset) > 0)
            {
                $_SESSION['error'] = "Tên sản phẩm đã tồn tại!";
            }
            else
            {

                $id_insert = $db->insert("logo",$data);
                if($id_insert>0)
                {
                  $data2['id'] = $id_insert;
                   
                    move_uploaded_file($file_tmp, $part.$file_name);
                    $_SESSION['success'] = "Thêm mới thành công!";
                    redirectAdmin("logo");
                }
                else
                {
                    $_SESSION['error'] = "Thêm mới thất bại!";
                    redirectAdmin("logo");
                }
            }
        }
    }

?>
<?php require_once __DIR__. '/../../layouts/header.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Thêm mới sản phẩm</h1>
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
                                    <label for="input1" class="col-sm-2 text-right">Tên sản phẩm</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="input1" name="name" placeholder="Sản phẩm ...." value="<?php echo $data['name'] ?>">
                                      <?php if (isset($error['name'])): ?>
                                            <p class="text-danger"> <?php echo $error['name']; ?> </p>
                                      <?php endif ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input2" class="col-sm-2 text-right">Giá</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="input2" name="price" placeholder="10.000.000" value="<?php echo $data['price'] ?>">
                                      <?php if (isset($error['price'])): ?>
                                            <p class="text-danger"> <?php echo $error['price']; ?> </p>
                                      <?php endif ?>
                                     </div>
                                 </div>

                                <div class="form-group row">                                
                                    <label for="input4" class="col-sm-2 text-right">Hình ảnh</label>
                                    <div class="col-sm-3">
                                      <input type="file" class="form-control" id="input4" name="thundar">
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

