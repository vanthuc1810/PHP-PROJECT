<?php
if (isset($_GET)) {
    $giohang = new giohang();
    $user_id = $_SESSION['user_id'];
    $show_giohang = $giohang->show_giohang($user_id);
} else {
    echo "<script>window.location = 'index.php'</script>";
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    

    $list_id_selected = $_POST['input_selected'];
    $giohang = new $giohang();
    $giohang = $giohang -> get_product_selected($list_id_selected);
    $product_id_list = array();
    if($giohang)
    {
        while($result = $giohang -> fetch_assoc())
        {
            $id = $result['product_id'];
            $count = $result['count'];
            $product_id_list[$id] = $count;
        }
    }
    $hoadon = new hoadon();
    $hoadon = $hoadon -> insert_hoadon($product_id_list);
}
?>
<section style="margin-top: 140px;">
    <div class="container py-5">
        <div class="row text-center">
            <div class="col-4">
                Sản phẩm
            </div>
            <div class="col-2">
                Đơn giá
            </div>
            <div class="col-2">
                Số lượng
            </div>
            <div class="col-2">
                Số tiền
            </div>
            <div class="col-2">
                Thao tác
            </div>
        </div>
        <form action="" method="POST">
            <?php
            if ($show_giohang) {
                $chiphi = 0;
                while ($result = $show_giohang->fetch_assoc()) {
            ?>
                    <div class="row text-center py-4 align-items-center" style="border-bottom: 1px solid #ccc;">
                        <div class="col-4 text-start d-flex align-items-center">
                            <input type="checkbox" name="input_selected[]" id=<?php echo $result['product_id']?> value="<?php echo $result['product_id']?>" style="width: 20px; height: 20px;">
                            <label for=<?php echo $result['product_id'] ?> class="mx-4 col-8 d-flex">
                                <div class="product w-100 d-flex align-items-center gap-2" style="width: 100%;">
                                    <img src="<?php echo $result['product_img'] ?>" alt="" style="height: 100px; width: 100px;">
                                    <p class="title fs-5"><?php echo $result['product_name'] ?></p>
                                </div>
                            </label>
                        </div>
                        <div class="col-2">
                            <p class="fs-5 text-danger">
                                <?php
                                echo $result['product_price'] . '$';
                                ?>
                                <span class="fs-5" style="text-decoration:line-through; color: #ccc;">
                                    <?php
                                    $chiphi += $result['product_price'] * (1 - $result['product_discount'] / 100);
                                    echo $result['product_price'] * (1 - $result['product_discount'] / 100) . '$';
                                    ?>
                                </span>
                            </p>
                        </div>
                        <div class="col-2">
                            <p class="fs-5">
                                <input type="hidden" name="count[]" value="<?php echo $result['count'];?>">
                                <?php
                                echo $result['count'];
                                ?>
                            </p>
                        </div>
                        <div class="col-2">
                            <span class="text-danger fs-5">
                                <?php echo $result['count'] * $result['product_price'] * (1 - $result['product_discount'] / 100) . '$' ?>
                            </span>
                        </div>
                        <input type="hidden" value="<?php echo $result['product_id'] ?>" name="product_id[]">
                        <div class="col-2 fs-5">
                            <a href="?view=delete_giohang&product_id=<?php echo $result['product_id'] ?>" class="btn btn-success">Xóa</a>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
            <div class="row">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Thanh toán</button>
            </div>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Organi thông báo!!</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Số tiền cần thanh toán là:
                                <span class="text-danger">
                                    <?php echo $chiphi; ?>
                                </span>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>