<?php
    require_once __DIR__. '/../../autoload/autoload.php';

    if($_SESSION['admin_lv'] == 1)
    {
        $_SESSION['error'] = "Bạn không có quyền thay đổi thông tin này!";
        redirectAdmin("tintuc");
    }

    $id = intval(getInput('id'));

    $Edittintuc = $db->fetchID("tintuc",$id);
    if( empty($Edittintuc))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("tintuc");
    }

    $num = $db->delete("tintuc",$id);
    if($num > 0)
        {
            $_SESSION['success'] = "Xóa thành công!";
            redirectAdmin("tintuc");
        }
        else
        {
             $_SESSION['error'] = "Xóa thất bại!";
             redirectAdmin("tintuc");
        }

?>