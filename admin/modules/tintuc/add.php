<?php
    require_once __DIR__. '/../../autoload/autoload.php';

    if($_SESSION['admin_lv'] == 1)
    {
        $_SESSION['error'] = "Bạn không có quyền thêm thông tin này!";
        redirectAdmin("tintuc");
    }

     $category = $db->fetchsql("SELECT * FROM category WHERE level=0");

    $data =
        [
            "name" => postInput('name'),
            "slug" => to_slug(postInput("name")),
            "category_id" => postInput('category_id'),
            "price" => postInput('price'),
            "content" => postInput('content')
        ];
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        $error = [];
        if(postInput('name') == '')
        {
            $error['name'] = "Mời nhập đầy đủ tên";
        }
        if(postInput('category_id') == '')
        {
            $error['category_id'] = "Mời chọn tên danh mục";
        }
        if(postInput('content') == '')
        {
            $error['content'] = "Mời nhập nội dung sản phẩm";
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
                        $part = ROOT . "tintuc/";
                        $data['thundar'] = $file_name;
                    }
                

            $isset = $db->fetchOne("tintuc","name = '".$data['name']."' ");
            if(count($isset) > 0)
            {
                $_SESSION['error'] = "Tên tintuc đã tồn tại!";
            }
            else
            {

                $id_insert = $db->insert("tintuc",$data);
                if($id_insert>0)
                {
                  $data2['id'] = $id_insert;
                   
                    move_uploaded_file($file_tmp, $part.$file_name);
                    $_SESSION['success'] = "Thêm mới thành công!";
                    redirectAdmin("tintuc");
                }
                else
                {
                    $_SESSION['error'] = "Thêm mới thất bại!";
                    redirectAdmin("tintuc");
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
                            <li class="breadcrumb-item active">Sản phẩm</li>
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
                                    <label for="input2" class="col-sm-2 text-right">Danh mục</label>
                                    <div class="col-sm-8">
                                      <select class="form-control" name="category_id">
                                        <option value="">-Chọn danh mục sản phẩm-</option>
                                        <?php foreach ($category as $item): ?>
                                            <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></potion>
                                        <?php endforeach ?>
                                      </select>
                                      <?php if (isset($error['category_id'])): ?>
                                            <p class="text-danger"> <?php echo $error['category_id']; ?> </p>
                                      <?php endif ?>
                                     </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input1" class="col-sm-2 text-right">Tên tintuc</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="input1" name="name" value="<?php echo $data['name'] ?>">
                                      <?php if (isset($error['name'])): ?>
                                            <p class="text-danger"> <?php echo $error['name']; ?> </p>
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
                                    <label for="input5" class="col-sm-2 text-right">Nội dung</label>
                                    <div class="col-sm-8">
                                      <textarea class="form-control" name="content" rows="4"></textarea>
                                       <?php if (isset($error['content'])) : ?>
                                        <p class="text-danger"><?php echo $error['content'] ?></p> 
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

