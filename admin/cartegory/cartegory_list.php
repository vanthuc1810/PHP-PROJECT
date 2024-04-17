<?php
include "admin/slider.php";
?>
<?php 
$cartegory = new cartegory;
$show_cartegory = $cartegory -> show_cartegory();
?>
<div class="col-8 admin-content-right">
                    <div class="d-flex admin-content-right-cartegory flex-column">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-start">Danh mục</th>
                                    <th scope="col">Tùy chọn</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if ($show_cartegory) {
                                    $i = 0;
                                    while ($result = $show_cartegory->fetch_assoc()) {
                                        $i++;
                                ?>
                                        <tr class="text-center">
                                            <th scope="row">
                                                <?php echo $i ?>
                                            </th>
                                            <td class="text-start"><?php echo $result['cartegory_name'] ?></td>
                                            <td>
                                                <a href="cartegory_delete.php?cartegory_id=<?php echo $result['cartegory_id'] ?>" class="link-danger px-2">Xóa</a>
                                                <a href="cartegory_edit.php?cartegory_id=<?php echo $result['cartegory_id'] ?>" class="link-primary px-2">Sửa</a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
    </section>
</body>
</html>