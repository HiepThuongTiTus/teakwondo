<?php
require_once __DIR__. '/../../autoload/autoload.php';

$dem1 = $db->countTable("phone");

$dem3 = $db->countTable("accessories");


$dem7 = $db->dem("product", "category_id", "category_id = 39");
$dem8 = $db->dem("product", "category_id", "category_id = 40");
$dem9 = $db->dem("product", "category_id", "category_id = 41");
$dem10 = $db->dem("product", "category_id", "category_id = 42");
$dem11 = $db->dem("product", "category_id", "category_id = 43");
$dem12 = $db->dem("product", "category_id", "category_id = 34");
$dem13 = $db->dem("product", "category_id", "category_id = 35");
$dem14 = $db->dem("product", "category_id", "category_id = 36");
$dem15 = $db->dem("product", "category_id", "category_id = 37");

$dem16 = $db->dem("product", "category_id", "category_id = 21");
$dem17 = $db->dem("product", "category_id", "category_id = 22");
$dem18 = $db->dem("product", "category_id", "category_id = 23");
$dem19 = $db->dem("product", "category_id", "category_id = 24");
$dem20 = $db->dem("product", "category_id", "category_id = 25");
?>

<?php require_once __DIR__. '/../../layouts/header.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Thống kê sản phẩm</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.php">Bảng điều khiển</a>
                </li>
                <li class="breadcrumb-item active">Thống kê sản phẩm</li>
            </ol>

            <div class="card mb-4">
                <div class="clearfix"></div>
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

                <table class="table table-bordered dataTable" id="dataTable" 
                width="100%" cellspacing="0" role="grid" 
                aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <tr role="row">

                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 20%;">Tên mục</th>

                            

                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 50%;">Thông tin</th>

                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 10%;">Chi tiết</th>
                            </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Danh mục sản phẩm</td>
                           
                            <td>
                                <ul style="list-style: none;">
                                    <li>Đồ nội thất: <?php echo $dem7 ." sản phẩm" ?></li>
                                    <li>Đồ điện gia dụng: <?php echo $dem8 ." sản phẩm" ?></li>
                                    <li>Đồ dùng gia đình: <?php echo $dem9 ." sản phẩm" ?></li>
                                    
                                    
                                    <li>Văn phòng phẩm: <?php echo $dem11 ." sản phẩm" ?></li>
                                    <li>Chăm sóc sức khỏe và làm đẹp: <?php echo $dem10 ." sản phẩm" ?></li>
                                    
                                   <!--  <li>Trà Sữa: <?php echo $dem14 ." mục" ?></li>
                                    <li>Trà: <?php echo $dem15 ." mục" ?></li>
                                    
                                    
                                    <li>Kem: <?php echo $dem12 ." mục" ?></li>
                                    
                                    
                                    <li>Nước Ngọt: <?php echo $dem13 ." mục" ?></li> -->
                                    
                                </ul>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-xs btn-info" href="<?php echo modules("product") ?>">Đến</a>
                            </td>
                        </tr>
                        
                        
                        
                        
                    </tbody>
                </table>
            
            </div>
        </div>
    </main>
</div>
<?php require_once __DIR__. '/../../layouts/footer.php';?>
