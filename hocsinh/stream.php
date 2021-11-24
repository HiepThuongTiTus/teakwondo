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

  $id = intval(getInput('id'));
  $lophoc = $db->fetchId("lophoc",$id);
    ?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <title>Stream</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/f25bf5c13c.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="stream.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="btn-bars" href="index.php">
      <button class="w3-button w3-xlarge w3-circle w3-light mr-3">
        <i class="fas fa-home"></i>
      </button>
    </a>
    
    <a class="navbar-brand" href="#"><?php echo $lophoc['content'] ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Stream <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Classwork</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="detailclass.php?IdLop=55">People</a>
        </li>
      </ul>
    </div>
    <div>
      <a class="btn btn-outline-dark" href="logout.php">Đăng xuất</a>
    </div>
  </nav>
    </div> 
   
  <div class="container">

    <div class="bgd-img-top" style="background-image: url('http://localhost/classroom/images/brown.jpg');">
      <div class="class"><?php echo $lophoc['content'] ?></div>
      <div class="class-info"><?php echo $lophoc['name'] ?></div>
      <div class="class-info"><?php echo $lophoc['thoigian'] ?></div>
    </div>

    <div class="account bg-light text-muted">

      <a href="" data-toggle="modal" data-target="#myModal">Chia sẻ với lớp học</a>

      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h7 class="modal-title">Đăng</h7>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <input type="hidden" name="id" value="">
              <!--Ẩn id bài post -->
              <div class="modal-body">
                <textarea class="form-control" rows="5" id="content" name="content" autofocus></textarea>
              </div>

              <div class="modal-footer">
                <input type="file" class="form-control" id='myfile' name='myfile'>

                <button type="reset" class="btn btn-primary" data-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary">Đăng</button>
              </div>
            </div>
          </div>
        </div>
      </form>

    </div>
    <div class="account">

      <div class="row">

        <div class="col-1">
          <img class="avt" src="images/person.jpg" alt="">
        </div>

        <div class="col-9">
          <div class="name">Đặng Minh Thắng</div>
          <div class="date">Oct 15</div>
        </div>
      </div>
      <div>jjjjjjjjjjjjjjjjjjj</div>
      
    </div>
  </div>
</body>
<style>
  div.account {
    border: 1px solid grey;
    border-radius: 10px;
    margin-top: 20px;
    padding: 20px 20px 20px 30px;
}
img.avt {
    width: 50px;
    height: 50px;
    border-radius: 50%;
}
div.container {
    padding: 80px;
}
.account:hover {
    box-shadow: 2px 2px 2px 2px rgba(0,0,0,0.1);
}
.bgd-img-top {
    height: 240px;
    border-radius: 8px;
}
.class {
    font-weight: 500;
    font-size: 35px;
    color: white;
    padding-left: 35px;
    padding-top: 20px;
}
.class-info {
    font-size: 22px;
    color: white;
    padding-left: 35px;
}
</style>