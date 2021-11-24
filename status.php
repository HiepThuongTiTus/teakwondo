<?php  
require_once __DIR__."/autoload/autoload.php";


$id = intval(getInput('id'));



$EditTransaction = $db->fetchID("transaction",$id);
if(empty($EditTransaction))
{
  $_SESSION['error'] = " Dữ liệu không tồn tại";
  redirectIndex();
}
if($EditTransaction['status'] == 1)
{
	$_SESSION['error'] = " Đơn hàng đã được xử lý";
	redirectIndex();	
}
$status = 1;

$update = $db->update("transaction",array("status" => $status), array("id" => $id));
  if($update > 0) 
    {
        $_SESSION['success'] = "Cập nhật thành công ";
$sql = "SELECT product_id,qty FROM orders WHERE transaction_id = $id";
$Orders = $db->fetchsql($sql);
foreach ($Orders as $item)
{
$idproduct = intval($item['product_id']);
$product = $db->fetchID("product",$idproduct);
$number = $product['number'] - $item['qty'];
$up_pro = $db->update("product",array("number"=>$number),array("id"=>$idproduct));
}
	
       	redirectIndex();
    }
    else
    {
         $_SESSION['error'] = "Dữ liệu không thay đổi ";   // Thêm thất bại 
              redirectIndex(); 
    }
?>