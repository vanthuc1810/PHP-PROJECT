<div class="row admin-content-right d-flex flex-wrap">
    <?php
        if($show_product)
        {
            while ($result = $show_product -> fetch_assoc())
            {
        ?>
        <div class ="col-md-3 d-flex flex-column px-2 flex-column p-relative hidden item-hover">
            <img src="<?php echo 'admin/uploads/'.$result['product_img']?>" alt="" class="w-100 vh-20">
            <div class="in4-product py-3 pb-1 text-center">
                <h6>ád</h6>
                <p class="fw-bolds fs-18">
                    <?php echo $result['product_price'] - $result['product_price']*$result['product_discount']/100?>$
                    <span class="sale-item-discount fs-14 color-gray">
                        <?php echo $result['product_price']?>$
                    </span>
                </p>
            </div>
            <div class="d-flex justify-content-around">
                <a href="?view=product_edit_control&product_id=<?php echo $result['product_id']?>" class="text-primary fs-6">Sửa</a>
                <a href="?view=product_delete_control&product_id=<?php echo $result['product_id']?>" class="text-danger fs-6">Xóa</a>
            </div>
        </div>
        <?php    
                }
            }
        ?>
</div>