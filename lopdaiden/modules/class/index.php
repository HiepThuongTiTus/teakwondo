<!-- <?php
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
    
    $sql = "SELECT lophoc.*,category.name as namecate FROM lophoc";
    $sql = "SELECT * FROM lophoc";
    $total = count($db->fetchsql($sql));
    
    $lophoc = $db->fetchJones('lophoc',$sql,$total,$p,4,true);
    
    if(isset($lophoc['page']))
    {
        $sotrang = $lophoc['page'];
        unset($lophoc['page']);
    }
    if($sotrang < $p)$p = $sotrang;
    
    ?>
<?php require_once __DIR__. '/../../layouts/header.php'; ?>

<div class="container" style="padding: 80px;">
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
    
        <?php foreach ($lophoc as $item): ?> <div class="card">
        <div class="card-body" style="background-image: url('http://localhost/classroom/images/brown.jpg');">
            <a class="card-tiltle" href="stream.php">
                <div class="class"><?php echo $item['content']?></div>
                <div class="class-info"><?php echo $item['thoigian']?></div>
            </a>
            <div class="card-text"><?php echo $item['name']?></div>
        </div>
        <div class="card-body">
            <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>"class="avt">
        </div>
        <div>
            <a href="<?php echo modules("class/") ?>edit.php?id=<?php echo $item['id'] ?>" class="badge badge-info">Sửa</a>
            <a href="#" class="badge btn btn-danger" data-toggle="modal" data-target="#myModal">Xóa</a>
        </div></div>
        <?php  endforeach ?>
    
</div>
<div class="modal" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Xác nhận thao tác</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <h4 class="text-center text-warning">Bạn có chắc chắn muốn xóa lớp học này không ?</h4>
            </div>
            <div class="modal-footer">
                <a href="#" class="badge btn btn-secondary" data-dismiss="modal">Hủy</a>
                <a href="delete.php?id=54" class="badge btn btn-danger">Xóa</a>
            </div>
        </div>
    </div>
</div> -->