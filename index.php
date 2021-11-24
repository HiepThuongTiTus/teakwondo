<?php require_once __DIR__. '/autoload/autoload.php';
    //_debug($_SESSION['cart']);
    // unset($_SESSION['cart']);
    $sqllogo = $db->fetchsql("SELECT * FROM logo limit 6");
    $sqltintuc = $db->fetchsql("SELECT * FROM tintuc limit 5");
    $sqlbanner = $db->fetchsql("SELECT * FROM banner limit 1");
    $sqlgioithieu = $db->fetchsql("SELECT * FROM gioithieu limit 5");
    $category = $db->fetchsql("SELECT * FROM category WHERE level=0 AND home=1");
    $sqlRated = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY rated DESC LIMIT 4";
    $productRated = $db->fetchsql($sqlRated);
    $sqlNew = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY id DESC LIMIT 4";
    $productNew = $db->fetchsql($sqlNew);
    $sqlSale = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY sale DESC LIMIT 4";
    $productSale = $db->fetchsql($sqlSale);
    $sqlCheap = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY price LIMIT 4";
    $productCheap = $db->fetchsql($sqlCheap);
    $sqlAcc = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 1 ORDER BY price LIMIT 4";
    $productAcc = $db->fetchsql($sqlAcc);
   
    ?>
<?php require_once __DIR__. '/layouts/header-.php'; ?>
<!--======= HOME MAIN SLIDER =========-->
<section class="home-slider">
    <!-- SLIDE Start -->
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                 <?php foreach ($sqlbanner as $item): ?>
                <!-- SLIDE  -->
                <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" >
                    <!-- MAIN IMAGE --> 
                    <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>"  alt="slider"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                    <!-- LAYERS --> 
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption font-playfair sfb tp-resizeme" 
                        data-x="left" data-hoffset="0" 
                        data-y="center" data-voffset="-200" 
                        data-speed="800" 
                        data-start="500" 
                        data-easing="Power3.easeInOut" 
                        data-splitin="none" 
                        data-splitout="none" 
                        data-elementdelay="0.1" 
                        data-endelementdelay="0.1" 
                        data-endspeed="300" 
                        style="z-index: 7; font-size:18px; color:#fff; max-width: auto; max-height: auto; white-space: nowrap;font-weight: bold;"><?php echo $item['name'] ?></div>
                    <!-- LAYER NR. 2 -->
                    
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption sfr font-extra-bold tp-resizeme" 
                        data-x="left" data-hoffset="0" 
                        data-y="center" data-voffset="0" 
                        data-speed="800" 
                        data-start="800" 
                        data-easing="Power3.easeInOut" 
                        data-splitin="chars" 
                        data-splitout="none" 
                        data-elementdelay="0.07" 
                        data-endelementdelay="0.1" 
                        data-endspeed="300" 
                        style="z-index: 6; font-size:120px; color:#000; text-transform:uppercase; white-space: nowrap;"><?php echo $item['top'] ?></div>
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption sfr font-extra-bold tp-resizeme" 
                        data-x="left" data-hoffset="0" 
                        data-y="center" data-voffset="110" 
                        data-speed="800" 
                        data-start="1300" 
                        data-easing="Power3.easeInOut" 
                        data-splitin="chars" 
                        data-splitout="none" 
                        data-elementdelay="0.07" 
                        data-endelementdelay="0.1" 
                        data-endspeed="300" 
                        style="z-index: 6; font-size:120px; color:#000; text-transform:uppercase; white-space: nowrap;"><?php echo $item['down'] ?></div>
                       
                </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</section>

<!-- Quy tu thien --> 
<section class="padding-top-50 padding-bottom-150">
    <div class="container">
        <!-- Main Heading -->
        <div class="heading text-center" id="tuthien">
            <h4>Qũy từ thiện</h4>
            <div style="border-bottom: 1px solid white;margin-bottom: 10px;"></div>
        </div>
        <div class="arrival-block-1">
            <?php foreach ($productNew as $item): ?>
            <!-- Item -->
            <div class="item">
                <!-- Images --> 
                <img class="img-1" src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" alt="" > <img class="img-2" src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" alt="" >
                <!-- Overlay  -->
                <div class="overlay">
                    <!-- Price -->     
                    <div class="position-center-center"> <a href="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" data-lighter><i class="fa fa-search"></i></a> </div>
                </div>
                <!-- Item Name -->
                <div class="item-name">
                    <a href="#"><?php echo $item['name'] ?></a>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<!-- Khoa hoc -->
<section class="padding-top-50 padding-bottom-150">
    <div class="container">
        <!-- Main Heading -->
        <div class="heading text-center" id="khoahoc">
            <h4>Khóa học nổi bật </h4>
            <div style="border-bottom: 1px solid white;margin-bottom: 10px;"></div>
        </div>
        <div class="arrival-block-1">
            <?php foreach ($productNew as $item): ?>
            <!-- Item -->
            <div class="item">
                <!-- Images --> 
                <img class="img-1" src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" alt="" > <img class="img-2" src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" alt="" >
                <!-- Overlay  -->
                <div class="overlay">
                    <!-- Price -->     
                    <div class="position-center-center"> <a href="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" data-lighter><i class="fa fa-search"></i></a> </div>
                </div>
                <!-- Item Name -->
                <div class="item-name">
                    <a href="#"><?php echo $item['name'] ?></a>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<!-- Gioithieu -->
