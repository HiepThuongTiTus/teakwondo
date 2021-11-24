<?php require_once __DIR__. '/autoload/autoload.php';

    $f = intval(getInput('f'));
    $l = intval(getInput('l'));
    $the = getInput('the');
    $sx = getInput('sx');
   
	$category = $db->fetchsql("SELECT * FROM category WHERE level=0 AND home=1");
  if($f == 0 && $l == 0)
  {
    if($sx == "")
    {
        if($the == "hot"){
    	$sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY rated DESC";
        $ten = "nổi bật nhất";
        }
        else
        if($the == "new"){
        $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY id DESC";
        $ten = "mới nhất";
        }
        else
        if($the == "sale"){
        $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY sale DESC";
            $ten = "giảm giá mạnh";
        }
        else
        if($the == "cheap"){
        $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY price";
            $ten = "giá rẻ";
        }
        else
        {
            $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 AND product.slug LIKE'%".$the."%' ";
            $ten = $the;
        }
      }
      else
      {
          $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY price ".$sx;
          if($sx == "ASC")$sx2="tăng dần";
          else $sx2="giảm dần";
         $ten = "sắp xếp ".$sx2;
      }
    }
    else
    {
            $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 AND product.price*(100-product.sale)/100 > ".$f."000000 AND product.price*(100-product.sale)/100 < ".$l."000000";
            $ten = "từ ".$f."tr đến ".$l."tr";
            if($l == 1000)
            {
              $ten = "trên ".$f."tr";
            }
    }



    $total = count($db->fetchsql($sql));

    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p = 1;
    }

    $product = $db->fetchJones("product",$sql,$total,$p,12,true);

    if(isset($product))
    {
        $sotrang = $product['page'];
        unset($product['page']);
    }

 ?>
<?php require_once __DIR__. '/layouts/header-.php'; ?>
	<h1 class=" tieude" >Sản phẩm chất lượng</h1>       
<section class="padding-top-50 padding-bottom-150">
        <div class="papular-block block-slide">
            <!-- Item -->
            <?php foreach ($product as $item): ?>
            <div class="item">
                <!-- Item img -->
                <div class="item-img">
                    <img class="img-1" src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" alt="" > <img class="img-2" src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" alt="" >        
                    <!-- Overlay -->
                    <div class="overlay">
                        <div class="position-center-center">
                            <div class="inn"><a href="san_pham.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a> <a href="cart.php?id=<?php echo $item['id'] ?>" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="fa fa-shopping-basket"></i></a></div>
                        </div>
                    </div>
                </div>
               
                <!-- Item Name -->
                <div class="item-name">
                    <a href="san_pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                    
                </div>
                <!-- Price --> 
                <p class="price">
                      <?php if ($item['sale'] > 0): ?>
                        <strike class="sale"><?php echo formatPrice($item['price']) ?> đ</strike>
                      <?php endif ?>
                      
                      <b><?php echo formatPrice(formatSale($item['price'],$item['sale'])) ?> đ</b>
                    </p>
                <div class="ratingresult">
                <i class="fa fa-star<?php if ($item['rated']<1): ?>-o<?php endif ?>"></i>
                <i class="fa fa-star<?php if ($item['rated']<2): ?>-o<?php endif ?>"></i>
                <i class="fa fa-star<?php if ($item['rated']<3): ?>-o<?php endif ?>"></i>
                <i class="fa fa-star<?php if ($item['rated']<4): ?>-o<?php endif ?>"></i>
                <i class="fa fa-star<?php if ($item['rated']<5): ?>-o<?php endif ?>"></i>
                <span class="chu" > <?php echo $item['comment'] ?> đánh giá </span>
            </div>
            </div>
            <?php endforeach ?>
        </div>



      <li aria-label="Page navigation" style="text-align: center">
        <ul class="pagination pullright container">

          <?php for($i = 1;$i <= $sotrang;$i++) : ?>

          <?php 
          if(isset($_GET['page']))
          {
              $p = $_GET['page'];
          }
          else
          {
              $p = 1;
          }

           ?>
          
          <li class="page-item <?php echo ($i == $p) ? 'active' : '' ?>">
              <a class ="page-link" href="?the=<?php echo $the ?>&&sx=<?php echo $sx ?>&&f=<?php echo $f ?>&&l=<?php echo $l ?>&&page=<?php echo $i ; ?>"><?php echo $i; ?></a>
          </li>

          <?php endfor; ?>

        </ul>
    </li>
    
</section>
<?php require_once __DIR__. '/layouts/footer-.php'; ?>