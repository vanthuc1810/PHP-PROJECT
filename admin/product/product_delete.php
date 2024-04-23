<?php 
$product = new product;
    if(!isset($_GET['product_id']) || $_GET['product_id'] == NULL)
    {
        echo "<script>window.location = 'cartegorylist.php'</script>";
    }else {
        $product_id = $_GET['product_id'];
    }
    $product = $product -> delete_product($product_id);
?>
