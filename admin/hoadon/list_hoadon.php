<?php
$hoadon = new hoadon();
$show_hoadon = $hoadon->show_hoadon();
?>

<section style="margin-top: 140px;">
    <div class="container py-5">
        <div class="row text-center" style="border-bottom: 1px solid #ccc;">
            <div class="col-2 fs-5">
                #
            </div>
            <div class="col-4 fs-5">
                Tên khách hàng
            </div>
            <div class="col-3 text-start fs-5">
                Ngày đặt hàng
            </div>
            <div class="col-2 fs-5">
                Thao tác
            </div>
        </div>
        <?php
        if ($show_hoadon) {
            $index = 0;
            while ($result = $show_hoadon->fetch_assoc()) {
                $index++;
        ?>

                <div class="row text-center py-4" style="border-bottom: 1px solid #ccc;">
                    <div class="col-2">
                        <?php echo $index ?>
                    </div>

                    <div class="col-4">
                        <?php echo $result['user_name'] ?>
                    </div>
                    <div class="col-3 text-start">
                        <?php echo $result['time'] ?>
                    </div>
                    <div class="col-2">
                        <a href="?view=admin_chitiet_hoadon&hoadon_id=<?php echo $result['hoadon_id']?>" class="btn btn-success">
                            Chi tiết
                        </a>
                    </div>
                </div>

        <?php
            }
        }
        ?>
    </div>
</section>