<?php
include "admin/slider.php";
?>
<?php 
$product = new product;
?>
<div class="col-8 admin-content-right text-center">
                <h2>Thêm sản phẩm</h2>
                <div class="admin-content-right-cartegory flex-column w-100 d-flex align-items-center ">
                    <form action="?view=product_add_control" method="POST" enctype="multipart/form-data" class="d-flex gap-4 flex-column w-75">
                         <select name="cartegory_id" class="py-2 px-1 text-secondary" style="border: #ccc solid 1px">
                            <option class="text-dark" value="#">Chọn danh mục</option>
                            <?php
                                $show_cartegory = $product -> show_cartegory();
                                if($show_cartegory)
                                {
                                   while($result = $show_cartegory -> fetch_assoc())
                                   {
                            ?>
                            <option class="text-dark" value="<?php echo $result['cartegory_id']?>">
                                <?php echo $result['cartegory_name']?>
                            </option>
                            <?php   
                                }
                            }
                            ?>
                        </select>
                        <input name="product_name" type="text" class="form-control" placeholder="Nhập tên sản phẩm">
                        <input name="product_price" type="text" class="form-control" placeholder="Nhập giá">
                        <input name="product_discount" type="text" class="form-control" placeholder="Nhập phần trăm khuyến mãi">
                        <input name="product_quantity" type="text" class="form-control" placeholder="Nhập số lượng">
                        <input name="product_decs" type="text" class="form-control" placeholder="Nhập mô tả">
                        <input name="product_img" require type="file" class="form-control" placeholder="Nhập URL hình ảnh">
                        <button class="btn btn-success" type="submit">ADD</button>
                    </form>
                </div>
            </div>
    </section>
</body>
</html>