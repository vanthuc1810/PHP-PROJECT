<?php
if(!isset($_GET['product_id']) || $_GET['product_id'] == NULL)
{
}else {
    $product_id = $_GET['product_id'];
}
$giohang = new giohang();
$giohang = $giohang -> delete_product($product_id);
header('Location:?view=giohang');
?>