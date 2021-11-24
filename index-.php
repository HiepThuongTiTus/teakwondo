<?php require_once __DIR__. '/autoload/autoload.php';
    //_debug($_SESSION['cart']);
    // unset($_SESSION['cart']);
    $category = $db->fetchsql("SELECT * FROM category WHERE level=0 AND home=1");
    $sqlRated = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY rated DESC LIMIT 3";
    $productRated = $db->fetchsql($sqlRated);
    $sqlNew = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY id DESC LIMIT 3";
    $productNew = $db->fetchsql($sqlNew);
    $sqlSale = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY sale DESC LIMIT 3";
    $productSale = $db->fetchsql($sqlSale);
    $sqlCheap = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 0 ORDER BY price LIMIT 3";
    $productCheap = $db->fetchsql($sqlCheap);
    $sqlAcc = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 1 ORDER BY price LIMIT 3";
    $productAcc = $db->fetchsql($sqlAcc);
    ?>
<?php require_once __DIR__. '/layouts/header-.php'; ?>












<?php require_once __DIR__. '/layouts/footer-.php'; ?>