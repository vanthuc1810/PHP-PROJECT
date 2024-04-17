<?php
include "../header.php";
include "../slider.php";
include "../class/product_class.php";
?>
<?php 
$product = new product;
$show_cartegory = $product -> show_cartegory();

    if(!isset($_GET['product_id']) || $_GET['product_id'] == NULL)
    {
        echo "<script>window.location = 'product_list.php'</script>";
    }else {
        $product_id = $_GET['product_id'];
    }
    $get_product = $product -> get_product($product_id);
    $show_cartegory = $product -> show_cartegory();
    if($get_product)
    {
        $result = $get_product -> fetch_assoc();
    }
?>
<?php 
$product = new product;
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $product = $product -> update_product($product_id,$_POST,$_FILES);
}
?>
<div class="col-8 admin-content-right">
                <h4>Sửa thông tin sản phẩm</h4>
                <div class="admin-content-right-cartegory flex-column w-100 d-flex align-items-center ">
                    <form action="" method="POST" enctype="multipart/form-data" class="d-flex gap-4 flex-column w-75">
                    <select name="cartegory_id" class="py-2 px-1">
                        <option value="<?php echo $result['cartegory_id']?>">
                            <?php
                                while($cartegory_name = $show_cartegory -> fetch_assoc())
                                {
                                    if($cartegory_name['cartegory_id'] == $result['cartegory_id'])
                                    {
                                        echo $cartegory_name['cartegory_name'];
                                    }
                                }
                            ?>
                      
                        </option>
                            <?php
                                $show_cartegory = $product -> show_cartegory();
                                if($show_cartegory)
                                {
                                    while($cartegory_name = $show_cartegory -> fetch_assoc())
                                    {
                            ?>
                            <option value="<?php echo $cartegory_name['cartegory_id']?>">
                                <?php echo $cartegory_name['cartegory_name']?>
                            </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                        <div class="row">
                            <div class="col-6">
                                <div class="">
                                    <label class="fs-6 fw-normal" for="nameInput">Tên sản phẩm</label>
                                    <input name="product_name" type="text" class="form-control"  id="nameInput" placeholder="<?php echo $result['product_name']?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="">
                                    <label class="fs-6 fw-normal" for="priceInput">Giá</label>
                                    <input name="product_price" type="text" class="form-control" id="priceInput" placeholder="<?php echo $result['product_price']?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="">
                                    <label class="fs-6 fw-normal" for="discountInput">Discount</label>
                                    <input name="product_discount" type="text" class="form-control" id="discountInput" placeholder="<?php echo $result['product_discount']?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="">
                                    <label class="fs-6 fw-normal" for="quantityInput">Số lượng</label>
                                    <input name="product_quantity" type="text" class="form-control" id="quantityInput" placeholder="<?php echo $result['product_quantity']?>">
                                </div>
                            </div>
                        </div>
                            <div class="">
                                <label class="fs-6 fw-normal" for="quantityInput">Mô tả</label>
                                <input name="product_decs" type="text" class="form-control" id="quantityInput" placeholder="<?php echo $result['product_quantity']?>">
                            </div>
                        <div class="">
                            <label class="fs-6 fw-normal" for="imgInput">URL</label>
                            <input name="product_img" type="file" class="form-control" id="imgInput" placeholder="<?php echo $result['product_img']?>">
                        </div>
                        <button class="btn btn-success" type="submit">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>