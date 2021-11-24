  <?php require_once __DIR__. '/autoload/autoload.php';
    $giaovien = $db->fetchID("giaovien",$_SESSION['giaovien_id']);
    ?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Thông tin</title>
     <link href="<?php echo base_url() ?>public/lopdaiden/css/style.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   </head>
   <body>
        <div class="infor container">
          <div class="card">
            <div class="name">
              <b><?php echo $giaovien['name']?></b>
            </div>
            <div class="sinhvien">
              <span>Giáo viên</span>
            </div>
            <img src="<?php echo uploads() ?>product/<?php echo $giaovien['thundar'] ?>" alt="" class="image">
            <div class="email">
                <span><i class="fa fa-envelope"></i> <?php echo $giaovien['email']?></span>
            </div>
            <div class="location">
                <span><i class="fa fa-compass"></i> <?php echo $giaovien['address']?></span>
            </div>

            <hr>
            <div class="trong">
              <p>Bạn đang nghĩ gì ?....</p>
            </div>
            <hr>
            <div class="out">
              <a href="index.php" class="btn-danger">Trở lại</a>
              <a href="<?php echo base_url() ?>/lopdaiden/logout.php" class="btn-success">Đăng xuất</a>
            </div>
          </div>
          <div class="card-full">
          <div class="card card-full-1">
            <div class="name"><b>Bảo mật thông tin</b></div>
          <div class="icon"><i class="fa fa-user"></i></div>
          <div class="name">
            <span>Bạn có thể chỉnh sửa thông tin tại đây</span>
          </div><hr>
          <div class="link">
            <a href="sua-thong-tin.php">Sửa thông tin ></a>
          </div>
          </div>
           <div class="card card-full-1">
            <div class="name"><b>Thông tin khác</b></div>
            <div class="ngaysinh">
              <p>Ngày sinh: <?php echo $giaovien['born']?></p>
            </div>
            <div class="sex">
              <p>Giới tính: <?php echo $giaovien['sex']?></p>
            </div>
          <div class="ngaythamgia">
           <p>Ngày tham gia: <?php echo $giaovien['create_at']?></p>
          </div>
        </div>
        </div>
   </body>
   </html>