<?php require_once __DIR__. '/autoload/autoload.php';
    $id = intval(getInput('id'));
    $sql = "SELECT product.name,product.thundar,orders.price,orders.qty FROM orders LEFT JOIN product ON orders.product_id = product.id WHERE orders.transaction_id = $id";
    $sql = "SELECT transaction.updated_at as time
     FROM orders JOIN transaction on transaction.id = orders.transaction_id JOIN product on orders.product_id = product.id" ;
    $order = $db->fetchsql($sql);
    $users = $db->fetchID("users",intval($_SESSION['name_id']));
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    $data=
    [
    'amount' => $_SESSION['total'],
    'users_id' => $_SESSION['name_id']
    ];
    $idtran = $db->insert("transaction",$data);
    if($idtran > 0)
    {
    foreach ($_SESSION['cart'] as $key => $value) 
    {
    $data2 = 
    [
    'transaction_id'=> $idtran,
    'product_id'=> $key,
    'qty'=>$value['qty'],
    'price'=>$value['price']
    ];
    $id_insert = $db->insert("orders",$data2);
    }
    
    $_SESSION['success'] = " Xác nhận mua hàng thành công ! Đơn hàng sẽ được giao đến bạn trong thời gian sớm nhất !!!";
    header("location: thong-bao.php");
    }
    } 
    ?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="M_Adnan">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Hóa đơn</title>
<body onload="window.print();">
  
    <div id="page" class="page">
        <div class="header">
            <div class="">
                <div class="row">
                    <div class="logo col-sm-8">Trung tâm y tế quận sơn trà</div>
                    <div class="logo__1 col-sm-4">Số phiếu:NT3000158</div>
                </div>
                <div class="logo__2 col-sm-6">Nhà thuốc Gia Đình</div>
                <div class="logo__3 col-sm-2">STT:1058</div>
            </div>
        </div>
        <br/>
        <div class="title">
            Hóa đơn thanh toán</div>
            <br/>
            <div class="title__1">Ngày bán:2021/10/06, Giờ bán:21:43:37</div>

        <br/>
        <form action="" method="POST">
            <div class="col-sm-1" style="font-weight: bold;padding-left: 0;padding-right: 0">Người mua: </div><div><?php echo $users['name'] ?></div>
            <div class="col-sm-1" style="font-weight: bold;padding-left: 0;padding-right: 0">Địa chỉ:</div><div class="col-sm-5" style="padding-left: 0"> <?php echo $users['address'] ?></div>
            <div style="font-weight: bold;">Số điện thoại : <?php echo $users['phone'] ?></div> 
            <div style="font-weight: bold;padding-left: 0;padding-right: 0" class="col-sm-2">Chuẩn đoán bệnh:</div><div>Rối loạn chức năng tiêu hóa</div>
            <table class="TableData">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Đơn giá</th>
                        <th>SL</th>
                        <th>Thành tiền <br>(bao gồm 5% GTDT)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt=1;$sum=0 ;foreach ($_SESSION['cart'] as $value): ?>
                    <tr>
                        <th scope="row" class="cotSTT" style="background-color: #fff;"><?php echo $stt ?></th>
                        <td class="cotTenSanPham"><?php echo $value['name'] ?></td>
                        <td class="cotGia"><?php echo formatPrice($value['price']) ?> vnđ</td>
                        <td class="cotSoLuong">
                            <?php echo $value['qty'] ?>
                        </td>
                        <td class="cotSo"><?php echo formatPrice($value['price']*$value['qty']*105/100) ?> vnđ</td>
                    </tr>
                    <?php $stt+=1;$sum+=$value['price']*$value['qty']; endforeach ; $_SESSION['amount']=$sum?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" style="text-align: center;background-color: #fff;">Tổng số tiền</th>
                        <th scope="col" style="background-color: #fff;"><?php echo formatPrice($_SESSION['total']) ?> vnđ</th>
                    </tr>
                </tfoot>
            </table>
            <?php foreach ($order as $item): ?>
            <div class="footer-left" style="margin-bottom: 500px;"> <?php echo $users['address'] ?>,<br><?php echo $item['time'] ?><br/>
                <span style="font-weight: bold;font-size:15px; ">Khách hàng</span> <br> (chữ kí khách hàng)
            </div>
            <div class="footer-right" style="margin-bottom: 500px;"> Đà Nẵng,<br><?php echo $item['time'] ?><br/>
                <span style="font-weight: bold;font-size:15px; ">Nhân viên</span> <br> (chữ kí nhân viên)
            </div>
            
            <?php  endforeach ?>
            <p style="margin-top: 10px;padding: 0 0 0 27px;font-weight: bold" class="col-sm-2">Số tiền bằng chữ :</p>
            <div class="line">
            <p style="text-decoration-style:dotted;margin-top: 10px;font-style:italic;">( Năm triệu không trăm ba mươi lăm nghìn ba trăm lẻ sáu đồng )</p>
            </div>
            <div class="line__1">
            <p class="col-sm-1" style="padding: 0 0 10px 27px;"> Lưu ý :</p>
            <p style="padding:0;" >Trường hợp khách hàng có nhu cầu lấy <a style="font-weight:bold;color:black;text-decoration: none;line-height: 1.5">Hóa đơn tài chính đề nghị lấy ngay trong ngày <br></a> (Quá ngày Bệnh viện không giải quyết)</p>
            </div>
            <p class="col-sm-1"></p>
            <div class="line___3">
            <p class="line__1 col-sm-4" style="padding: 0;margin-top: -5px">Xin liên hệ trực tiếp với nhân viên nhà thuốc để được hướng dẫn</p>
            <p class="col-sm-3 pull-right line__4" style="margin-top: -5px;">người bán</p><br><p class="col-sm-8 line__2" style="padding: 0 0 0 25px">Trân trọng cảm ơn Quý khách đã mua thuốc tại nhà thuốc Gia Đình</p>
            </div>  
            </div>
              

    </form>
