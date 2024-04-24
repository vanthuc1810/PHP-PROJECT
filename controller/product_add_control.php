<?php 
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $product = new product();
    $product = $product -> insert_product($_POST,$_FILES);
    $product_url = include "cloudinary/index.php";
    var_dump($product_url);
}
?>