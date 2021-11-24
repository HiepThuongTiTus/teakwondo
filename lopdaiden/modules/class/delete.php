<?php
    require_once __DIR__. '/../../autoload/autoload.php';

    if($_SESSION['lophoc_lv'] == 1)
    {
        $_SESSION['error'] = "Bạn không có quyền thay đổi thông tin này!";
        returnGV("");
    }

    $id = intval(getInput('id'));

    $Editlophoc = $db->fetchID("lophoc",$id);
    if( empty($Editlophoc))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        returnGV("");
    }

    $num = $db->delete("lophoc",$id);
    if($num > 0)
        {
            $_SESSION['success'] = "Xóa thành công!";
            returnGV("");
        }
        else
        {
             $_SESSION['error'] = "Xóa thất bại!";
             returnGV("");
        }

?>
