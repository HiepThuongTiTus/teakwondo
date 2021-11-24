<?php
    require_once __DIR__. '/../../autoload/autoload.php';

    $category = $db->fetchsql("SELECT * FROM category WHERE level=0");

    $id = intval(getInput('id'));

    $Editlophoc = $db->fetchID("lophoc",$id);

    if( empty($Editlophoc))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        returnGV("");
    }

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data =
        [
            "name" => postInput('name'),
            "thoigian" => postInput('thoigian'), 
            "category_id" => postInput('category_id'),  
            "content" => postInput('content')
        ];
       
        
        $error = [];
        if(postInput('name') == '')
        {
            $error['name'] = "Mời nhập đầy đủ tên giáo viên";
        }
         if(postInput('category_id') == '')
        {
            $error['category_id'] = "Mời chọn tên danh mục";
        }
         if(postInput('content') == '')
        {
            $error['content'] = "Mời nhập tên lớp học";
        }
        if(postInput('thoigian') == '')
        {
            $error['thoigian'] = "Mời nhập thời gian";
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
                        $part = ROOT . "lophoc/";
                        $data['thundar'] = $file_name;
                    }
                

            $isset = $db->fetchOne("lophoc","name = '".$data['name']."' ");
            if(count($isset) > 0 && $Editlophoc['name'] != $data['name'])
            {
                $_SESSION['error'] = "Tên sản phẩm đã tồn tại!";
            }
            else
            {

                $id_update = $db->update("lophoc",$data,array("id" => $id));
              
                if($id_update>0 )
                {
                    move_uploaded_file($file_tmp, $part.$file_name);
                    $_SESSION['success'] = "Cập nhật thành công!";
                    returnGV("");
                }
                else
                {
                    $_SESSION['error'] = "Dữ liệu không đổi!";
                    returnGV("");
                }
            }
        }
    }

?>
<?php require_once __DIR__. '/../../layouts/header.php'; ?>
            <div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h1 class="mt-4" style="margin-top: 100px !important;">Thêm lớp học</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/lopdaiden/index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">Lớp học</li>
</ol>


<!--end nav bar -->
<hr>
<div class="container w-50 border border-secondary justify-content-center rounded lophoc bg-secondary" style="width: 90%!important">

    <h2 class="text-center font-weight-bold">Chỉnh sửa lớp học</h2>
    <div class="clearfix"></div>
<?php if(isset($_SESSION['error'])) :?>
<div class="alert alert-danger" role="alert">
    <?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
</div>
<?php endif; ?>

                             <form action="" method="POST" novalidate enctype="multipart/form-data">
        <div class="form-group font-weight-bold">   
                                    <label for="nameclass">Danh mục sp</label>
                                    <div class="col-sm-8">
                                      <select class="form-control" name="category_id"  style="margin-left: -15px;">
                                        <option value="">-Chọn danh mục sản phẩm-</option>
                                        <?php foreach ($category as $item): ?>
                                            <option value="<?php echo $item['id'] ?>" <?php echo $Editlophoc['category_id'] == $item['id'] ? "selected = 'selected'" : "" ?>><?php echo $item['name'] ?></potion>
                                        <?php endforeach ?>
                                      </select>
                                      <?php if (isset($error['category_id'])): ?>
                                            <p class="text-danger"> <?php echo $error['category_id']; ?> </p>
                                      <?php endif ?>
                                     </div>
                                </div>
        <div class="form-group font-weight-bold">
            <label for="nameclass">Tên lớp học:</label>
            <input type="text" class="form-control" id="input1" name="content" value="<?php echo $Editlophoc['content'] ?>">
                                      <?php if (isset($error['content'])): ?>
                                            <p class="text-danger"> <?php echo $error['content']; ?> </p>
                                      <?php endif ?>
        </div>
        <div class="form-group font-weight-bold">
            <label for="room">Địa điểm + Thời gian:</label>
            <input type="text" class="form-control" id="input1" name="thoigian" value="<?php echo $Editlophoc['thoigian'] ?>">
                                      <?php if (isset($error['thoigian'])): ?>
                                            <p class="text-danger"> <?php echo $error['thoigian']; ?> </p>
                                      <?php endif ?>
        </div>
        <div class="form-group font-weight-bold">
            <label for="description">Tên giáo viên giảng dạy</label>
            <input type="text" class="form-control" id="input1" name="name" value="<?php echo $Editlophoc['name'] ?>">
                                      <?php if (isset($error['name'])): ?>
                                            <p class="text-danger"> <?php echo $error['name']; ?> </p>
                                      <?php endif ?>
        </div>
        <div class="form-group">
            <label for="image">Ảnh đại diện:</label>
             <input type="file" class="form-control" id="input4" name="thundar" value="">
                                      <img src="<?php echo uploads(); ?>product/<?php echo $Editlophoc['thundar'] ?>" width="50px" height="50px">
                                      <?php if (isset($error['thundar'])): ?>
                                            <p class="text-danger"> <?php echo $error['thundar']; ?> </p>
                                      <?php endif ?>
        </div>
        <div class="form-group text-center ">
            <a type="reset" class="btn bg-light mr-2 pl-5 pr-5 mb-3" href="<?php echo base_url() ?>/lopdaiden/index.php">Hủy</a>
            <button type="submit" class="btn bg-light pl-5 pr-5 mb-3">Tạo</button>
        </div>
    </form>
                        </div>


