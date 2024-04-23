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
if(isset($_POST['action'])) {
  $action = $_POST['action'];
  switch($action) {
      case 'delete_product':
        $giohang = new giohang();
        $product_id_delete = $_POST['product_id_delete'];
        $giohang = $giohang->delete_product($product_id_delete);
        break;
      case 'pay':
        if(isset($_POST['checkbox_active']))
        {
          $list_checkbox_active = $_POST['checkbox_active'];
          $list_count = $_POST['count_product'];
          $list_product = array();
          for ($i = 0; $i < count($list_checkbox_active) ; $i++) {
            $list_product["$list_checkbox_active[$i]"] = $list_count[$i];
          }
          $hoadon = new hoadon();
          $result = $hoadon -> insert_hoadon($list_product);
          echo "<script>alert('Thanh toán thành công')</script>";
        }
        break;
  }
}
?>

<?php
if (!$show_giohang) {
?>
  <section style="margin-top: 140px;">
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 80vh;">
      <p>Chưa có sản phẩm nào trong giỏ hàng, Shop Now!!!</p>
      <a href="?view=shop" class="p-5 text-dark">
        <i class="bi bi-bag-plus" style="font-size: 80px;"></i>
      </a>
    </div>
  </section>
<?php
} else {
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
                <input type="checkbox" name="checkbox_active[]" id=<?php echo $result['product_id'] ?> value=<?php echo $result['product_id'] ?> style="width: 20px; height: 20px;">
                <label for=<?php echo $result['product_id'] ?> class="mx-4 col-8 d-flex">
                  <div class="product w-100 d-flex align-items-center gap-2" style="width: 100%;">
                    <img src="admin/uploads/<?php echo $result['product_img'] ?>" alt="" style="height: 100px; width: 100px;">
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
                    echo $result['product_price'] * (1 - $result['product_discount'] / 100) . '$';
                    ?>
                  </span>
                </p>
              </div>
              <div class="col-2">
                <p class="fs-5">
                  <input type="hidden" name="count_product[]" value= <?php echo $result['count']; ?>>
                  <?php
                  echo $result['count'];
                  ?>
                </p>
              </div>
              <div class="col-2">
                <span class="text-danger fs-5">
                  <?php
                  $chiphi_items = $result['count'] * $result['product_price'] * (1 - $result['product_discount'] / 100);
                  echo $chiphi_items . '$';
                  $chiphi = $chiphi + $chiphi_items;
                  ?>
                </span>
              </div>
              <div class="col-2 fs-5">
                <input type="hidden" name="product_id_delete" value=<?php echo $result['product_id'] ?>>
                <button class="btn btn-success" type="submit" name="action" value="delete_product">
                  Xóa
                </button>
              </div>
            </div>
        <?php
          }
        }
        ?>
        <div class="row">
          <button type="submit" class="btn btn-success" name="action" value="pay">
            Thanh toán
          </button>
        </div>
      </form>
    </div>
  </section>
<?php
}
?>
