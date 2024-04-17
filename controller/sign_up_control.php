<?php
include "../model/database.php";
include "../admin/class/user_class.php";
$user = new user();
$show_user = $user -> show_user();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if($_POST['user_password'] === $_POST['user_confirm_password'])
    {
        $user -> insert_user($_POST);
    }else
    {
        echo '<script>alert("Mật khẩu không trùng khớp, yêu cầu nhập lại .")</script>';
    }
}
?>