</body>
<style>
    body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tohoma";
    }
    * {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    }
    .line p{
    text-decoration-line: underline;
        }
    .line__1 {
    font-style:italic;
    font-size: 14px;
    font-weight: 500;
        }
        .line__2{
            font-style:italic;
    font-size: 14px;
    font-weight: bold; 
        }
        .line___3 {
            display: block;
        }
        .line__4 {
            text-transform: uppercase;
            font-weight: bold;
           
        }
    .page {
   
    overflow:hidden;
    min-height:297mm;
    padding: 2.5cm;
    margin-left:auto;
    margin-right:auto;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 237mm;
    outline: 2cm #FFEAEA solid;
    }
    @page {
    size: A4;
    margin: 0;
    }
    button {
    width:100px;
    height: 24px;
    }
    .header {
    overflow:hidden;
    }
    .logo {
    background-color:#FFFFFF;
    
    font-weight: bold;
    text-transform:uppercase;
    }
    .logo__1 {
    background-color:#FFFFFF;
    font-weight: 100;
    }
    .logo__2 {
    background-color:#FFFFFF;
    font-weight: 100;
    margin-left: 22px;
    text-transform: uppercase;
    }
    .logo__3 {
    background-color:#FFFFFF;
    font-weight: 100;
    margin-left: 175px;
    text-transform: uppercase;
    }
    .company {
    padding-top:6px;
    text-transform:uppercase;
    background-color:#FFFFFF;
    text-align:right;
    float:right;
    font-size:16px;
    font-weight: bold;
    }
    .title {
    text-align:center;
    position:relative;
    color:#000;
    font-size: 30px;
    top:20px;
    text-transform: uppercase;
    font-weight: 700;
    }
    .title__1 {
        text-align: center;
        font-weight: 500;
    }
    .footer-left {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    float:left;
    font-size: 12px;
    bottom:1px;
    }
    .footer-right {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    font-size: 12px;
    float:right;
    bottom:1px;
    }
    .TableData {
    background:#ffffff;
    font: 11px;
    width:100%;
    border-collapse:collapse;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:12px;
    border:thin solid #d3d3d3;
    margin-top: 10px;
    }
    .TableData TH {
    background: rgba(0,0,255,0.1);
    text-align: center;
    font-weight: bold;
    color: #000;
    border: solid 1px #ccc;
    height: 24px;
    }
    .TableData TR {
    height: 24px;
    border:thin solid #d3d3d3;
    }
    .TableData TR TD {
    padding-right: 2px;
    padding-left: 2px;
    border:thin solid #d3d3d3;
    }
    .TableData TR:hover {
    background: rgba(0,0,0,0.05);
    }
    .TableData .cotSTT {
    text-align:center;
    width: 10%;
    }
    .TableData .cotTenSanPham {
    text-align:left;
    width: 40%;
    }
    .TableData .cotHangSanXuat {
    text-align:left;
    width: 20%;
    }
    .TableData .cotGia {
    text-align:right;
    width: 120px;
    }
    .TableData .cotSoLuong {
    text-align: center;
    width: 50px;
    }
    .TableData .cotSo {
    text-align: right;
    width: 120px;
    }
    .TableData .tong {
    text-align: right;
    font-weight:bold;
    text-transform:uppercase;
    padding-right: 4px;
    }
    .TableData .cotSoLuong input {
    text-align: center;
    }
    @media print {
    @page {
    margin: 0;
    border: initial;
    border-radius: initial;
    width: initial;
    min-height: initial;
    box-shadow: initial;
    background: initial;
    page-break-after: always;
    }
    }
    .button {
    width: 140px;
    height: 45px;
    font-family: 'Roboto', sans-serif;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 2.5px;
    font-weight: 500;
    color: #000;
    background-color: #2EE59D;
    border: none;
    border-radius: 45px;
    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease 0s;
    cursor: pointer;
    outline: none;
    }
    .button:hover {
    background-color: #2EE59D;
    box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
    color: #fff;
    transform: translateY(-7px);
    }
</style>