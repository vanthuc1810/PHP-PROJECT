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
    <div class="row align-items-center pb-4">
        <div class="col-4">
            <form method="POST" enctype="multipart/form-data" class="d-flex gap-4 w-75">
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
                <button class="btn btn-success px-4 py-2" type="submit"><i class="fa-solid text-light fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>

    <!-- Danh sach sp -->
    <div class="row admin-content-right d-flex flex-wrap py-4">
        <?php
        if ($show_product) {
            while ($result = $show_product->fetch_assoc()) {
        ?>
                <div class="col-md-3 d-flex flex-column px-2 py-2 flex-column p-relative hidden item-hover">
                    <a href="?view=product&product_id=<?php echo $result['product_id'] ?>">
                        <img src="<?php echo $result['product_img'] ?>" alt="" class="w-100 vh-20">
                    </a>
                    <div class="in4-product py-3 pb-1 text-center">
                        <h6><?php echo $result['product_name'] ?></h6>
                        <p class="fw-bolds fs-18">
                            <?php echo $result['product_price'] - $result['product_price'] * $result['product_discount'] / 100 ?>$
                            <span class="sale-item-discount fs-14 color-gray">
                                <?php echo $result['product_price'] ?>$
                            </span>
                        </p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <a href="?view=product_edit_control&product_id=<?php echo $result['product_id'] ?>" class="text-primary fs-6">Sửa</a>
                        <a href="?view=product_delete_control&product_id=<?php echo $result['product_id'] ?>" class="text-danger fs-6">Xóa</a>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
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