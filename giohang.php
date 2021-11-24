<?php 
require_once __DIR__."/autoload/autoload.php";
$sum=0;
$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
if( ! isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
{
  echo "<script>alert('Bạn chưa có gì trong giỏ hàng');location.href='index.php'</script>";
}

?>

<?php require_once __DIR__."/layouts/header-.php"; ?>

<h2 class="text-center">Giỏ hàng của bạn</h2>
<div class="container"> 
  <?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
      <strong style="color: #3c763d">Success</strong>
      <?php echo $_SESSION['success'] ; unset($_SESSION['success']) ?>
    </div>
  <?php endif ?>
 <table id="cart" class="table table-hover table-condensed"> 
  <thead> 
   <tr> 
          <th scope="col">Stt</th>
          <th scope="col">Tên sản phẩm</th>
          <th scope="col">Hình ảnh</th>
          <th scope="col">Số lượng</th>
          <th scope="col">Giá</th>
          <th scope="col">Thành tiền</th>
          <th scope="col">Xóa</th>
   </tr> 
  </thead> 
  <tbody>
<?php $stt = 1; foreach ($_SESSION['cart'] as $value): ?>
        <tr>
            <td><?php echo $stt ?></td>
            <td><?php echo $value['name'] ?></td>

            <td style="padding: 10px;">
              <img src="<?php echo uploads() ?>product/<?php echo $value['thundar'] ?>" width="80px" height="80px">
            </td>
             <?php  
                 $sql = "SELECT product.* FROM product";
                  $product = $db->fetchsql("SELECT * FROM product WHERE id= $value[id]");           
                  $object = (object)$product[0];
                  $quantity = (int)$object->number;
              ?>
         

            <td style="padding-top: 20px">
                <?php if ($value['qty'] >  $quantity ): ?>

                <input type="number" id="qty"  data-key="<?php echo  $value['id'] ?>" value="<?php echo $quantity ?>" name="quantity" min="1" max="<?php echo  $quantity ?>" oninput="this.value = Math.abs(this.value)">
                      <?php else: ?>

                  <input type="number" id="qty"  data-key="<?php echo $value['id'] ?>" value="<?php echo $value['qty'] ?>" name="quantity" min="1" max="<?php echo  $quantity ?>" oninput="this.value = Math.abs(this.value)">
                <?php endif ?>
            </td>

            <td><?php echo formatPrice($value['price']) ?></td>
            <?php if ($value['qty'] >  $quantity): ?>
                          <td><?php echo formatPrice($value['price'] * $quantity) ?></td>
               <?php else: ?>
                  <td><?php echo formatPrice($value['price'] * $value['qty']) ?></td>
            <?php endif ?>

            <td style="padding-top: 22px">
              <a href="xoa.php?id=<?php echo $value['id'] ?>&return_url=<?php echo $current_url?>" class="btn btn-xs btn-danger xoa"><i class="fa fa-remove"></i>Xóa</a>
              <a href="#" class="btn btn-xs btn-info updatecart" data-key="<?php echo $value['id'] ?>" ><i class="fa fa-refresh"></i>Cập Nhật</a>
            </td>
        </tr>
        
<?php 
if ($value['qty'] >  $quantity) {
 $sum += $value['price'] * $quantity ;
}else
{
  $sum += $value['price'] * $value['qty'] ;
}

$_SESSION['tongtien'] = $sum; ?>
<?php $stt++; endforeach ?>
 
</tbody>
 </table>

 <div class="col-md-5 pull-right">
   <ul class="list-group">
     <li class="list-group-item">
      <h3>Thông tin đơn hàng</h3>
     </li>
     <li class="list-group-item">
       <span class="badge"><?php echo formatPrice($_SESSION['tongtien'])?></span> Số tiền
     </li>
       <li class="list-group-item">
         <span class="badge">5%</span>
         Thuế GTDT 
       </li>
       
   <li class="list-group-item">
     <span class="badge"><?php $_SESSION['total'] = $_SESSION['tongtien'] * 105/100 ; echo formatPrice($_SESSION['total'])?></span>
     Tổng tiền thanh toán
   </li>
   <li class="list-group-item">
    <a href="thanh-toan.php" class="btn btn-success" style="font-size: 13px;">Thanh toán khi nhận hàng</a>
    <a href="dang-ki-bank.php" class="btn btn-success"  style="font-size: 13px;margin-top: 5px;">Thanh toán trực tuyến</a>
   </li>

   </ul>
 </div>
<a href="index.php" class="btn btn-success">Tiếp tục mua hàng</a>
</div> 
<?php require_once __DIR__."/layouts/footer-.php"; ?>