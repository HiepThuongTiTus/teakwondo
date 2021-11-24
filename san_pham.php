<?php 
	require_once __DIR__. '/autoload/autoload.php';
	$id = intval(getInput('id'));
	$item = $db->fetchId("product",$id);
     $accessories = $db->fetchID("category",$item['category_id']);
     $catelv = intval($accessories['level']);
    $sql = "SELECT users.name,rated.comment,rated.rated,rated.created_at FROM rated LEFT JOIN users ON rated.id_users = users.id WHERE id_product = $id";
    $rated = $db->fetchsql($sql);
   
?>
<?php require_once __DIR__. '/layouts/header-.php'; ?>


    <div class="chitietSanpham container bor">
        <h1> <?php if ($catelv == 0): ?>
           
        <?php endif ?> <?php echo $item['name'] ?></h1>
        <div class="rowdetail group">
            <div class="picture">
                <img id="phongto" src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>">
            </div>
            <div class="price_sale">
                
                  
                
                <div class="area_promo">
                    <strong>khuyến mãi</strong>
                    <div class="price" style="margin-left: 15px;color:red;font-weight:bold;font-size: 20px;">
                        <b><?php echo formatPrice(formatSale($item['price'],$item['sale'])) ?>₫</b> /

                    <?php if ($item['sale'] > 0): ?>
                        <strike><?php echo formatPrice($item['price']) ?>đ </strike>
                    <?php endif ?>
                    </div>
                    <div class="promo" style="margin-left: -24px;">   
                       
                            <b><?php echo $item['content'] ?></b>
                      
                    </div>
                </div>
                
                
                <div class="area_order">
                    <!-- nameProduct là biến toàn cục được khởi tạo giá trị trong phanTich_URL_chiTietSanPham -->
                    <a class="buy_now" href="cart.php?id=<?php echo $item['id'] ?>">
                        <h3><i class="fa fa-plus" style="color: white"></i> Thêm vào giỏ hàng</h3>
                    </a>
                </div>
                <div>
                        <?php if($item['number'] <= 100 && $item['number'] > 0) :?>
                            <span style="color: #ff376c; font-size: 16px;
                            font-weight:600; padding-left: 10px;">Số sản phẩm trong kho <?php echo $item['number'] ?> sản phẩm</span>
                        <?php elseif($item['number'] == 0): ?>
                             echo "<script>alert('Đã hết hàng ,chờ cập nhật');location.href='index.php'</script>";
                        <?php endif ?>
                    </div>
            </div>
            <div class="info_product">
                <h2>Thông số kỹ thuật</h2>
                <ul class="info">
                    <?php if ($catelv == 0): ?>
                        <li>
                            <p>Chất liệu</p>
                            <div><?php echo $item["material"] ?></div>
                        </li>
                        <li>
                            <p>Kích thước</p>
                           <div><?php echo $item["top"] ?></div>
                        </li>
                        <li>
                            <p>Xuất sứ</p>
                           <div><?php echo $item["mid"] ?></div>
                        </li>
                        <li>
                            <p>Trọng lượng</p>
                            <div><?php echo $item["down"] ?></div>
                        </li>
                       

                    <?php endif ?>

                    
                </ul>
            </div>
        </div>
        <hr>
        <div class="comment-area">
            <div class="guiBinhLuan">
                <form action="danh-gia.php?">
                    <div class="stars">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input class="star star-5" id="star-5" value="5" type="radio" name="star">
                        <label class="star star-5" for="star-5" title="Tuyệt vời"></label>

                        <input class="star star-4" id="star-4" value="4" type="radio" name="star">
                        <label class="star star-4" for="star-4" title="Tốt"></label>

                        <input class="star star-3" id="star-3" value="3" type="radio" name="star">
                        <label class="star star-3" for="star-3" title="Tạm"></label>

                        <input class="star star-2" id="star-2" value="2" type="radio" name="star">
                        <label class="star star-2" for="star-2" title="Khá"></label>

                        <input class="star star-1" id="star-1" value="1" type="radio" name="star">
                        <label class="star star-1" for="star-1" title="Tệ"></label>
                    </div>
                        <input type="textarea" maxlength="250" id="inpBinhLuan" name="comment" placeholder="Viết suy nghĩ của bạn vào đây...">
                    <input id="btnBinhLuan" type="submit" value="GỬI BÌNH LUẬN">
                </form>
            </div>
            
            <?php if(isset($_SESSION['success'])) :?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION['success'];unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>

                <?php if(isset($_SESSION['error_cm'])) :?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['error_cm'];unset($_SESSION['error_cm']); ?>
                    </div>
                <?php endif; ?>   

            <?php $star=0;$count=0; foreach ($rated as $item2): ?>

            <?php $star+=$item2['rated'];$count+=1; ?>
                
            <?php endforeach;?>
            <?php if ($count>0):
              $star /= $count;
              $data = 
                [
                    'rated' => $star,
                    'comment' => $count
                ];
              $id_update = $db->update("product",$data,array("id" => $id));
               ?>
                <?php endif ?>  

            <div class="rating">
                <i class="fa fa-star<?php if ($star<1): ?>-o<?php endif ?>"></i>
                <i class="fa fa-star<?php if ($star<2): ?>-o<?php endif ?>"></i>
                <i class="fa fa-star<?php if ($star<3): ?>-o<?php endif ?>"></i>
                <i class="fa fa-star<?php if ($star<4): ?>-o<?php endif ?>"></i>
                <i class="fa fa-star<?php if ($star<5): ?>-o<?php endif ?>"></i>
                <span> <?php echo $count ?> đánh giá </span>
            </div>
            
            <div class="comment-content">
                <?php foreach ($rated as $it): ?>

                    <div class="comment">
                    <i class="fa fa-user-circle"> </i>
                    <h4><?php echo $it['name'] ?>
                    <span>
                        <i class="fa fa-star<?php if ($it['rated']<1): ?>-o<?php endif ?>"></i>
                        <i class="fa fa-star<?php if ($it['rated']<2): ?>-o<?php endif ?>"></i>
                        <i class="fa fa-star<?php if ($it['rated']<3): ?>-o<?php endif ?>"></i>
                        <i class="fa fa-star<?php if ($it['rated']<4): ?>-o<?php endif ?>"></i>
                        <i class="fa fa-star<?php if ($it['rated']<5): ?>-o<?php endif ?>"></i>
                    </span>
                    </h4>
                    <p><?php echo $it['comment'] ?></p>
                    <span class="time"><?php echo $it['created_at'] ?></span>
                </div>
                    
                <?php endforeach ?>
                
            </div>
        </div>
    </div>


<?php require_once __DIR__. '/layouts/footer-.php'; ?>