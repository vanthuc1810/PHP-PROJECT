<?php
include "admin/slider.php";
?>

<?php
$product = new product;
$value = 8;
$cartegory_id = 0;
$show_product = $product->show_product($value);
if (isset($_POST['cartegory_id'])) {
    $cartegory_id = $_POST['cartegory_id'];
    $show_product = $product->show_productById($cartegory_id, $value);
}
if (isset($_POST['value'])) {
    $value = intval($_POST['value']);
    $value += 12;
    if ($cartegory_id == '0') {
        $show_product = $product->show_product($value);
    } else $show_product = $product->show_productById($cartegory_id, $value);
}
?>

<div class="col-8 p-4">

    <!-- Danh sach sp -->
    <?php
    if (isset($_POST['product_id_active'])) {
        $product_id_list = $_POST['product_id_active'];
        foreach($product_id_list as $product_id)
        {
            $promote = new promote();
            
            $promote = $promote->product_add_promote($product_id, $_POST['promote_id']);
        }
    }
    ?>
    <form action="" method="POST" class="row admin-content-right d-flex flex-wrap">
        <div class="row"> 
            <div class="col-4 py-4">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" name="cartegory_id" aria-label="Floating label select example">
                        <option value='0' selected>Tất cả</option>
                        <?php
                        $show_cartegory = $product->show_cartegory();
                        if ($show_cartegory) {
                            while ($show_cartegory_name = $show_cartegory->fetch_assoc()) {
                        ?>
                                <option value=<?php echo $show_cartegory_name['cartegory_id'] ?>><?php echo $show_cartegory_name['cartegory_name'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <label for="floatingSelect">Sắp xếp theo</label>
                </div>
                <button class="btn btn-success px-4 py-2 w-100" type="submit"><i class="fa-solid text-light fa-magnifying-glass"></i></button>
            </div>
            <div class="col-4 py-4">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" name="promote_id" aria-label="Floating label select example">
                        <?php
                        $promote = new promote();
                        $show_promote = $promote->show_promote();
                        if ($show_promote) {
                            while ($result = $show_promote->fetch_assoc()) {
                        ?>
                                <option value=<?php echo $result['promote_id'] ?>><?php echo $result['promote_name'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <label for="floatingSelect">Chọn chương trình khuyến mãi</label>
                </div>
                <button class="btn btn-success px-4 py-2 w-100" type="submit">Thêm</button>
            </div>
        </div>
        <?php
        if ($show_product) {
            while ($result = $show_product->fetch_assoc()) {
        ?>
                <div class="col-md-3 d-flex flex-column px-2 py-2 flex-column p-relative hidden item-hover">
                    <label for="<?php echo $result['product_id'] ?>">
                        <img src="<?php echo 'admin/uploads/' . $result['product_img'] ?>" alt="" class="w-100 vh-20">
                    </label>
                    <div class="in4-product py-3 pb-1 text-center">
                        <h6><?php echo $result['product_name'] ?></h6>
                    </div>
                    <input type="checkbox" id=<?php echo $result['product_id'] ?> style="display:block; width: 100%; height: 20px;border: 1px solid #aaa;" name="product_id_active[]" value=<?php echo $result['product_id'] ?>>
                </div>
        <?php
            }
        }
        ?>
    </form>
    <!-- Xử lý add promote cho product -->

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row py-4 justify-content-center">
            <div class="col-4">
                <input type="hidden" name="value" value=<?php echo $value ?>>
                <input type="hidden" name="cartegory_id" value=<?php echo (isset($_POST['cartegory_id'])) ? $_POST['cartegory_id'] : 0 ?>>
                <button class="btn btn-success btn-lg w-100" type="submit" name="product_list_ad12">
                    Xem thêm
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</section>
</body>

</html>