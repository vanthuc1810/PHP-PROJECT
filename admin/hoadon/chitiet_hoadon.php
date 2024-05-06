<?php
if (isset($_GET)) {
    $hoadon_id = $_GET['hoadon_id'];
    $hoadon = new hoadon();
    $show_hoadon_byId = $hoadon->show_hoadon_byId($hoadon_id);
}
$chiphi = 0;
?>
<?php
$hoadon = new hoadon();
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $hoadon = $hoadon -> delete_hoadon($hoadon_id);
}
?>

<section style="margin-top: 140px;">
    <div class="container py-5">
        <div class="row text-center">
            <div class="col-4">
                Sản phẩm
            </div>
            <div class="col-2 text-start">
                Đơn giá
            </div>
            <div class="col-2">
                Số lượng
            </div>
            <div class="col-2">
                Số tiền
            </div>
        </div>
        <form action="" method="POST">
            <?php
            if($show_hoadon_byId)
            {
                while(    $result = $show_hoadon_byId->fetch_assoc())
                {
            ?>
            <div class="row text-center py-4 align-items-center" style="border-bottom: 1px solid #ccc;">
                <div class="col-4 d-flex align-items-center">
                    <div class="product w-100 d-flex align-items-center gap-2" style="width: 100%;">
                        <img src="<?php echo $result['product_img'] ?>" alt="" style="height: 100px; width: 100px;">
                        <p class="title fs-5"><?php echo $result['product_name'] ?></p>
                    </div>
                </div>
                <div class="col-2 text-start">
                    <span class="fs-5 text-danger">
                        <?php
                        $chiphi += $result['product_price'] * (1 - $result['product_discount'] / 100) * $result['count'];
                        echo $result['product_price'] * (1 - $result['product_discount'] / 100) . '$';
                        ?>
                    </span>
                    <span class="" style="text-decoration: line-through;">
                        <?php
                        echo $result['product_price'] . '$';
                        ?>
                    </span>

                </div>
                <div class="col-2">
                    <p class="fs-5">
                        <input type="hidden" name="count[]" value="">
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
            </div>
            <?php
                }
            }
            ?>
            <div class="row text-center thanhtien py-4">
            <div class="col-4">
                Thành tiền
            </div>
            <div class="col-2 text-start">
            </div>
            <div class="col-2">
            </div>
            <div class="col-2 text-danger fs-4">
                <?php echo $chiphi.'$' ?>
            </div>
        </div>
            <div class="row justify-content-around">
                <button type="submit" class="btn btn-secondary col-4 py-2">Hủy</button>
                <button type="submit" class="btn btn-success col-4 py-2">Duyệt hóa đơn</button>
            </div>
        </form>
    </div>
</section>