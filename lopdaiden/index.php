<?php
    require_once __DIR__. '/autoload/autoload.php';
    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
        if($p == 0)$p = 1;
    }
    else
    {
        $p = 1;
    }
    
    $sql = "SELECT lophoc.*,category.name as namecate FROM lophoc LEFT JOIN category on category.id = lophoc.category_id where category.level = 0";
    $total = count($db->fetchsql($sql));
    
    $lophoc = $db->fetchJones('lophoc',$sql,$total,$p,5,true);
    
    if(isset($lophoc['page']))
    {
        $sotrang = $lophoc['page'];
        unset($lophoc['page']);
    }
    if($sotrang < $p)$p = $sotrang;
    
    ?>
<?php require_once __DIR__. '/layouts/header.php'; ?>
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
<div class="total" style="">
    
    
        <div class="infor">
        <?php foreach ($lophoc as $item): ?>
        <div class="caret_card">
            <div class="chiacot">
            <div class="banner">
            <a href="stream.php?id=<?php echo $item['id'] ?>">            
            <div class="name">
                <span>Tên lớp: <?php echo $item['content']?></span>
            </div>
            <div class="area">
                <span>Địa điểm: <?php echo $item['thoigian']?></span>
            </div>
            </a>
            <div class="giaovien">
                <span><a href="profile.php">Tên giáo viên: <?php echo $item['name']?></a></span>
            </div>
            </div>
            <div class="avatar">
                <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" alt="">
            </div>
             </div>
             <div class="link">
        <a href="<?php echo base_url() ?>lopdaiden/modules/class/edit.php?id=<?php echo $item['id'] ?>" class="badge badge-info nut" style="line-height: 20px;">Sửa</a>
            <a href="#" class="badge btn btn-danger nut" data-toggle="modal" data-target="#myModal" style="line-height: 20px;">Xóa</a>
    </div>
        </div>

    <?php endforeach ?>
    
    </div>
    
</div>
