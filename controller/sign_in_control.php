<?php
include "C:\Users\VanThuc\OneDrive\Desktop\Giai tich\model\database.php";
include "C:\Users\VanThuc\OneDrive\Desktop\Giai tich\admin\class\user_class.php";
$user = new user();
$show_user = $user -> show_user();
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    while($result = $show_user -> fetch_assoc())
    {
        if($_POST['user_password'] === $result['user_password'] && $_POST['user_email'] == $result['user_email'])
        {
            $user_id = $result['user_id'];
            $user_name = $result['user_name'];
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
        }
    }
}else
{
    echo '<script>alert("Đăng nhập không thành công.")</script>';
}
header('Location:../?view');
?>