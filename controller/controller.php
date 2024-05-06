<?php
if (isset($_GET['view'])) {
    $view = $_GET['view'];
    switch ($view) {
        case 'shop':
            include_once('view/shop.php');
            break;
        case 'home':
            include_once('view/home.php');
            break;
        case 'contact':
            include_once('view/contact.php');
            break;
        case 'sign_up':
            include_once('view/sign-up.php');
            break;
        case 'log_out':
            session_unset();
            include_once("view/sign-in.php");
            break;
        case 'log_in':
            include_once('view/sign-in.php');
            break;
        case 'admin_cartegory_list':
            include_once('admin/cartegory/cartegory_list.php');
            break;
        case 'admin_cartegory_add':
            include_once('admin/cartegory/cartegory_add.php');
            break;
        case 'admin_product_add':
            include_once('admin/product/product_add.php');
            break;
        case 'admin_product_list':
            include_once('admin/product/product_list.php');
            break;
        case 'promote_list':
            include_once('admin/promote/promote_list.php');
            break;
        case 'admin_promote_addToProduct':
            include_once('admin/promote/promote_add_item.php');
        break;
        case 'admin_promote_add':
            include_once('admin/promote/promote_add.php');
            break;
        case 'product_add_control':
            include_once('controller/product_add_control.php');
            break;
        case 'product_delete_control':
            include_once('controller/product_delete_control.php');
            break;  
        case 'product_edit_control':
            include_once('controller/product_edit_control.php');
            break;    
        case 'filter_product_control':
            include_once('controller/filter_product_control.php');
            break;      
        case 'product':
            include_once('view/product.php');
            break;  
        case 'promote_delete':
            include_once('admin/promote/promote_delete.php');
            break;
        case 'promote_edit':
            include_once('admin/promote/promote_edit.php');
            break;  
        case 'giohang':
            include_once('admin/giohang/giohang.php');
            break;
        case 'delete_giohang':
            include_once('admin/giohang/giohang_delete.php');
            break;
        case 'admin_hoadon':
            include_once('admin/hoadon/list_hoadon.php');
            break;
        case 'admin_chitiet_hoadon':
            include_once('admin/hoadon/chitiet_hoadon.php');
            break;
        default:
            include_once('view/home.php');
            break;
    }
}else
{
    include_once('view/home.php');
}
