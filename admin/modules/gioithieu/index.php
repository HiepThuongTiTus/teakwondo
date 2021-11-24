<?php
    require_once __DIR__. '/../../autoload/autoload.php';
    
    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
        if($p == 0)$p = 1;
    }
    else
    {
        $p = 1;
    }
    
    $sql = "SELECT gioithieu.*,category.name as namecate FROM gioithieu LEFT JOIN category on category.id = gioithieu.category_id where category.level = 0";
    $total = count($db->fetchsql($sql));
    
    $gioithieu = $db->fetchJones('gioithieu',$sql,$total,$p,4,true);
    
    if(isset($gioithieu['page']))
    {
        $sotrang = $gioithieu['page'];
        unset($gioithieu['page']);
    }
    if($sotrang < $p)$p = $sotrang;
    
    
    $name = getInput('keywork');
     if(getInput('keywork') != '')
        {
            $name = to_slug($name);
            $item = $db->fetchOne('gioithieu',"slug LIKE '%".$name."%' ");
            if(isset($item) && count($item)>0)
            {
                $cate = $db->fetchOne('category',"id ='".$item['category_id']."'");
                if($cate['level'] == 0)
                {
                header("location:index.php?the=".$name);
                }
                
            }
            else
            {
                $_SESSION['error_s']="Không tìm thấy sản phẩm!";
            }
        }
    
    ?>
<?php require_once __DIR__. '/../../layouts/header.php'; ?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h1 class="mt-4">Danh sách sản phẩm
    <a href="add.php" class="btn btn-success">Thêm mới</a>
</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">Sản phẩm</li>
    <form class="form-inline">
        <div class="form-group">
            <input type="text" name="keywork" placeholder=" Bạn tìm gì ..." class="form-control" style="margin-top: -5px;
                margin-left: 10px;">
            <button type="submit" class="btn btn-default" style="    margin-top: -5px;
                background: #17a2b8;"><i class="fa fa-search"></i></button>
        </div>
        <?php if(isset($_SESSION['error_s'])) :?>
        <div style="color: red;margin-top: -5px;">
            <?php echo $_SESSION['error_s'];unset($_SESSION['error_s']); ?>
        </div>
        <?php endif; ?>
    </form>
</ol>
<div class="card mb-4">
    <div class="clearfix"></div>
    <?php if(isset($_SESSION['success'])) :?>
    <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['success'];unset($_SESSION['success']); ?>
    </div>
    <?php endif; ?>
    <?php if(isset($_SESSION['error'])) :?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
    </div>
    <?php endif; ?>
    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
        <thead>
            <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 5%;">Stt</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 15%;">Name</th>
                <!-- <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 15%;">Slug</th> -->
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 10%;">Danh mục</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 8%;">Thundar</th>
                
                 <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 15%;">Content</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 5%;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt = 1;foreach ($gioithieu as $item): ?>
            <tr>
                <td><?php echo $stt ?></td>
                <td><?php echo $item['name'] ?></td>
                <!-- <td><?php echo $item['slug'] ?></td> -->
                <td><?php echo $item['namecate'] ?></td>
                <td>
                    <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" width="80px" height="80px">
                </td>
                
                <td>
                    <p style="text-overflow: ellipsis;height: 115px;overflow: hidden;"><?php echo $item['content']?></p>
                </td>
                <td>
                    <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"><i class="fa fa-edit"></i>Sửa</a>
                    <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i> Xóa</a>
                </td>
            </tr>
            <?php $stt++; endforeach ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation">
        <ul class="pagination pullright">
            <li class="page-item"><a class="page-link" href="?page=<?php echo --$p ?>">Previous</a></li>
            <?php for($i = 1;$i <= $sotrang;$i++) : ?>
            <?php 
                if(isset($_GET['page']))
                {
                    $p = $_GET['page'];
                    if($p == 0)$p = 1;
                }
                else
                {
                    $p = 1;
                }
                if($sotrang < $p)$p = $sotrang;
                
                 ?>
            <li class="page-item <?php echo ($i == $p) ? 'active' : '' ?>">
                <a class ="page-link" href="?page= <?php echo $i ; ?>"><?php echo $i; ?></a>
            </li>
            <?php endfor; ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo ++$p ?>">Next</a></li>
        </ul>
    </nav>
</div>
<?php require_once __DIR__. '/../../layouts/footer.php'; ?>