<section class="padding-top-50 padding-bottom-150" id="gioithieu">
    <div class="container block"> 
       <div class="col-md-8">
            <div class="heading text-center">
                <h4>Tin tức</h4>
                <div style="border-bottom: 1px solid white;margin-bottom: 10px;"></div>
            </div>
            <div class="tintuc">
            <?php foreach ($sqltintuc as $item): ?>

            <figure class="snip1563">
                <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" alt="sample110" />
                    <figcaption>
                        <h3><?php echo $item['name']?></h3>
                        <p><?php echo $item['content']?></p>
                    </figcaption>
                <a href="#"></a>
            </figure>
            <?php endforeach ?>
            </div>
       </div>
        <div class="col-md-4">
        <!-- Main Heading -->
        <div class="heading text-center">
            <h4>Giới thiệu</h4>
            <div style="border-bottom: 1px solid white;margin-bottom: 10px;"></div>
        </div>
         <?php foreach ($sqlgioithieu as $gioithieu): ?>
      <a href="#"><div class="gioithieu">
          <img src="<?php echo uploads() ?>product/<?php echo $gioithieu['thundar'] ?>" alt="">
      </div></a>
       <?php endforeach ?>
        </div>
    </div>
</section>

    <!-- Knowledge Share -->
    <section class="light-gray-bg padding-top-150 padding-bottom-150">
      <div class="container"> 
        
        <!-- Main Heading -->
        <div class="heading text-center">
          <h4>Chia sẻ kiến thức</h4>
          <div style="border-bottom: 1px solid white; margin-bottom: 10px;"></div>
          <span>Bạn muốn sử dụng đồ gỗ một cách lâu hơn ?
          <br> 
          Để xem chúng tôi chia sẻ được kiến thức gì cho bạn</span> </div>
        <div class="knowledge-share">
          <ul class="row">
            
            <!-- Post 1 -->
            <li class="col-md-6">
              <div class="date"> <span>December</span> <span class="huge">27</span> </div>
              <a href="#.">Donec commo is vulputate</a>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula. Sed feugiat, tellus vel tristique posuere, diam</p>
              <span>By <strong>Admin</strong></span> </li>
            
            <!-- Post 2 -->
            <li class="col-md-6">
              <div class="date"> <span>December</span> <span class="huge">09</span> </div>
              <a href="#.">Donec commo is vulputate</a>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula. Sed feugiat, tellus vel tristique posuere, diam</p>
              <span>By <strong>Admin</strong></span> </li>
          </ul>
        </div>
      </div>
    </section>
    
    <!-- Testimonial -->
  
    
    <!-- About -->
    <section class="small-about padding-top-150 padding-bottom-150">
      <div class="container"> 
        
        <!-- Main Heading -->
        <div class="heading text-center">
          <h4>about ecoshop</h4>
          <div style="border-bottom: 1px solid white; margin-bottom: 10px;"></div>
          <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante ipsumien lacus, eu posuere odio luctus non. Nulla lacinia,
            eros vel fermentum consectetur, risus purus tempc, et iaculis odio dolor in ex. </p>
        </div>
        
        <!-- Social Icons -->
        <ul class="social_icons">
          <li><a href="#."><i class="fa fa-facebook"></i></a></li>
          <li><a href="#."><i class="fa fa-twitter"></i></a></li>
          <li><a href="#."><i class="fa fa-tumblr"></i></a></li>
          <li><a href="#."><i class="fa fa-youtube"></i></a></li>
          <li><a href="#."><i class="fa fa-dribbble"></i></a></li>
        </ul>
      </div>
    </section>
  </div>

<!-- Hoatdong -->
<section class="padding-top-100"id="hoatdong">
    <div class="container">
        <!-- Main Heading -->
        <div class="heading text-center" >
            <h4>Hoạt động</h4>
            <div style="border-bottom: 1px solid white;margin-bottom: 10px;"></div>
        </div>
    </div>
    <!-- New Arrival -->
    <div class="arrival-block container">
        <?php foreach ($sqllogo as $item): ?>
        <!-- Item -->
        <div class="item">
            <!-- Images --> 
            <img class="img-1" src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" alt="" > <img class="img-2" src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" alt="" >
            <!-- Overlay  -->
            <div class="overlay">
                <!-- Price --> 
                <div class="position-center-center"> <a href="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" data-lighter><i class="fa fa-eye"> Preview</i></a> </div>
            </div>
            
        </div>
        <?php endforeach ?>
    </div>
     
</section>

<?php require_once __DIR__. '/layouts/footer-.php'; ?>