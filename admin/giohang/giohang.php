<?php
if (isset($_GET)) {
  $giohang = new giohang();
  $user_id = $_SESSION['user_id'];
  $show_giohang = $giohang->show_giohang($user_id);
} else {
  echo "<script>window.location = 'index.php'</script>";
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
    <?php
    if ($show_giohang) {
      while ($result = $show_giohang->fetch_assoc()) {
    ?>
        <div class="row text-center py-4 align-items-center" style="border-bottom: 1px solid #ccc;">
          <div class="col-4 text-start d-flex align-items-center">
            <input type="checkbox" name="" id=<?php echo $result['product_id'] ?> style="width: 20px; height: 20px;">
            <label for= <?php echo $result['product_id'] ?> class="mx-4 col-8 d-flex">
              <div class="product w-100 d-flex align-items-center gap-2" style="width: 100%;">
                <img src="admin/uploads/<?php echo $result['product_img'] ?>" alt="" style="height: 100px; width: 100px;">
                <p class="title fs-5"><?php echo $result['product_name'] ?></p>
              </div>
            </label>
          </div>
          <div class="col-2">
            <p class="fs-5 text-danger">
            <?php
            echo $result['product_price'].'$';
            ?>
            <span class="fs-5" style="text-decoration:line-through; color: #ccc;">
              <?php
              echo $result['product_price']*(1-$result['product_discount']/100) .'$';
              ?>
            </span>
            </p>
          </div>
          <div class="col-2">
            <p class="fs-5">

              <?php 
            echo $result['count'];
            ?>
            </p>
          </div>
          <div class="col-2">
          <span class="text-danger fs-5">
            <?php echo $result['count'] * $result['product_price']*(1-$result['product_discount']/100).'$' ?>
          </span>
          </div>
          <div class="col-2 fs-5">
            Thao tác
          </div>
        </div>
    <?php
      }
    }
    ?>
  </div>
</section>