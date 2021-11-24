<?php
session_start();
    // require_once __DIR__. "/autoload/autoload.php";
    require_once __DIR__."/send_mail/SendMail.php";
    require_once('connection.php');

    // Kiểm tra nếu thực hiện thao tác cập nhật quyền của người dùng
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $errors = '';
        $email = '';
        // kiem tra email co ton tai va dung dinh dang
        if(isset($_POST['email'])&& filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
        {
            $email = $_POST['email'];
        }
        else
        {
            $errors = "email";
        }
        if (empty($_POST['email'])) {
            $_SESSION['errors'] = 'Nhập email của bạn.';
            header('Location: forgot.php');
            exit();
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = 'Email chưa đăng ký !!!';
            header('Location: forgot.php');
            exit();
        }
        if (empty($errors) && !empty($email)) {
            $conn = open_database();
            $sql = "SELECT  `id`, `name`, `email` FROM `users` WHERE email = '". $email. "'";
            $result = $conn->query($sql);
            $users = mysqli_fetch_assoc($result);

            if (empty($users)) {
                $_SESSION['errors'] = 'Email chưa đăng ký !!!';
                header('Location: forgot.php');
                exit();
            }

            $randPassword = rand_string(8);
            $title = 'Update password';
            $content = "<h3> Dear ". $users['name']. '</h3>';
            $content .= "<p>We have received a request to re-issue your password recently.</p>";
            $content .= "<p>We have updated and sent you a new password</p>";
            $content .= "<p>Your new password is : </p> <b>$randPassword</b>";
            $sendMai = SendMail::send($title, $content, $users['name'], $users['email']);

            if ($sendMai) {
                $password = password_hash($randPassword, PASSWORD_DEFAULT);
                $sqlUpdate = "UPDATE `users` SET `password`= '". $password ."' WHERE `id` = ". $users['id'];
                $conn->query($sqlUpdate);
                $_SESSION['success'] = 'Chúng tôi đã gửi mật khẩu mới cho bạn qua email';
                header('Location: forgot.php');
            }else {
                $_SESSION['errors'] = 'Đã xảy ra lỗi không thể lấy lại mật khẩu';
                header('Location: forgot.php');
                exit();
            }
        }

    }