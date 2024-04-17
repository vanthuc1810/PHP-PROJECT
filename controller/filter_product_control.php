<?php
    if(!isset($_GET['cartegory_id']) || $_GET['cartegory_id'] == NULL)
    {
        echo "<script>window.location = 'index.php'</script>";
    }else
    {
        $product = new product();
        $product = $product -> show_productById($_GET['cartegory_id']);
    }
?>