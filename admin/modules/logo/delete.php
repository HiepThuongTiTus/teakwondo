<?php
    require_once __DIR__. '/../../autoload/autoload.php';

    if($_SESSION['admin_lv'] == 1)
    {
        $_SESSION['error'] = "Bạn không có quyền thay đổi thông tin này!";
        redirectAdmin("logo");
    }

    $id = intval(getInput('id'));

    $Editadmin = $db->fetchID("logo",$id);
    if( empty($Editadmin))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("logo");
    }

    $num = $db->delete("logo",$id);
    if($num > 0)
        {
            $_SESSION['success'] = "Xóa thành công!";
            redirectAdmin("logo");
        }
        else
        {
             $_SESSION['error'] = "Xóa thất bại!";
             redirectAdmin("logo");
        }

?>