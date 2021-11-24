<?php
    require_once __DIR__. '/../../autoload/autoload.php';

    if($_SESSION['admin_lv'] == 1)
    {
        $_SESSION['error'] = "Bạn không có quyền thay đổi thông tin này!";
        redirectAdmin("gioithieu");
    }

    $id = intval(getInput('id'));

    $Editgioithieu = $db->fetchID("gioithieu",$id);
    if( empty($Editgioithieu))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("gioithieu");
    }

    $num2 = $db->delete("phone",$id);
    $num = $db->delete("gioithieu",$id);
    if($num > 0)
        {
            $_SESSION['success'] = "Xóa thành công!";
            redirectAdmin("gioithieu");
        }
        else
        {
             $_SESSION['error'] = "Xóa thất bại!";
             redirectAdmin("gioithieu");
        }

?>